<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    public function index(){
        $stores = Store::where('user_id', Auth::id())->get();
        return view('merchant.product.product_add', compact('stores'));
    }

    public function getCategory($id)
    {
        $categories = Category::where('store_id', $id)->where('user_id',Auth::id())->get();
        return $categories;
    }

    public function createProduct(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'store_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image);
            $image->resize(416, 416);
            $image->toPng()->save('uploads/product/'.$unique_name);
        }

        Product::insert([
            'user_id' => Auth::user()->id,
            'store_id' => $request->store_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $unique_name,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Product added successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('root.product.list')->with($notification);
    }

    public function productList()
    {
        $products = Product::with('category','store')->where('user_id',Auth::id())->get();
        return view('merchant.product.product_list', compact('products'));
    }

    public function productEdit($id){
        $edit_product = Product::with('category','store')->find($id);
        $stores = Store::where('user_id', Auth::id())->get();
        return view('merchant.product.product_edit', compact('edit_product', 'stores'));
    }

    public function categorySelect($id)
    {
        return Category::where('store_id', $id)->get();
    }

    public function productUpdate(Request $request, $id){
        $request->validate([
            'category_id' => 'required',
            'store_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $update_product = Product::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $unique_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $image = $manager->read($image);
            $image->resize(416, 416);
            $image->toPng()->save('uploads/product/'.$unique_name);
            if ($update_product->image) {
                unlink('uploads/product/'.$request->old_image);
            }
        }else{
            $unique_name = $request->old_image;
        }

        $update_product->store_id = $request->store_id;
        $update_product->category_id = $request->category_id;
        $update_product->name = $request->name;
        $update_product->price = $request->price;
        $update_product->stock = $request->stock;
        $update_product->image = $unique_name;
        $update_product->updated_at = Carbon::now();
        $update_product->update();

        $notification = array(
            'message' => 'Product Updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('root.product.list')->with($notification);
    }

    public function productDelete($id)
    {
        $delete_product = Product::find($id);
        if ($delete_product->image) {
            unlink('uploads/product/'.$delete_product->image);
        }
        $delete_product->delete();

        $notification = array(
            'message' => 'Product Deleted successfully!',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
}





















