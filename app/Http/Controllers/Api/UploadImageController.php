<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return new JsonResponse(
            data: $images,status: 200
        );
    }
    public function upload(Request $request)
    {
        if($request->hasFile('url')) {
            $hinhAnh = $request->file('url');
            $ext = $hinhAnh->getClientOriginalExtension();
            $fileName = time() . '_' . md5($hinhAnh->getFilename());
            $input = $fileName . '.' . $ext;
            $hinhAnh->move(public_path('/uploads'), $input);

            try {
                $hinhanh = Image::create([
                    'url' => "/uploads/" . $input
                ]);
                return new JsonResponse(
                    data: $hinhanh
                );
            } catch (\Exception $exception) {
                return new JsonResponse(
                    data: $exception->getMessage(),
                    status: JsonResponse::HTTP_OK
                );
            }
        }
    }
}
