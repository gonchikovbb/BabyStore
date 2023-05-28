<?php

namespace App\Services;

use App\Models\ReviewImage;
use Illuminate\Http\Request;
use App\Exceptions\SaveImageException;
class SaveReviewService
{
    public function saveImageReview(Request $request, int $reviewId)
    {
        try {
            if (!empty($request->images)) {
                foreach($request->images as $image) {

                    $request->validate([
                        'file' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                    ]);

                    $imageName = $image->getClientOriginalExtension();

                    $filePath = $image->store('uploads','public');

                    $image->move(public_path('images'), $imageName);

                    ReviewImage::create([
                        'review_id' => $reviewId,
                        'image_name' => $imageName,
                        'image_path' => $filePath
                    ]);
                }
            }
        } catch (\Exception $e) {
            $image->store('uploads','public')->delete($imageName);
            throw new SaveImageException("Don't save images",0, $e);
        }
    }
}
