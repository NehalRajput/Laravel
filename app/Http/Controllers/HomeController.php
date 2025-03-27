<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Services\CartService;
use App\Models\StaticBlock;
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
            $blocks = StaticBlock::where('status', true)->get();
            return view('home.userpage', compact('product', 'blocks'));
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
        try {
            $result = $this->cartService->addToCart($request, $id);
            
            if($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Product added to cart successfully',
                    'cart_count' => Cart::where('user_id', Auth::id())->count()
                ]);
            }
            
            return $result;
        } catch (Exception $e) {
            if($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to add product to cart'
                ], 422);
            }
            return redirect()->back()->with('error', 'Failed to add to cart');
        }
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
        try {
            $cart_item = Cart::findOrFail($id);
            $cart_item->delete();
            return redirect()->back()->with('message', 'Product removed from cart successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to remove product from cart');
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
        if(Auth::user()->usertype == '1')
        {
            return view('admin.home');
        }
        else
        {
            return redirect('/');
        }
    }
    public function products()
    {
        $products = Product::all();
        return view('home.products', compact('products'));
    }
} // End of class