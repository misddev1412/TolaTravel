<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {

        return view('admin.setting.setting');
    }

    public function store(Request $request)
    {
        $rules = Setting::getValidationRules();
        $data = $this->validate($request, $rules);

        $validSettings = array_keys($rules);

        foreach ($data as $key => $val) {
            if (in_array($key, $validSettings)) {

                if (Setting::getDataType($key) === "image") {
                    $file = $request->file($key);
                    $image = $this->uploadImage($file, '');
                    $val = $image;
                }

                Setting::add($key, $val, Setting::getDataType($key));
            }
        }

        return back()->with('success', 'Settings has been saved.');
    }

    public function pageLanguage()
    {
        $language_active = Language::query()
            ->where('is_active', Language::STATUS_ACTIVE)
            ->get();

        $language_deactive = Language::query()
            ->where('is_active', Language::STATUS_DEACTIVE)
            ->get();

        return view('admin.setting.setting_language', [
            'language_active' => $language_active,
            'language_deactive' => $language_deactive
        ]);
    }

    public function pageTranslation()
    {

        return view('admin.setting.setting_translation');
    }
}