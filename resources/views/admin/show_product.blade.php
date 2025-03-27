<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        .center {
            margin: auto;
            width: 90%;
            text-align: center;
            margin-top: 40px;
            border: 2px solid white;
        }
        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
            color: white;
        }
        .img_size {
            width: 150px;
            height: 150px;
        }
        .th_color {
            background: skyblue;
            color: black;
        }
        .th_deg {
            padding: 15px;
        }
        .center td {
            padding: 10px;
            color: white;
            border: 1px solid white;
        }
    
        .btn {
            padding: 5px 10px;
            margin: 2px;
            border-radius: 3px;
            text-decoration: none;
        }
    
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
    
        .btn-success {
            background-color: #28a745;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')

        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">×</button>
                </div>
                @endif

                <h2 class="font_size">All Products</h2>

                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Product Title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Category</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Discount Price</th>
                        <th class="th_deg">Product Image</th>
                        <th class="th_deg">Action</th>
                    </tr>
    
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>
                            <img class="img_size" src="{{ asset('product/' . $product->image) }}">
                        </td>
                        <td>
                            <a onclick="return confirm('Are You Sure To Delete This?')" class="btn btn-danger" href="{{url('admin/delete-product',$product->id)}}">Delete</a>
                            <a class="btn btn-success" href="{{url('admin/update-product',$product->id)}}">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @include('admin.script')
</body>
</html>
<style>
    .alert {
        padding: 15px;
        margin: 20px;
        border-radius: 4px;
        position: relative;
    }

    .alert-success {
        background-color: #28a745;
        color: white;
        border: 1px solid #218838;
    }

    .btn-close {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        color: white;
        font-size: 20px;
        cursor: pointer;
    }

    .content-wrapper {
        background-color: #191c24;  /* Dark background for better contrast */
    }

    table.center {
        background-color: #2c2c2c;  /* Darker table background */
    }

    .center td {
        background-color: #2c2c2c;  /* Darker cell background */
        color: #ffffff;  /* White text */
    }
</style>
