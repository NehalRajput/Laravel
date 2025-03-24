<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;


class AdminController extends Controller
{
    public function index()
    {
        $total_product = Product::count();
        $total_order = Order::count();
        $total_user = User::count();
        $total_revenue = Order::sum('price');
        $total_delivered = Order::where('delivery_status', 'delivered')->count();
        $total_processing = Order::where('delivery_status', 'processing')->count();

        return view('admin.home', compact(
            'total_product',
            'total_order',
            'total_user',
            'total_revenue',
            'total_delivered',
            'total_processing'
        ));
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function view_category()
    {
        try {
            $data = Category::all();
            return view('admin.category', compact('data'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function add_category(Request $request)
    {
        try {
            $category = new Category;
            $category->category_name = $request->category;
            $category->save();
            return redirect()->back()->with('message', 'Category Added Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to add category.');
        }
    }

    public function delete_category($id)
    {
        try {
            Category::find($id)->delete();
            return redirect()->back()->with('message', 'Category Deleted Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete category.');
        }
    }
}
