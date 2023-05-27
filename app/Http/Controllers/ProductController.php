<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data= Product::all();

        return view('product',['products'=>$data]);
    }

    public function showByCategoryId(int $categoryId)
    {
        $data= Product::where('category_id', 'like', $categoryId)->get();

        $category = Category::query()->find($categoryId);

        return view('productsByCategory',['products'=>$data, 'category' => $category]);
    }

    public function search(Request $request)
    {
        $dataProduct= Product::where('name', 'like', '%'.$request->input('query').'%')->get();

        $dataCategory= Category::where('name', 'like', '%'.$request->input('query').'%')->get();

        return view('search',['products'=>$dataProduct, 'categories' => $dataCategory]);
    }
}
