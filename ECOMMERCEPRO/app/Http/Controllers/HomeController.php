<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Exception;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $product = Product::paginate(10);
            return view('home.userpage', compact('product'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function redirect()
    {
        try {
            $usertype = Auth::user()->usertype;
            if ($usertype === '1') {
                return view('admin.home');
            } else {
                $product = Product::paginate(10);
                return view('home.userpage', compact('product'));
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function product_details($id)
    {
        try {
            $product = Product::find($id);
            return view('home.product_details', compact('product'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    }

    public function add_cart(Request $request, $id)
    {
        try {
            if (Auth::id()) {
                $user = Auth::user();
                $product = Product::find($id);
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
                return redirect()->back();
            } else {
                return redirect('login');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to add to cart.');
        }
    }

    public function show_cart()
    {
        try {
            if (Auth::id()) {
                $id = Auth::user()->id;
                $cart = Cart::where('user_id', $id)->get();
                return view('home.showcart', compact('cart'));
            } else {
                return redirect('login');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function remove_cart($id)
    {
        try {
            $cart = Cart::find($id);
            if ($cart) {
                $cart->delete();
                return redirect()->back();
            }
            return redirect()->back()->with('error', 'Cart item not found.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to remove cart item.');
        }
    }

    public function cash_order()
    {
        try {
            $user = Auth::user();
            $userid = $user->id;
            $data = Cart::where('user_id', $userid)->get();
            
            foreach ($data as $cartItem) {
                $order = new Order();
                $order->name = $cartItem->name;
                $order->email = $cartItem->email;
                $order->phone = $cartItem->phone;
                $order->address = $cartItem->address;
                $order->user_id = $cartItem->user_id;
                $order->product_title = $cartItem->Product_title;
                $order->price = $cartItem->price;
                $order->quantity = $cartItem->quantity;
                $order->image = $cartItem->image;
                $order->product_id = $cartItem->Product_id;
                $order->payment_status = 'cash on delivery';
                $order->delivery_status = 'processing';
                $order->save();
                $cartItem->delete();
            }
            
            return redirect()->back()->with('message', 'We have received your order. We will connect with you soon.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to place order.');
        }
    }
}
