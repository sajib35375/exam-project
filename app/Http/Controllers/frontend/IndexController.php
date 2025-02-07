<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        $stores = Store::all();
        return view('frontend.index', compact('stores'));
    }

    public function storeWise($id)
    {
        $store = Store::find($id);
        $categories = Category::where('store_id', $id)->get();
        return view('frontend.store.store', compact('categories', 'store'));
    }

    public function categoryProduct($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->get();
        return view('frontend.product.product', compact('products', 'category'));
    }
}
