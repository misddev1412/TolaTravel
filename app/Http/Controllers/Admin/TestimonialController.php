<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Testimonial;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function list()
    {
        $testimonials = Testimonial::query()
            ->where('status', Testimonial::STATUS_ACTIVE)
            ->get();

        return view('admin.testimonial.testimonial_list', [
            'testimonials' => $testimonials
        ]);
    }

    public function pageCreate($id = null)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.testimonial_create', [
            'testimonial' => $testimonial
        ]);
    }

    public function create(Request $request)
    {
        $rule_factory = RuleFactory::make([
            '%name%' => '',
            '%job_title%' => '',
            '%content%' => '',
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $data = $this->validate($request, $rule_factory);

        if ($request->hasFile('avatar')) {
            $thumb = $request->file('avatar');
            $thumb_file = $this->uploadImage($thumb, '');
            $data['avatar'] = $thumb_file;
        }

        $model = new Testimonial();
        $model->fill($data);
        $model->save();

        return redirect()->back()->with('success', 'Create testimonial success!');
    }

    public function update(Request $request)
    {
        $rule_factory = RuleFactory::make([
            '%name%' => '',
            '%job_title%' => '',
            '%content%' => '',
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $data = $this->validate($request, $rule_factory);

        if ($request->hasFile('avatar')) {
            $thumb = $request->file('avatar');
            $thumb_file = $this->uploadImage($thumb, '');
            $data['avatar'] = $thumb_file;
        }

//        return $data;


        $model = Testimonial::find($request->id);
        $model->fill($data);
        $model->save();

        return redirect()->back()->with('success', 'Update testimonial success!');
    }
}
