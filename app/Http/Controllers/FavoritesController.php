<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = auth()->user();

        $favoritesProducts = Favorites::with('getFavorites')->where('user_id', '=', $user['id'])->get()->toArray();

        return view('favorites',['favorites'=>$favoritesProducts]);
    }

    public function addToFavorites(Request $request)
    {
        $user = auth()->user();

        if($user) {
            $favorites = new Favorites;

            $favorites->user_id = $user['id'];

            $favorites->product_id = $request->product_id;

            $favorites->save();

            return back()->with('success', 'Товар успешно добавлен.');
        } else {
            return redirect('/login');
        }
    }

    function removeFromFavorites(int $id)
    {
        Favorites::destroy($id);

        return redirect('favorites');
    }
}
