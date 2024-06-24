<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        {
            return view('admin.index');
    
        }
    }
    public function  themMoi()
    {
        {
            return view('admin.add');
        }
    }
    public function  capNhat()
    {
        {
            return view('admin.update');
        }
    }
}
