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

        $countRewiews = [];

        foreach ($Reviews as $key => $review){
            $countRewiews[$key] = $review['name'];
        }

        $countRewiews = array_count_values($countRewiews);

        arsort($countRewiews);

        $popularCategory = array_key_first($countRewiews);

        $data= Category::query()->where('name', '=', $popularCategory)->get();

        return view('popularCategory',['categories'=>$data]);
    }
}
