<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class CartService
{
    public function addToCart(Request $request, $id)
    {
        try {
            if (Auth::id()) {
                $user = Auth::user();
                $product = \App\Models\Product::find($id);

                $cart = new Cart;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;
                $cart->Product_title = $product->title;
                $cart->price = $product->discount_price ?? $product->price;
                $cart->quantity = $request->quantity;
                $cart->image = $product->image;
                $cart->Product_id = $product->id;
                $cart->save();

                return redirect()->back()->with('message', 'Product Added Successfully');
            } else {
                return redirect('login');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to add product to cart.');
        }
    }

    public function removeCartItem($id)
    {
        try {
            Cart::find($id)->delete();
            return redirect()->back()->with('message', 'Product Removed Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to remove product from cart.');
        }
    }
}
