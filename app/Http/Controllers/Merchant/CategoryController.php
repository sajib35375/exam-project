<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        $stores = Store::where('user_id', Auth::id())->get();
        return view('merchant.category.category_add', compact('categories', 'stores'));
    }

    public function createCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'store_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image);
            $image->resize(512, 512);
            $image->toPng()->save('uploads/category/'.$unique_name);
        }

        Category::insert([
            'user_id' => Auth::id(),
            'store_id' => $request->store_id,
            'name' => $request->name,
            'image' => $unique_name,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('root.category.list')->with($notification);
    }

    public function categoryList()
    {
        $categories = Category::with('store')->where('user_id',Auth::id())->get();
        return view('merchant.category.category_list', compact('categories'));
    }

    public function categoryEdit($id)
    {
        $category_edit = Category::with('store')->where('id', $id)->first();
        $stores = Store::where('user_id', Auth::id())->get();
        return view('merchant.category.category_edit', compact('category_edit', 'stores'));
    }

    public function categoryUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'store_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $category_update = Category::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image);
            $image->resize(512, 512);
            $image->toPng()->save('uploads/category/'.$unique_name);

            if ($category_update->image) {
                unlink('uploads/category/'.$request->old_image);
            }
        }else{
            $unique_name = $request->old_image;
        }

        $category_update->name = $request->name;
        $category_update->image = $unique_name;
        $category_update->store_id = $request->store_id;
        $category_update->updated_at = Carbon::now();
        $category_update->update();

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('root.category.list')->with($notification);
    }

    public function categoryDelete($id)
    {
        $delete_category = Category::where('id', $id)->first();

        if ($delete_category->image) {
            unlink('uploads/category/'.$delete_category->image);
        }

        $delete_category->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);

    }








}
