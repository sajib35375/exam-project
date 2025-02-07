<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function dashboard()
    {
        $merchants = User::all();
        return view('admin.admin_dashboard',compact('merchants'));
    }
}
