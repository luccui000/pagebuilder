<?php

namespace App\Http\Controllers\Api;

use App\Classes\Status;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::with([
            'carousels'
        ])->get();

        return new JsonResponse(
            data: $sliders,status: 200
        );
    }
    public function store(Request $request)
    {
        $slider = Slider::create([
            'name' => $request->name,
            'status' => Status::CHO_CONG_BO
        ]);

        return new JsonResponse(
            data: $slider,status: 200
        );
    }

    public function active(Request $request)
    {
        $slider = Slider::findOrFail($request->slider_id)->update([
            'status' => Status::DA_CONG_BO
        ]);

        return new JsonResponse(
            data: $slider
        );
    }
    public function show(Request $request, $id)
    {
        $slider = Slider::where('id', '=', $id)
            ->with(['carousels'])
            ->first();

        return new JsonResponse($slider);
    }
}
