<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    private ReviewService $saveReviewService;

    public function __construct(ReviewService $saveReviewService)
    {
        $this->saveReviewService = $saveReviewService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function index(int $productId)
    {
        $reviews = DB::table('reviews')
            ->join('users','reviews.user_id', '=', 'users.id')
            ->join('products','reviews.product_id', '=', 'products.id')
            ->join('review_images','review_images.review_id', '=', 'reviews.id')
            ->select('users.name', 'reviews.text', 'review_images.image_path')
            ->where('product_id', '=', $productId)->get()->toArray();

        return view('addReview',['reviews' => $reviews, 'product_id' => $productId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(Request $request, int $productId)
    {
        $request->validate([
            'text' => 'required|max:500',
            'file' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $data = $request->all();

        $review = new Review();

        $user = auth()->user();

        $review->user_id = $user['id'];
        $review->product_id = $productId;
        $review->text = $data['text'];

        $this->saveReviewService->saveReview($review, $request->images);

        return back()->with('success', 'Отзыв добавлен.');
    }
}
