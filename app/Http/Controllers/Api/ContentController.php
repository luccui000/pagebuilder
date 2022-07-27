<?php

namespace App\Http\Controllers\Api;

use App\Classes\Status;
use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Content;
use App\Models\ContentRow;
use App\Models\Paragraph;
use App\Models\Picture;
use App\Models\RowItem;
use App\Models\Sidebar;
use App\Models\WrapSidebar;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function store(Request $request)
    {
        DB::transaction(function() use ($request) {
            $content = Content::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'status' => $request->status ? Status::DA_CONG_BO : Status::CHO_CONG_BO
            ]);
            foreach ($request['rows'] as $row) {
                $contentRow = ContentRow::create([
                    'content_id' => $content->id,
                    'col_num' => $row['col_num'],
                    'order' => $row['order']
                ]);
                foreach ($row['cols'] as $col) {
                    $rowItem = RowItem::create([
                        'contentrow_id' => $contentRow->id,
                        'rowitems_type' => $col['rowitems_type'],
                        'rowitems_id' => 0,
                        'order' => $col['order'],
                    ]);
                    switch ($col['rowitems_type']) {
                        case 'CARD':
                            $card = Card::create([
                                'title' => $col['data']['title'],
                                'description' => $col['data']['description'],
                                'image' => $col['data']['image'],
                                'link_product' => $col['data']['link_product'],
                            ]);
                            $rowItem->update([
                                'rowitems_id' => $card->id
                            ]);
                            break;
                        case 'IMAGE':
                            $picture = Picture::create([
                                'url' => $col['data']['url'],
                                'link' => $col['data']['link'] || '',
                            ]);
                            $rowItem->update([
                                'rowitems_id' => $picture->id
                            ]);
                            break;
                        case 'CAROUSEL':
                            $rowItem->update([
                                'rowitems_id' => $col['data']['carousel_id']
                            ]);
                            break;
                        case 'SIDEBAR':
                            $wrapSidebar = WrapSidebar::create();
                            foreach ($col['data']['items'] as $item) {
                                Sidebar::create([
                                    'name' => $item['name'],
                                    'link' => $item['link'],
                                    'order' => $item['order'],
                                    'status' => 1,
                                    'wrapsidebar_id' => $wrapSidebar->id,
                                ]);
                            }
                            $rowItem->update([
                                'rowitems_id' => $wrapSidebar->id
                            ]);
                            break;
                        case 'PARAGRAPH':
                            $paragraph = Paragraph::create([
                                'content' => $col['data']['content']
                            ]);
                            $rowItem->update([
                                'rowitems_id' => $paragraph->id
                            ]);
                            break;
                    }
                }
            }
        });
        return new JsonResponse($request->all());
    }
}
