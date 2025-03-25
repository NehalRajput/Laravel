<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
        .center {


            margin: auto;
            width: 50%;
            border: 2px solid grey;
            text-align: center;
            margin-top: 40px;


        }

        .font_size {

            text-align: center;
            font-size: 40px;
            padding-top: 20px
        }

        .img_size {
            width: 150px;
            height: 150px;

        }

        .th_color {
            background: skyblue;

        }
    
        .th_deg
        {
           padding: 25px;
           
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

        <!-- main-panel ends -->

        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))

                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden ="true">x</button>

                    {{session()->get('message')}}   
                </div>
                @endif

                <h2 class="font_size">All Products</h2>

                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">Producttitle</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Category</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">DiscountPrice</th>
                        <th class="th_deg">ProductImage</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Edit</th>

                      
                    </tr>



                    @foreach ($product as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->category }}</td>

                            <td>{{ $product->price }}</td>
                            <td>{{ $product->discount_price }}</td>
                            <td>
                                <img class="img_size" src="/product/{{ $product->image }}" alt="">
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ url('admin/delete-product/'.$product->id) }}">Delete</a>

                            </td>
                            <td>
                                <a class="btn btn-success" href="{{ url('admin/update-product/'.$product->id) }}">Edit</a>

                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>

        <!-- page-body-wrapper ends -->

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
</body>

</html>