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
        $сategoriesWithReviews = Category::with('popular')->get()->toArray();

        $popularCategories = [];

        foreach ($сategoriesWithReviews as $categoryWithReviews) {
            if (count($categoryWithReviews['popular']) > 3) {
                $popularCategories[] = $categoryWithReviews;
            }
        }

        return view('popularCategory',['popularCategories' => $popularCategories,]);
    }
}
