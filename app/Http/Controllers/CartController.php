<?php

namespace App\Http\Controllers;

use App\Models\SandwichModel;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session('cart', []);

        $sandwiches = SandwichModel::findMany(array_keys($cartItems));

        foreach ($sandwiches as $sandwich) {
            $sandwich->setAttribute('aantal', $cartItems[$sandwich->productid]);
        }

        return view('cart/cart', ['cartItems' => $sandwiches]);
    }

    public function updateCart (Request $request)
    {
        $cartItems = session('cart', []);
        $newCart = $request->get('cart', []);
        session(['cart' => $newCart]);

        return response()->json($newCart);
    }
}
