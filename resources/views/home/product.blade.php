<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">

            @foreach ($product as $item)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ route('product.details', $item->id) }}" class="option1">
                                    <i class="fa fa-eye"></i> View Details
                                </a>
                                
                                <form action="{{ route('cart.add', $item->id) }}" method="Post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="add-to-cart-btn w-100">
                                                <i class="fa fa-shopping-cart"></i> Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="product/{{ $item->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $item->title }}
                            </h5>
                            @if ($item->discount_price != null)
                                <h6 style="color: red;">
                                    Discount Price
                                    <br>
                                    ${{ $item->discount_price }}
                                </h6>
                                <h6 style="text-decoration: line-through; color:rgb(104, 68, 68)">
                                    Price
                                    <br>
                                    ${{ $item->price }}
                                </h6>
                            @else
                                <h6 style="color: rgb(104, 68, 68)">
                                    Price
                                    <br>
                                    ${{ $item->price }}
                                </h6>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

            <span style="padding-top:20px">
                {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
            </span>

        </div>
</section>
