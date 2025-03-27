<!DOCTYPE html>
<html>
<head>
    @include('home.css')
</head>
<body>
    <div class="hero_area">
        <!-- header section -->
        @include('home.header')
        
        <!-- slider section -->
        @include('home.slider')
    </div>

    <!-- why section -->
    @include('home.why')

    <!-- Static Blocks Section -->
    <section class="static_blocks_section">
        <div class="container">
            @foreach($blocks as $block)
                <div class="static-block">
                    <h3>{{ $block->title }}</h3>
                    <div class="content">
                        {!! $block->content !!}
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- product section -->
    @include('home.product')

    <!-- arrival section -->
    @include('home.new_arrival')

    <!-- subscribe section -->
    @include('home.subscriber')

    <!-- client section -->
    @include('home.client')

    <!-- footer section -->
    @include('home.footer')

    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>
</html>