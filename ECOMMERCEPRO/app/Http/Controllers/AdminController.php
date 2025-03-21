<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\file;

use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    //

    public function view_category()
    {

        $data = category::all();
        
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        //STORING PRODUCT ON CATEGORY MODEL 
        $data = new Category;

        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'category added successfully');
    }

    public function delete_category($id)
    {
        $category = category::find($id);
        // dd($category);
    
        if ($category) {
            $category->delete();
            return redirect()->back()->with('message', 'Category deleted successfully');
        }

    
        return redirect()->back()->with('error', 'Category not found');
    }

    public function view_product()
    {
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {


        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->Description;
        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        
        $image = $request->image;

        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product',$imagename);
      $product->image =$imagename;

      
      $product->save();
      return redirect()->back()->with('message', 'product added successfully');
    }

    public function show_product()
    {
        $product = product::all();
        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('message','product deleted successfully');



    }

    public function update_product($id)
    {
        $product = product::find($id);

        $category = category::all();

        return view('admin.update_product',compact('product','category'));

    }
    
    public function update_product_confirm(Request $request, $id)
    {
        $product = product::find($id);

        $product->title = $request->title;
        $product->description = $request->Description;

        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;


        $image= $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image =$imagename;
        }
        
        $product->save();

        return redirect()->back()->with('message','product updated successfully');
        



    }
}


