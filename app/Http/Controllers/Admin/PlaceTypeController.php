<?php

namespace App\Http\Controllers\Admin;


use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PlaceType;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Http\Request;

class PlaceTypeController extends Controller
{
    private $category;
    private $place_type;
    private $response;

    public function __construct(Category $category, PlaceType $place_type, Response $response)
    {
        $this->category = $category;
        $this->place_type = $place_type;
        $this->response = $response;
    }

    public function list(Request $request)
    {
        $param_category_id = $request->category_id;
        $categories = $this->category->getListAll(Category::TYPE_PLACE);
        $place_types = $this->place_type->getListByCat($param_category_id);

//        return $place_types;

        return view('admin.place_type.place_type_list', [
            'categories' => $categories,
            'place_types' => $place_types,
            'category_id' => (int)$param_category_id
        ]);
    }

    public function create(Request $request)
    {
        $rules = [
            'category_id' => 'required',
            '%name%' => ''
        ];
        $rule_factory = RuleFactory::make($rules);
        $data = $this->validate($request, $rule_factory);

        $model = new PlaceType();
        $model->fill($data)->save();

        return back()->with('success', 'Add place type success!');
    }

    public function update(Request $request)
    {
        $rules = [
            'category_id' => 'required',
            '%name%' => ''
        ];
        $rule_factory = RuleFactory::make($rules);
        $data = $this->validate($request, $rule_factory);

        $model = PlaceType::find($request->place_type_id);
        $model->fill($data);

        if ($model->save()) {
            return back()->with('success', 'Update place type success!');
        }
    }

    public function destroy($id)
    {
        PlaceType::destroy($id);
        return back()->with('success', 'Delete place type success!');
    }
}