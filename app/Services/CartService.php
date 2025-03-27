<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Exception;

class CartService
{
    public function addToCart($request, $productId)
    {
        try {
            if (!Auth::check()) {
                return redirect('login');
            }

            $user = Auth::user();
            $product = Product::find($productId);

            if (!$product) {
                return redirect()->back()->with('error', 'Product not found.');
            }

            $cart = new Cart();
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->Product_title = $product->title;
            $cart->price = $product->discount_price ? $product->discount_price * $request->quantity : $product->price * $request->quantity;
            $cart->image = $product->image;
            $cart->Product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->save();

            return redirect()->back()->with('message', 'Added to cart successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to add to cart.');
        }
    }

    public function getCartItems()
    {
        try {
            if (!Auth::check()) {
                return redirect('login');
            }

            $id = Auth::user()->id;
            return Cart::where('user_id', $id)->get();
        } catch (Exception $e) {
            return [];
        }
    }

    public function removeCartItem($cartId)
    {
        try {
            $cart = Cart::find($cartId);

            if (!$cart) {
                return redirect()->back()->with('error', 'Cart item not found.');
            }

            $cart->delete();
            return redirect()->back()->with('message', 'Cart item removed.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to remove cart item.');
        }
    }
}