<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('landing_page.home.index');
    }
    
    public function dashboard()
    {
        return view('admin.dashboard.index');
    }
}
