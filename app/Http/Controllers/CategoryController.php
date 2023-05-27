<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $data= Category::all();

        return view('category',['categories'=>$data]);
    }

    public function indexPopular()
    {
        $Reviews= DB::table('products')
            ->join('reviews','products.id', '=', 'reviews.product_id')
            ->join('categories','categories.id', '=', 'products.category_id')
            ->select('categories.name', 'categories.id', 'reviews.text')
            ->get();

        $Reviews = json_decode($Reviews,true);

        $countAllReviews = [];

        foreach ($Reviews as $key => $review){
            $countAllReviews[$key] = $review['name'];
        }

        $countReviews = array_count_values($countAllReviews);


        if (empty($countReviews)) {

            return view('popularCategory');

        } elseif (count($countReviews) === 1) {

            $category = array_keys($countReviews);

            $top1Category = Category::query()->where('name', '=', $category[0])->get()->toArray();

            return view('popularCategory',[
                'top1Category' => $top1Category,
                'countReviews' => $countReviews,
            ]);

        } elseif (count($countReviews) === 2) {

            arsort($countReviews);

            $category = array_keys($countReviews);

            $top1Category = Category::query()->where('name', '=', $category[0])->get()->toArray();
            $top2Category = Category::query()->where('name', '=', $category[1])->get()->toArray();

            return view('popularCategory',[
                'top1Category' => $top1Category,
                'top2Category' => $top2Category,
                'countReviews' => $countReviews,
            ]);

        } else {

            arsort($countReviews);

            $category = array_keys($countReviews);

            $top1Category = Category::query()->where('name', '=', $category[0])->get()->toArray();
            $top2Category = Category::query()->where('name', '=', $category[1])->get()->toArray();
            $top3Category = Category::query()->where('name', '=', $category[2])->get()->toArray();


            return view('popularCategory',[
                'top1Category' => $top1Category,
                'top2Category' => $top2Category,
                'top3Category' => $top3Category,
                'countReviews' => $countReviews,
            ]);
        }
    }
}
