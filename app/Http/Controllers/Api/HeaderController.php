<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Header;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function styles(Request $request, $id)
    {
        $header = Header::findOrFail($id);
        $style = $header->styles()->orderBy('created_at', 'desc')->first();
        return new JsonResponse($style);
    }
    public function changeColor(Request $request)
    {
        $firstMenu = Menu::findOrFail($request->menu_id);
        $header = Header::findOrFail($firstMenu->header_id);
        $style = $header->styles()->create([
            'style' => $request->style
        ]);
        return new JsonResponse($style);
    }
}
