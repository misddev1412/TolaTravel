<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Models\Image as ImageModel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImage($file, $dir, $is_get_id = false)
    {
        //$file = $request->file('image');

        $extension = $file->getClientOriginalExtension();
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $result = $file->move("uploads/{$dir}", $filename);
        $link = $result->getPathName();
        $original_image = file_get_contents($link);
        $original = File::put(public_path('uploads/photos/'.$filename.'_original.'.$extension), $original_image);

        $og_image = Image::make(public_path('uploads/photos/'.$filename.'_original.'.$extension))->resize(1200, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save(public_path('/uploads/photos/'.$filename.'_og.'.$extension));
        $thumbnail = Image::make(public_path('uploads/photos/'.$filename.'_original.'.$extension))->resize(100, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save(public_path('/uploads/photos/'.$filename.'_thumbnail.'.$extension));
        $big_image = Image::make(public_path('uploads/photos/'.$filename.'_original.'.$extension))->resize(1080, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save(public_path('/uploads/photos/'.$filename.'_big.'.$extension));
        $big_image_two = Image::make(public_path('uploads/photos/'.$filename.'_original.'.$extension))->resize(730, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save(public_path('/uploads/photos/'.$filename.'_big_two.'.$extension));
        $medium_image = Image::make(public_path('uploads/photos/'.$filename.'_original.'.$extension))->resize(258, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save(public_path('/uploads/photos/'.$filename.'_medium.'.$extension));
        $medium_image_two = Image::make(public_path('uploads/photos/'.$filename.'_original.'.$extension))->resize(350, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save(public_path('/uploads/photos/'.$filename.'_medium_two.'.$extension));
        $medium_image_three = Image::make(public_path('uploads/photos/'.$filename.'_original.'.$extension))->resize(460, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save(public_path('/uploads/photos/'.$filename.'_medium_three.'.$extension));
        $small_image = Image::make(public_path('uploads/photos/'.$filename.'_original.'.$extension))->resize(240, null, function ($constraint) {
            $constraint->aspectRatio();
            })->save(public_path('/uploads/photos/'.$filename.'_small.'.$extension));

        $imageId = ImageModel::create([
            'disk'                  => 'api',
            'original_image'        => '/uploads/photos/'.$filename.'_original.'.$extension,
            'og_image'              => '/uploads/photos/'.$filename.'_og.'.$extension,
            'thumbnail'             => '/uploads/photos/'.$filename.'_thumbnail.'.$extension,
            'big_image'             => '/uploads/photos/'.$filename.'_big.'.$extension,
            'big_image_two'         => '/uploads/photos/'.$filename.'_big_two.'.$extension,
            'medium_image'          => '/uploads/photos/'.$filename.'_medium.'.$extension,
            'medium_image_two'      => '/uploads/photos/'.$filename.'_medium_two.'.$extension,
            'medium_image_three'    => '/uploads/photos/'.$filename.'_medium_three.'.$extension,
            'small_image'           => '/uploads/photos/'.$filename.'_small.'.$extension
        ]);
        


        // $file->move("uploads/{$dir}", $filename);
        if ($is_get_id) {
            return $imageId->id;
        }
        return $filename;
    }

    public function deleteImage($path)
    {
        return File::delete($path);
    }

    public function getUserByApiToken($request)
    {
        $api_token = $request->bearerToken();
        $user = User::where('api_token', $api_token)->first();

        return $user;
    }
}
