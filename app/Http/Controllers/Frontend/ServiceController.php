<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function index()
    {
        $data['page'] = 'frontend.services.home';
        return view('frontend.layouts.master', $data);
    }
}