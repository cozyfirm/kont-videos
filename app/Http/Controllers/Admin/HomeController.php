<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller{

    public function index(): View{
        // dump(Carbon::now() > Carbon::parse('2024-06-04 06:00:00'), Carbon::now(), Carbon::parse('2024-06-04 06:00:00') );
        return view('admin.home');
    }
}