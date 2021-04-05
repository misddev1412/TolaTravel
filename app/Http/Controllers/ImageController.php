<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {

            $data = $this->validate($request, [
                'image' => 'mimes:jpeg,jpg,png,gif|max:10000'
            ]);

            $image = $request->file('image');
            $file_name = $this->uploadImage($image, '');

            return [
                "code" => 200,
                "status" => "success",
                "file_name" => $file_name
            ];
        }

        return [
            "code" => 404,
            "status" => "no file"
        ];
    }
}