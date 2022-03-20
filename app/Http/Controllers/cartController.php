<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class cartController extends Controller
{
    public function insert(Request $request)
    {
        $dish = Dish::where('dish_id', $request->dish_id)->first();
        Cart::add([
            'id' => $request->dish_id,
            'qty' => $request->qty,
            'name' => $dish->dish_name,
            'price' => $dish->full_price,
            'weight' => 558,
            'options' => [
                'half_price' => $dish->half_price,
                'image' => $dish->dish_image,
            ],
        ]);

        return redirect()->route('cart_show')->with('');
    }

    public function show()
    {
        $cartDish = Cart::content();
        return view('FrontEnd.cart.show', compact('cartDish'));
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);

        return back();
    }

    public function update(Request $request)
    {
        Cart::update($request->rowId, $request->qty);

        return back();
    }
}
