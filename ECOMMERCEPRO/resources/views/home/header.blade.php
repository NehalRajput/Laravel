<header class="header_section">
   <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container">
         <!-- Logo / Brand Name -->
         <a class="navbar-brand site-name" href="{{url('/')}}">
             <span class="logo-text">Unique<span class="highlight">Fashion</span></span>
         </a>

         <!-- Mobile Toggle Button -->
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
         </button>

         <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav">
               <li class="nav-item active">
                  <a class="nav-link" href="{{url('/')}}">Home</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Pages</a>
                  <ul class="dropdown-menu">
                     <li><a href="about.html">About</a></li>
                     <li><a href="testimonial.html">Testimonial</a></li>
                  </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="product.html">Products</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="blog_list.html">Blog</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact</a>
               </li>
            </ul>

            <!-- Right Side (Search, Cart, Login) -->
            <div class="navbar-right">
               <!-- Search Form -->
               <form class="form-inline search-form">
                   <input type="text" class="search-input" placeholder="Search...">
                   <button class="btn search-btn" type="submit">
                      <i class="fa fa-search"></i>
                   </button>
               </form>

               <!-- Cart -->
               <a class="cart-icon" href="{{ url('show_cart') }}">
                  <i class="fa fa-shopping-cart"></i> Cart
               </a>

               <!-- Login/Register Buttons -->
               @if (Route::has('login'))
                  @auth
                     <li class="nav-item">
                        <x-app-layout></x-app-layout>
                     </li>
                  @else
                     <a class="btn login-btn" href="{{ route('login') }}">Login</a>
                     <a class="btn register-btn" href="{{ route('register') }}">Register</a>
                  @endauth
               @endif
            </div>
         </div>
      </nav>
   </div>
</header>
