<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Status;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '=', Status::DA_CONG_BO)
            ->with(['carousels'])
            ->first();

        return view('slider.index', [
            'sliders' => $sliders
        ]);
    }

}
