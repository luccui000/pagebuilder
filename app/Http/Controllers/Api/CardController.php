<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function show(Request $request, $id)
    {
        $card = Card::findOrFail($id);
        return new JsonResponse($card);
    }
    public function updateOrCreate(Request $request)
    {
        $card = Card::updateOrCreate($request->all());
        return new JsonResponse($card);
    }
}
