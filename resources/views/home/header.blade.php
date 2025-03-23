<header class="header_section">
   <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container">
         <a class="navbar-brand site-name" href="{{url('/')}}">
             <span class="logo-text">Unique<span class="highlight">Fashion</span></span>
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <i class="fa fa-bars"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="{{url('/')}}">Home</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                     Pages
                  </a>
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
               <li class="nav-item">
                  <a href="{{ url('show-cart') }}" class="nav-link cart-link">
                     <i class="fa fa-shopping-cart"></i>
                     <span class="cart-text">Cart</span>
                  </a>
               </li>
               <li class="nav-item">
                  <form class="search-form">
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                           <button class="btn search-btn" type="submit">
                              <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </form>
               </li>
               @if (Route::has('login'))
                  @auth
                     <li class="nav-item">
                        <x-app-layout></x-app-layout>
                     </li>
                  @else
                     <li class="nav-item">
                        <a class="btn btn-login" href="{{ route('login') }}">Login</a>
                     </li>
                     <li class="nav-item">
                        <a class="btn btn-register" href="{{ route('register') }}">Register</a>
                     </li>
                  @endauth
               @endif
            </ul>
         </div>
      </nav>
   </div>
</header>
