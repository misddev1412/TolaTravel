<?php

namespace App\Http\Controllers\Frontend;


use App\Commons\APICode;
use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    private $review;
    private $response;

    public function __construct(Review $review, Response $response)
    {
        $this->review = $review;
        $this->response = $response;
    }

    public function create(Request $request)
    {
        $validator = $this->review->validateCreate($request);
        if ($validator->code == APICode::SUCCESS) {
            $review = new Review();
            $review->user_id = Auth::id();
            $review->place_id = $request->place_id;
            $review->score = $request->score;
            $review->comment = $request->comment;
            $review->save();
        }
        return $this->response->formatResponse($validator->code, [], $validator->message);
    }
}