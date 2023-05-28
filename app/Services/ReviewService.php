<?php

namespace App\Services;

use App\Models\Review;
use App\Models\ReviewImage;
use App\Exceptions\ReviewException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReviewService
{
    public function saveReview(Review $review, array $images)
    {
        try {
            DB::beginTransaction();

            $review->save();

            if (!empty($images)) {
                foreach($images as $image) {

                    $imageName = $image->getClientOriginalExtension();

                    $filePath = $image->store('uploads','public');

                    $image->move(public_path('images'), $imageName);

                    ReviewImage::create([
                        'review_id' => $review['id'],
                        'image_name' => $imageName,
                        'image_path' => $filePath
                    ]);

                    DB::commit();
                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Storage::disk('public')->delete($filePath);
            throw new ReviewException("Don't save review with images",0, $e);
        }
    }
}
