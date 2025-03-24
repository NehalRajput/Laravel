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

        <div class="product-details-container">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="product-details-card">
                            <div class="product-details-image">
                                <img src="{{ asset('product/' . $product->image) }}" alt="{{ $product->title }}">
                            </div>
                            <div class="product-details-content">
                                <h1 class="product-title-large">{{ $product->title }}</h1>

                                @if ($product->discount_price != null)
                                    <div class="price-tag">
                                        Discount Price: ${{ $product->discount_price }}
                                    </div>
                                    <span class="original-price-tag">
                                        Original Price: ${{ $product->price }}
                                    </span>
                                @else
                                    <div class="price-tag">
                                        Price: ${{ $product->price }}
                                    </div>
                                @endif

                                <div class="product-info">
                                    <p><strong>Category:</strong> {{ $product->category }}</p>
                                    <p><strong>Description:</strong> {{ $product->description }}</p>
                                    <p><strong>Available Quantity:</strong> {{ $product->quantity }}</p>
                                </div>

                                <div class="quantity-section">
                                    @auth
                                        <form action="{{ url('/add-cart', $product->id) }}" method="POST">
                                            @csrf
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="quantity-wrapper">
                                                    <label for="quantity" class="form-label">Quantity:</label>
                                                    <input type="number" id="quantity" name="quantity" value="1" min="1" 
                                                           class="form-control quantity-input">
                                                </div>
                                                <button type="submit" class="add-to-cart-button">
                                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                                </button>
                                            </div>
                                        </form>
                                    @else
                                        <div class="login-prompt">
                                            <a href="{{ route('login') }}" class="btn btn-login">
                                                <i class="fa fa-sign-in"></i> Login to Purchase
                                            </a>
                                        </div>
                                    @endauth
                                </div>
                            </div>
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
