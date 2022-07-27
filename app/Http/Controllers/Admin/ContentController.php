<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::all();
        return view('content.index', [
            'contents' => $contents
        ]);
    }
    public function create()
    {
        return view('content.create');
    }
    public function moi()
    {
        return view('content.moi');
    }
}
