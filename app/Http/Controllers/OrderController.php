<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        {
            return view('order.index');
    
        }
    }
    public function  themMoi()
    {
        {
            return view('order.add');
        }
    }
}