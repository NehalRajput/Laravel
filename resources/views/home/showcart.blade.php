<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
    <title>Shopping Cart</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- Font Awesome -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom Styles -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

    <style>
        .cart-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .cart-table th, .cart-table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .cart-table th {
            background-color: #f8f9fa;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .cart-table img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .cart-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .total-price {
            font-size: 22px;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
        }

        .checkout-btn {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- Header -->
        @include('home.header')

        <div class="cart-container">
            <h2 class="text-center">Shopping Cart</h2>

            @if(session()->has('message'))
                <div class="alert alert-success text-center">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session()->get('message') }}
                </div>
            @endif

            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalprice = 0 ?>

                    @foreach ($cart as $cartItem)
                        <tr>
                            <td>{{ $cartItem->product_title }}</td>
                            <td>{{ $cartItem->quantity }}</td>
                            <td>${{ $cartItem->price }}</td>
                            <td><img src="{{ asset('product/' . $cartItem->image) }}" alt="Product Image"></td>
                            <td>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this product?')" href="{{ url('/remove_cart/' . $cartItem->id) }}">Remove</a>
                            </td>
                        </tr>
                        <?php $totalprice += $cartItem->price ?>
                    @endforeach
                </tbody>
            </table>

            <div class="total-price">
                <h4>Total Price: ${{ $totalprice }}</h4>
            </div>

            <div class="checkout-btn">
                <a href="{{ url('/cash-order') }}" class="btn btn-danger">Cash On Delivery</a>
                <a href="{{ url('/stripe', $totalprice) }}" class="btn btn-primary">Pay Using Card</a>
            </div>
        </div>

        <!-- Footer -->
        @include('home.footer')
    </div>

    <!-- jQuery -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('home/js/custom.js') }}"></script>
</body>
</html>
