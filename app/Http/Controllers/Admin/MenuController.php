<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Status;
use App\Http\Controllers\Controller;
use App\Models\Header;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $header = Header::where('status', '=', Status::DA_CONG_BO)
            ->with(['menus'])
            ->orderBy('created_at', 'desc')
            ->first();
        return view('menus.index', [
            'header' => $header
        ]);
    }
    public function show(Request $request, $id)
    {
        $menuItems = MenuItem::where('menu_id', '=', $id)
            ->whereNull('parent_id')
            ->with(['children'])
            ->get();
        return view('menus.show', [
            'items' => $menuItems
        ]);
    }
    public function update(Request $request, $id)
    {
    }
}
