<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show(Request $request, $id)
    {
        $menuItems = MenuItem::where('menu_id', '=', $id)
            ->whereNull('parent_id')
            ->with(['children'])
            ->get();

        return new JsonResponse($menuItems);
    }
}
