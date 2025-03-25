<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Services\CartService;
use App\Models\Cart;
use Exception;

class HomeController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function index()
    {
        try {
            $product = Product::paginate(10);
            return view('home.userpage', compact('product'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
    public function product_details($id)
{
    try {
        $product = Product::findOrFail($id); // Find the product by ID
        return view('home.product_details', compact('product')); // Pass data to view
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Product not found.');
    }
}

    public function add_cart(Request $request, $id)
    {
        return $this->cartService->addToCart($request, $id);
    }

    public function show_cart()
    {
        try {
            if (Auth::id()) {
                $id = Auth::user()->id;
                $cart = Cart::where('user_id', $id)->get();  // Fetch cart items
                return view('home.showcart', compact('cart'));  // Pass to view
            } else {
                return redirect('login');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
    

    public function remove_cart($id)
    {
        return $this->cartService->removeCartItem($id);
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
    } 
    catch (Exception $e) {
        return redirect()->back()->with('error', 'Failed to place order.');
    }
}
  // public function stripe($totalprice)
//{

  //    return view('home.stripe',compact('totalprice'));
//}





    public function redirect()
    {
        try {
          //  dd("hello");
            $usertype = Auth::user()->usertype;

            if ($usertype == '1') {
                $total_product = Product::all()->count();
                $total_order = Order::all()->count();
                $total_user = User::all()->count();
                $order = Order::all();
                $total_revenue = 0;

                foreach($order as $order) {
                    $total_revenue = $total_revenue + $order->price;
                }

                $total_delivered = Order::where('delivery_status', '=', 'delivered')->get()->count();
                $total_processing = Order::where('delivery_status', '=', 'processing')->get()->count();

                return view('admin.home', compact(
                    'total_product',
                    'total_order',
                    'total_user',
                    'total_revenue',
                    'total_delivered',
                    'total_processing'
                ));
            } else {
                $product = Product::paginate(10);
                return view('home.userpage', compact('product'));
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Access Denied');
        }
    }
} // End of class