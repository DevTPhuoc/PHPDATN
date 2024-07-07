<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    public function index()
    {
        return view('statistical.index');
    }
}
