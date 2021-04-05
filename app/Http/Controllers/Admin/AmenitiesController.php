<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Amenities;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    private $amenities;

    public function __construct(Amenities $amenities)
    {
        $this->amenities = $amenities;
    }

    public function list()
    {
        $amenities = $this->amenities->getListAll();

        return view('admin.amenities.amenities_list', [
            'amenities' => $amenities
        ]);
    }

    public function create(Request $request)
    {
        $rule_factory = RuleFactory::make([
            '%name%' => '',
            'icon' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $data = $this->validate($request, $rule_factory);

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $file_name = $this->uploadImage($icon, '');
            $data['icon'] = $file_name;
        }

        $model = new Amenities();
        $model->fill($data)->save();

        return back()->with('success', 'Add amenities success!');
    }

    public function update(Request $request)
    {
        $rule_factory = RuleFactory::make([
            'amenities_id' => 'required',
            '%name%' => '',
            'icon' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $data = $this->validate($request, $rule_factory);

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $file_name = $this->uploadImage($icon, '');
            $data['icon'] = $file_name;
        }

        $model = Amenities::findOrFail($request->amenities_id);
        $model->fill($data)->save();

        return back()->with('success', 'Update amenities success!');
    }

    public function destroy($id)
    {
        Amenities::destroy($id);
        return back()->with('success', 'Delete amenities success!');
    }
}
