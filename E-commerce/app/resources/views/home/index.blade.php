<!DOCTYPE html>
<html lang="en">
    <head>

        @include('home.css')

    </head>


   <body>
      <!-- header section start -->
        @include('home.header')
    
      <!-- header section end -->
      <!-- banner section start -->
     @include('home.banner')
      <!-- banner section end -->
      <!-- product section start -->
      
      @include('home.product')
      <!-- product section end -->

      <!-- about section start -->
    
      @include('home.about')
      <!-- about section end -->


      <!-- customer section start -->
      @include('home.customer')
      <!-- customer section end -->
      <!-- contact section start -->
     
      @include('home.contact')
      <!-- contact section end -->
      <!-- footer section start -->
      @include('home.footer')
      <!-- footer section end -->

      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>  
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "100%";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script> 
   </body>
</html>