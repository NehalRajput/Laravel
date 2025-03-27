<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Exception;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        try {
            $request->validate([
                'category' => 'required|string|max:255|unique:categories,category_name'
            ]);
    
            $category = new Category;
            $category->category_name = $request->category;
            $category->save();
    
            return response()->json([
                'success' => true,
                'category' => $category,
                'message' => 'Category added successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add category: ' . $e->getMessage()
            ], 422);
        }
    }

    public function delete_category($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->back()->with('message', 'Category Deleted Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete category');
        }
    }

    public function view_product()
    {
        $categories = Category::all();
        return view('admin.product', compact('categories'));
    }

    public function add_product(Request $request)
    {
        try {
            $product = new Product;
            $product->title = $request->product_title;
            $product->description = $request->product_description;
            $product->price = $request->product_price;
            $product->discount_price = $request->discount_price;
            $product->quantity = $request->product_quantity;
            $product->category = $request->product_category;
            
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $image->move('product', $imagename);
                $product->image = $imagename;
            }
            
            $product->save();
            return redirect()->back()->with('message', 'Product Added Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add product: ' . $e->getMessage());
        }
    }

    public function show_product()
    {
        try {
            $products = Product::all();
            return view('admin.show_product', compact('products'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to fetch products: ' . $e->getMessage());
        }
    }

    public function delete_product($id)
    {
        try {
            $product = Product::find($id);
            if ($product) {
                $product->delete();
                return redirect()->back()->with('message', 'Product deleted successfully');
            }
            return redirect()->back()->with('error', 'Product not found');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete product.');
        }
    }

    public function update_product($id)
    {
        try {
            $product = Product::find($id);
            $category = Category::all();
            return view('admin.update_product', compact('product', 'category'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function update_product_confirm(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            $product->title = $request->title;
            $product->description = $request->Description;
            $product->price = $request->price;
            $product->discount_price = $request->dis_price;
            $product->category = $request->category;
            $product->quantity = $request->quantity;
            
            if ($request->hasFile('image')) {
                $image = $request->image;
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $request->image->move('product', $imagename);
                $product->image = $imagename;
            }
            
            $product->save();
            return redirect()->back()->with('message', 'Product updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to update product.');
        }
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        Product::create([
            'title' => $request->title,
            'description' => $request->description, // Summernote stores as HTML
        ]);
    
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function index()
    {
        $total_product = Product::count();
        $total_order = Order::count();
        $total_user = User::count();
        $total_revenue = Order::sum('price');
        $order = Order::all();
    
        return view('admin.home', compact('total_product', 'total_order', 'total_user', 'total_revenue', 'order'));
    }
}
