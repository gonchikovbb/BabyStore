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
    public function add(Request $request)
    {
        $productId=$request->product_id;

        $reviews= DB::table('reviews')

            ->join('users','reviews.user_id', '=', 'users.id')
            ->join('products','reviews.product_id', '=', 'products.id')
            ->select('users.name', 'reviews.text', 'products.id')
            ->where('product_id', '=', $productId)->get()->toArray();

        return view('addReview',['reviews'=>$reviews, $productId]);
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

        $fileName = $request->file->getClientOriginalName();

        $reviewId = $review['id'];

        $filePath = $request->file->store('uploads','public');

        $request->file->move(public_path('file'), $fileName);

        ReviewImage::create([
            'review_id' => $reviewId,
            'image_name' => $fileName,
            'image_path' => $filePath
        ]);

        return redirect('/products');
    }
}
