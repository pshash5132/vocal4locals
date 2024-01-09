<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //

    public function dashboard()
    {

        $data = ['page' => 'dashboard'];
        return view('admin.layouts.master', $data);
    }
    public function login()
    {
        return view('admin.auth.login');
    }
}
