<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;

        }

        .text_color {
            color: black;
            padding-bottom: 20px;

        }
        label{
            display: inline-block;
            width: 200px;

        }
        .div_design
        {
            padding-bottom: 15px;

        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->

        @include('admin.sidebar')
        <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
               
                    @if(session()->has('message'))

                    <div class="alert alert-success">
    
                        <button type="button" class="close" data-dismiss="alert" aria-hidden ="true">x</button>
    
                        {{session()->get('message')}}   
                    </div>
    
    
                    @endif
                    <div class="div_center">
                    <h1 class="font_size">Update Product</h1>

                    <form action="{{url('admin/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                
                   

                    <div class="div_design">
                        <label>Product Title :</label>
                        <input class="text_color" type="text" name="title" placeholder="write a title" required="" value ="{{$product->title}}">

                    </div>
                    <div class="div_design">
                        <label>Product Description :</label>
                        <input class="text_color" type="text" name="Description" placeholder="write a Description" required="" value="{{$product->description}}">

                    </div>
                    <div class ="div_design">
                        <label>Product Price :</label>
                        <input class="text_color" type="number" name="price" placeholder="write a price" required="" value="{{$product->price}}">

                    </div>
                    <div class="div_design">
                        <label>Discount Price</label>
                        <input class="text_color" type="number" name="dis_price" placeholder="write a Discount is apply" required="" value="{{$product->discount_price}}">

                    </div>
                    <div class="div_design">
                        <label>Product Quantity :</label>
                        <input class="text_color" type="number" min="0" name="quantity" placeholder="write a quantity" required="" value="{{$product->quantity}}">

                    </div>
                   
                    <div class="div_design">
                        <label>Product Category :</label>
                          <select class="text_color" name="category" required="">
                            <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                            @foreach ($category as $category)
                            
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach

                            
                          </select>
                    </div>

                    <div class="div_design">
                        <label>current Product Image :</label>

                           <img style="margin:auto;" height="100" width="100" src="{{ asset('product/'.$product->image) }}" alt="Product Image">

                    </div>

                    <div class="div_design">
                        <label>Change Product Image :</label>a
                      <input type="file" name="image">
                    </div>
  

                    <div class="div_design">
                        <input type="submit" value="Update Product" class="btn btn-primary">
                    </div>
                
                </form>
                </div>
          
            </div>
        </div>
        <!-- main-panel ends -->


        <!-- page-body-wrapper ends -->

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
</body>

</html>
