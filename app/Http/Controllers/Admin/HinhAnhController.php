<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HinhAnhController extends Controller
{
    public function index()
    {
        return view('hinhanh.index');
    }
}
