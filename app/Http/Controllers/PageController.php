<?php

namespace App\Http\Controllers;

use App\Classes\Status;
use App\Models\Card;
use App\Models\Carousel;
use App\Models\Content;
use App\Models\Header;
use App\Models\Paragraph;
use App\Models\Picture;
use App\Models\Slider;
use App\Models\WrapSidebar;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $header = Header::with([
                'menus',
                'menuitems' => function($query) {
                    return $query->whereNull('parent_id');
                }
            ])
            ->where('status', '=', Header::DA_CONG_BO)
            ->orderBy('created_at', 'desc')
            ->first();

        $carousels = Carousel::where('status', '=', Status::DA_CONG_BO)
            ->orderBy('order')
            ->get();
        return view('pages/index', [
            'header' => $header,
            'carousels' => $carousels
        ]);
    }
    public function template()
    {
        $header = Header::with([
            'menuitems' => function($query) {
                return $query->whereNull('parent_id');
            }
        ])
            ->where('status', '=', Header::DA_CONG_BO)
            ->orderBy('created_at', 'desc')
            ->first();

        $carousels = Carousel::where('status', '=', Status::DA_CONG_BO)
            ->orderBy('order')
            ->get();

        return view('pages/template1', [
            'header' => $header,
            'carousels' => $carousels
        ]);
    }
    public function template2()
    {
        $header = Header::with([
            'menuitems' => function($query) {
                return $query->whereNull('parent_id');
            }
        ])
            ->where('status', '=', Header::DA_CONG_BO)
            ->orderBy('created_at', 'desc')
            ->first();

        $carousels = Carousel::where('status', '=', Status::DA_CONG_BO)
            ->orderBy('order')
            ->get();

        return view('pages/template2', [
            'header' => $header,
            'carousels' => $carousels
        ]);
    }

    public function render(Request $request, $slug)
    {
        return view('pages.render');
    }
}
