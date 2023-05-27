<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = auth()->user();

        $carts= DB::table('carts')

            ->join('products','products.id', '=', 'carts.product_id')
            ->select('products.name', 'carts.id')
            ->where('user_id', '=', $user['id'])->get()->toArray();

        $arrCarts = [];

        foreach ($carts as $cart) {
            $arrCarts[] = json_decode(json_encode($cart,true),true);
        }

        return view('cart',['carts'=>$arrCarts]);
    }

    public function addToCart(Request $request)
    {
        $user = auth()->user();

        if($user) {
            $cart = new Cart;

            $cart->user_id = $user['id'];

            $cart->product_id = $request->product_id;

            $cart->save();

            return back()->with('success', 'Товар успешно добавлен.');
        } else {
            return redirect('/login');
        }
    }

    function removeCart($id)
    {
        Cart::destroy($id);

        return redirect('carts');
    }
}
