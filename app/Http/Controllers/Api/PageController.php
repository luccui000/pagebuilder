<?php

namespace App\Http\Controllers\Api;

use App\Classes\Status;
use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Carousel;
use App\Models\Content;
use App\Models\ContentRow;
use App\Models\MenuItem;
use App\Models\Paragraph;
use App\Models\Picture;
use App\Models\RowItem;
use App\Models\Slider;
use App\Models\WrapSidebar;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
//        $content = Content::with([
//            'contentrows' => fn($query) => $query->with('rowitems')->get()
//        ])->first();

        return new JsonResponse([]);
    }
    public function addNewRow(Request $request)
    {
        $maxOrder = ContentRow::where('content_id', '=', $request->content_id)
            ->max('order');

        $content =  ContentRow::create([
            'content_id' => $request->content_id,
            'order' => $maxOrder + 1 || 1,
            'col_num' => $request->col_num, 0
        ]);
        RowItem::create([
            'contentrow_id' => $content->id,
            'rowitems_type' => 'NULL',
            'order' => 1,
            'rowitems_id' => 0
        ]);
        return new JsonResponse(
            data: $content
        );
    }
    public function updateColumn(Request $request)
    {
        $contentRow = ContentRow::findOrFail($request->id);
        $contentRow->update([
            'col_num' => $request->col_num,
        ]);
        RowItem::where('contentrow_id', '=', $contentRow->id)
            ->delete();

        for($i = 0; $i < $request->col_num; $i++) {
            RowItem::create([
                'contentrow_id' => $contentRow->id,
                'rowitems_type' => 'NULL',
                'order' => $i + 1,
                'rowitems_id' => 0
            ]);
        }
        return new JsonResponse($contentRow);
    }
    public function updateColumnType(Request $request)
    {
        $rowItem = RowItem::where('contentrow_id', '=', $request->contentrow_id)
            ->where('order', '=', $request->order)
            ->first();
        $rowItem->update([
            'rowitems_type' => $request->type
        ]);
        return new JsonResponse($rowItem);
    }
    public function store(Request $request)
    {
        $content = Content::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status == true ? Status::DA_CONG_BO : Status::CHO_CONG_BO
        ]);

        return new JsonResponse($content);
    }
    public function update(Request $request)
    {
        $menuItem = MenuItem::findOrFail($request->id);
        $menuItem->update([
            'name' => $request->name
        ]);

        return new JsonResponse(
            data: $menuItem,
            status: JsonResponse::HTTP_OK
        );
    }
    public function updateCarousel(Request $request)
    {
        $data = $request->all();
        $carousel = Carousel::findOrFail($request->id);
        unset($data['id']);
        $carousel->update($data);
        return new JsonResponse(
            data: $carousel,
            status: JsonResponse::HTTP_OK
        );
    }
    public function show(Request $request, $slug)
    {
        $content = Content::where('slug', '=', $slug)
            ->with([
                'contentrows' => function($query) {
                    return $query->with([
                        'rowitems'
                    ])->get();
                }
            ])
            ->first();

        $contents = $content->contentrows->map(function($row) {
            return $row->rowitems->map(function($col) use ($row) {
                switch ($col->rowitems_type) {
                    case 'CARD':
                        return [
                            'col_num' => $row->col_num,
                            'id' => $row->id,
                            'items' => [
                                    'id' => $col->id,
                                    'type' => 'CARD',
                                    'order' => $col->order,
                                    'data' => Card::findOrFail($col->rowitems_id)
                                ]
                            ];
                    case 'CAROUSEL':
                        return [
                            'col_num' => $row->col_num,
                            'id' => $row->id,
                            'items' => [
                                'id' => $col->id,
                                'type' => 'CAROUSEL',
                                'order' => $col->order,
                                'data' => [
                                    'id' => $col->id,
                                    'carousel_id' => $col->rowitems_id,
                                    'carousels' => Slider::where('id', '=', $col->rowitems_id)
                                        ->with(['carousels'])->first()->carousels
                                ]
                            ]
                        ];
                    case 'IMAGE':
                        return [
                            'col_num' => $row->col_num,
                            'id' => $row->id,
                            'items' => [
                                'id' => $col->id,
                                'type' => 'IMAGE',
                                'order' => $col->order,
                                'data' => Picture::findOrFail($col->rowitems_id)
                            ]
                        ];
                    case 'PARAGRAPH':
                        return [
                            'id' => $row->id,
                            'col_num' => $row->col_num,
                            'items' => [
                                'id' => $col->id,
                                'type' => 'PARAGRAPH',
                                'order' => $col->order,
                                'data' => Paragraph::findOrFail($col->rowitems_id)
                            ]
                        ];
                    case 'SIDEBAR':
                        return [
                            'id' => $row->id,
                            'col_num' => $row->col_num,
                            'items' => [
                                'id' => $col->id,
                                'type' => 'SIDEBAR',
                                'order' => $col->order,
                                'data' => WrapSidebar::findOrFail($col->rowitems_id)
                            ]
                        ];
                }
            });
        });

        return new JsonResponse($contents);
    }
}
