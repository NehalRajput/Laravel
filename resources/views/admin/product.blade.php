

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add this line after your Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
            max-width: 800px;
            margin: 0 auto;
        }
    
        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
            color: white;
        }
    
        .div_design {
            margin-bottom: 20px;
            text-align: left;
        }
    
        label {
            display: inline-block;
            width: 200px;
            color: white;
            vertical-align: top;
            margin-right: 10px;
        }
    
        .text_color {
            color: black;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 300px;
            display: inline-block;
        }
    
        select.text_color {
            height: 40px;
            background: white;
        }
    
        .btn-primary {
            padding: 10px 20px;
            font-size: 16px;
            margin-top: 20px;
            background-color: #0d6efd;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
    
        .btn-primary:hover {
            background-color: #0b5ed7;
        }
    
        input[type="file"] {
            color: white;
        }
    
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
    
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
    
        .btn-close {
            float: right;
            font-size: 20px;
            font-weight: bold;
            line-height: 1;
            color: #000;
            opacity: .5;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
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
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">×</button>
                </div>
                @endif

                <div class="div_center">
                    <h1 class="font_size">Add Product</h1>

                    <form action="{{ route('admin.add-product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="div_design">
                            <label>Product Title :</label>
                            <input class="text_color" type="text" name="product_title" placeholder="Write a title" required>
                        </div>
    
                        <div class="div_design">
                            <label>Product Description :</label>
                            <input class="text_color" type="text" name="product_description" placeholder="Write a description" required>
                        </div>
    
                        <div class="div_design">
                            <label>Product Price :</label>
                            <input class="text_color" type="number" name="product_price" placeholder="Write a price" required>
                        </div>
    
                        <div class="div_design">
                            <label>Discount Price :</label>
                            <input class="text_color" type="number" name="discount_price" placeholder="Write a discount">
                        </div>
    
                        <div class="div_design">
                            <label>Product Quantity :</label>
                            <input class="text_color" type="number" name="product_quantity" placeholder="Write a quantity" required>
                        </div>
    
                        <div class="div_design">
                            <label>Product Category :</label>
                            <select class="text_color" name="product_category" required>
                                <option value="" selected>Add a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="div_design">
                            <label>Product Image :</label>
                            <input type="file" name="image" accept="image/*" required>
                        </div>
    
                        <div class="div_design">
                            <input type="submit" value="Add Product" class="btn btn-primary">
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
        <script>
            $(document).ready(function() {
                $('.nav-link[data-toggle="collapse"]').on('click', function(e) {
                    e.preventDefault();
                    $($(this).attr('href')).toggleClass('show');
                });
            });
        </script>
    </body>
</html>
