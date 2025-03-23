<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Exception;

class AdminController extends Controller
{
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
            $data = new Category;
            $data->category_name = $request->category;
            $data->save();
            return redirect()->back()->with('message', 'Category added successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to add category.');
        }
    }

    public function delete_category($id)
    {
        try {
            $category = Category::find($id);
            if ($category) {
                $category->delete();
                return redirect()->back()->with('message', 'Category deleted successfully');
            }
            return redirect()->back()->with('error', 'Category not found');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete category.');
        }
    }

    public function view_product()
    {
        try {
            $category = Category::all();
            return view('admin.product', compact('category'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function add_product(Request $request)
    {
        try {
            $product = new Product;
            $product->title = $request->title;
            $product->description = $request->Description;
            $product->price = $request->price;
            $product->discount_price = $request->dis_price;
            $product->quantity = $request->quantity;
            $product->category = $request->category;
            
            $image = $request->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
            
            $product->save();
            return redirect()->back()->with('message', 'Product added successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to add product.');
        }
    }

    public function show_product()
    {
        try {
            $product = Product::all();
            return view('admin.show_product', compact('product'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
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
}
