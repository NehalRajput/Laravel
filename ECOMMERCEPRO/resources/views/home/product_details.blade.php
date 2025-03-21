<!DOCTYPE html>
<html>
<head>
    <base href="/public">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Product Details</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- Font Awesome -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom Styles -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- Responsive Styles -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="hero_area">
        <!-- Header Section -->
        @include('home.header')

        <div class="container" style="padding: 50px 0;">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-lg p-4">
                        <div class="text-center">
                            <img src="{{ asset('product/' . $product->image) }}" 
                                 alt="Product Image" 
                                 style="width: 300px; height: 300px; object-fit: cover; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
                        </div>
                        <div class="card-body text-center">
                            <h3 class="mb-3">{{ $product->title }}</h3>

                            @if ($product->discount_price != null)
                                <h4 class="text-danger">
                                    Discount Price: ${{ $product->discount_price }}
                                </h4>
                                <h5 style="text-decoration: line-through; color:rgb(104, 68, 68)">
                                    Original Price: ${{ $product->price }}
                                </h5>
                            @else
                                <h4 style="color: rgb(104, 68, 68)">
                                    Price: ${{ $product->price }}
                                </h4>
                            @endif

                            <p><strong>Category:</strong> {{ $product->category }}</p>
                            <p><strong>Description:</strong> {{ $product->description }}</p>
                            <p><strong>Available Quantity:</strong> {{ $product->quantity }}</p>

                            <form action="{{ url('/add_cart', $product->id) }}" method="POST">
                                @csrf
                                <div class="d-flex justify-content-center align-items-center">
                                    <input type="number" name="quantity" value="1" min="1" class="form-control w-25">
                                    <input type="submit" value="Add to Cart" class="btn btn-primary ml-2">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Section -->
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
