<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Darryldecode\Cart\Facades\Cart;

class CartController extends Controller
{
    public function shop()
    {
        $products = Producto::all();
        // dd($products);
        return view('shop', ['title' => 'E-COMMERCE STORE | SHOP', 'products' => $products]);
    }

    public function cart()
    {
        $cartCollection = \Cart::getContent();
        return view('cart')->with('cartCollection', $cartCollection);
    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function add(Request $request)
    {
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a su Carrito!');
    }

    public function update(Request $request)
    {
        \Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear()
    {
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Cart is cleared!');
    }
}

