<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function storeAdd()
    {
        return view('merchant.store.store_add');
    }

    public function storeCreate(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Store::insert([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Store Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('root.store.list')->with($notification);
    }

    public function storeList()
    {
        $all_store = Store::where('user_id', Auth::id())->get();
        return view('merchant.store.store_list', compact('all_store'));
    }

    public function storeEdit($id){
       $store = Store::find($id);
       return view('merchant.store.store_edit', compact('store'));
    }

    public function storeUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $store_update = Store::find($id);
        $store_update->name = $request->name;
        $store_update->updated_at = Carbon::now();
        $store_update->update();

        $notification = array(
            'message' => 'Store Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('root.store.list')->with($notification);
    }

    public function storeDelete($id)
    {
        $store_delete = Store::find($id);
        $store_delete->delete();

        $notification = array(
            'message' => 'Store Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
}
