<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function index(int $productId)
    {
        $reviews= DB::table('reviews')
            ->join('users','reviews.user_id', '=', 'users.id')
            ->join('products','reviews.product_id', '=', 'products.id')
            ->join('review_images','review_images.review_id', '=', 'reviews.id')
            ->select('users.name', 'reviews.text', 'products.id', 'review_images.image_path')
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
        $data = $request->all();

        $user = auth()->user();

        $review = new Review();

        $review->user_id = $user['id'];
        $review->product_id = $productId;
        $review->text = $data['text'];

        $review->save();

        if (!empty($request->images)) {
            foreach($request->images as $image) {

                $this->validate($request, [
                    'file' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                ]);

                $imageName = $image->getClientOriginalExtension();

                $filePath = $image->store('uploads','public');

                $image->move(public_path('images'), $imageName);

                ReviewImage::create([
                    'review_id' => $review['id'],
                    'image_name' => $imageName,
                    'image_path' => $filePath
                ]);
            }
        }

        return back()->with('success', 'Отзыв добавлен.');
    }
}
