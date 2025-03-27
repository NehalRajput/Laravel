<!DOCTYPE html>
<html>
<head>
    @include('home.css')
    <style>
        .product-details {
            padding: 100px 0 60px 0;
            background: #f8f9fa;
        }
        
        .product-image {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            overflow: hidden;
            background: white;
            padding: 20px;
        }
        
        .product-image img {
            width: 100%;
            height: 400px; /* Reduced height */
            object-fit: contain; /* Changed to contain for better product visibility */
            transition: all 0.3s ease;
        }
        
        .product-info {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        
        .product-title {
            font-size: 28px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 20px;
            border-bottom: 2px solid #f1f1f1;
            padding-bottom: 15px;
        }
        
        .product-price {
            font-size: 24px;
            color: #27ae60;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .original-price {
            color: #e74c3c;
            text-decoration: line-through;
            font-size: 18px;
        }
        
        .product-description {
            font-size: 16px;
            color: #666;
            line-height: 1.8;
            margin-bottom: 30px;
            padding: 20px 0;
            border-top: 1px solid #f1f1f1;
            border-bottom: 1px solid #f1f1f1;
        }
        
        .quantity-section {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .quantity-input {
            width: 120px;
            padding: 12px;
            border-radius: 8px;
            border: 2px solid #eee;
            text-align: center;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .quantity-input:focus {
            border-color: #27ae60;
            outline: none;
        }
        
        .add-to-cart-btn {
            width: 100%;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 8px;
            background: #27ae60;
            border: none;
            color: white;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .add-to-cart-btn:hover {
            background: #219a52;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .product-image img {
                height: 300px;
            }
            
            .product-info {
                margin-top: 30px;
            }
        }
    </style>
</head>
<body>
    @include('home.header')

    <div class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-image">
                        <img src="/product/{{$product->image}}" alt="{{$product->title}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-info">
                        <h1 class="product-title">{{$product->title}}</h1>
                        
                        <div class="product-price">
                            @if($product->discount_price != null)
                                <span class="original-price">${{$product->price}}</span>
                                <span>${{$product->discount_price}}</span>
                            @else
                                <span>${{$product->price}}</span>
                            @endif
                        </div>

                        <p class="product-description">{{$product->description}}</p>

                        <form id="addToCartForm" action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <input type="number" name="quantity" value="1" min="1">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                        
                        <div id="cartMessage" class="alert" style="display: none;"></div>
                        
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                        $(document).ready(function() {
                            $('#addToCartForm').on('submit', function(e) {
                                e.preventDefault();
                                
                                $.ajax({
                                    url: $(this).attr('action'),
                                    type: 'POST',
                                    data: $(this).serialize(),
                                    success: function(response) {
                                        $('#cartMessage')
                                            .removeClass('alert-danger')
                                            .addClass('alert-success')
                                            .html(response.message)
                                            .fadeIn();
                                        
                                        // Update cart count if you have a cart counter in header
                                        $('.cart-count').text(response.cart_count);
                                        
                                        setTimeout(function() {
                                            $('#cartMessage').fadeOut();
                                        }, 3000);
                                    },
                                    error: function(xhr) {
                                        $('#cartMessage')
                                            .removeClass('alert-success')
                                            .addClass('alert-danger')
                                            .html('Failed to add product to cart')
                                            .fadeIn();
                                    }
                                });
                            });
                        });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home.footer')
    @include('home.script')
</body>
</html>
