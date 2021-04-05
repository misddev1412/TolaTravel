<?php

namespace App\Http\Controllers\Admin;


use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
    private $response;

    public function __construct(Category $category, Response $response)
    {
        $this->category = $category;
        $this->response = $response;
    }

    public function list($type)
    {
        $categories = $this->category->getListAll($type);

//        return $categories;

        return view('admin.category.category_list', [
            'categories' => $categories,
            'type' => $type
        ]);
    }

    public function create(Request $request)
    {
        $request['slug'] = getSlug($request, 'name');

        $rule_factory = RuleFactory::make([
            '%name%' => '',
            'slug' => '',
            'priority' => '',
            'is_feature' => '',
            '%feature_title%' => '',
            'type' => '',
            'color_code' => '',
            'seo_title' => '',
            'seo_description' => '',
            'icon_map_marker' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $data = $this->validate($request, $rule_factory);

        if ($request->hasFile('icon_map_marker')) {
            $icon = $request->file('icon_map_marker');
            $file_name = $this->uploadImage($icon, '');
            $data['icon_map_marker'] = $file_name;
        }

        $model = new Category();
        $model->fill($data)->save();

        return back()->with('success', 'Add category success!');
    }

    public function update(Request $request)
    {
        $request['slug'] = getSlug($request, 'name');

        $rule_factory = RuleFactory::make([
            'category_id' => 'required',
            '%name%' => '',
            'slug' => '',
            'priority' => '',
            'is_feature' => '',
            '%feature_title%' => '',
            'type' => '',
            'color_code' => '',
            'seo_title' => '',
            'seo_description' => '',
            'icon_map_marker' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $data = $this->validate($request, $rule_factory);

        if ($request->hasFile('icon_map_marker')) {
            $icon = $request->file('icon_map_marker');
            $file_name = $this->uploadImage($icon, '');
            $data['icon_map_marker'] = $file_name;
        }

//        return $data;

        $model = Category::find($request->category_id);
        $model->fill($data);

        if ($model->save())
            return back()->with('success', 'Update category success!');
        else
            return back()->with('error', 'Update category fail!');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return back()->with('success', 'Delete category success!');
    }

    /**
     * API update status
     */
    public function updateStatus(Request $request)
    {
        $data = $this->validate($request, [
            'status' => 'required',
        ]);

        $model = Category::find($request->category_id);
        $model->fill($data);

        if ($model->save()) {
            return $this->response->formatResponse(200, $model, 'Update category status success!');
        }
    }

    /**
     * API update is_feature
     */
    public function updateIsFeature(Request $request)
    {
        $data = $this->validate($request, [
            'is_feature' => 'required',
        ]);

        $model = Category::find($request->category_id);
        $model->fill($data);

        if ($model->save()) {
            return $this->response->formatResponse(200, $model, 'Update category is feature success!');
        }
    }


}
