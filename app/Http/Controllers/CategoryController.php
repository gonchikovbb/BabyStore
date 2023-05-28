<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $data= Category::all();

        return view('category',['categories'=>$data]);
    }

    public function indexPopular()
    {
        $popularCategories = Category::with('getPopular')->get()->toArray();

        $countReviews = [];

        foreach ($popularCategories as $popularCategory) {
            $countReviews[$popularCategory['name']] = count($popularCategory['get_popular']);
        }

        arsort($countReviews);

        $category = array_keys($countReviews);

        if (empty($category)) {

            return view('popularCategory');

        } elseif (count($category) === 1) {

            $top1Category = Category::query()->where('name', '=', $category[0])->get()->toArray();

            return view('popularCategory',[
                'top1Category' => $top1Category,
                'countReviews' => $countReviews,
            ]);

        } elseif (count($countReviews) === 2) {

            $top1Category = Category::query()->where('name', '=', $category[0])->get()->toArray();
            $top2Category = Category::query()->where('name', '=', $category[1])->get()->toArray();

            return view('popularCategory',[
                'top1Category' => $top1Category,
                'top2Category' => $top2Category,
                'countReviews' => $countReviews,
            ]);

        } else {

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
