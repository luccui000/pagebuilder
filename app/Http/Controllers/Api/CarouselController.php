<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function store(Request $request)
    {
        $carousel = Carousel::create([
            'name' => $request->name,
            'background_image' => $request->background_image,
            'primary_text' => $request->primary_text,
            'slider_id' => $request->slider_id
        ]);

        return new JsonResponse(
            data: $carousel,
            status:  201
        );
    }
}
