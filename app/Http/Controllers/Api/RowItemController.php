<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Picture;
use App\Models\RowItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RowItemController extends Controller
{
    public function card(Request $request, $id, $cardId)
    {
        $card = Card::findOrFail($cardId);
        return new JsonResponse($card);
    }

    public function updateCard(Request $request, $id, $cardId)
    {
        $card = null;
        if ($cardId == 0) {
            $card = Card::create($request->all());
            $rowItem = RowItem::where('id', '=', $id)
                ->where('rowitems_type', '=', 'CARD')
                ->first();
            $rowItem->update([
                'rowitems_id' => $card->id
            ]);
            $rowItem->save();
        } else {
            $formData = $request->all();
            unset($formData['id']);
            $card = Card::findOrFail($cardId);
            $card->update($formData);
        }
        return new JsonResponse($card);
    }

    public function updateImage(Request $request, $id, $imageId)
    {
        $picture = null;
        if(intval($imageId) == 0) {
            $picture = Picture::create($request->all());
            $rowItem = RowItem::where('id', '=', $id)
                ->where('rowitems_type', '=', 'IMAGE')
                ->first();
            $rowItem->update([
                'rowitems_id' => $picture->id
            ]);
            $rowItem->save();
        } else {
            $formData = $request->all();
            unset($formData['id']);
            $picture = Picture::findOrFail($imageId);
            $picture->update($formData);
        }
        return new JsonResponse($picture);
    }
}
