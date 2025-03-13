<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class AdminController extends Controller
{
    //

    public function view_category()
    {
       
        $data = category::all();
       
        return view('admin.category',compact('data'));

    }

    public function add_category(Request $request)
    {
       //STORING PRODUCT ON CATEGORY MODEL 
       $data = new Category;
       
       $data->category_name = $request->category;
       $data->save();
       return redirect()->back()->with('message','category added successfully');
    }
    
    public function delete_category($id)
    {

        $data=Category::find($id);
        $data->delete();
        return redirect()->back()->with('message','category deleted successfully');
    }
    public function view_product()
    {
        return view('admin.product');
    }
}

