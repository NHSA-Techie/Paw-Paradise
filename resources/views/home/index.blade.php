<!DOCTYPE html>
<html lang="en">
   <head>
   @include('home.css')
   {{-- css bootstrap v5 --}}
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   {{-- javascript bootstrap v5 --}}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <!-- loader -->
      <div class="loader_bg">
         <div class="paw-loader">
            <span>🐾</span><span>🐾</span><span>🐾</span>
         </div>
      </div>
      <!-- end loader -->

      <!-- end loader -->
      <!-- header -->
      <header>
      @include('home.header')
      </header>
      <!-- end header -->

      {{-- start intro --}}
      @include('home.intro')
      {{-- end intro --}}

      <!-- banner -->
      {{-- @include('home.slider') --}}
      <!-- end banner -->

      <!-- about -->
      {{-- @include('home.about') --}}
      <!-- end about -->
      
      <!-- our_room -->
      {{-- @include('home.room') --}}
      <!-- end our_room -->

      <!-- gallery -->
      {{-- @include('home.gallery') --}}
      <!-- end gallery -->
    
      <!--  contact -->
      @include('home.contact')
      <!-- end contact -->

      <!--  footer -->
      @include('home.footer')
      <!-- end footer -->


      {{-- make it in the same position after sending message --}}
      <script>
         $(window).scroll(function() {
            sessionStorage.scrollTop = $(this).scrollTop();
         });

         $(document).ready(function() {
         if (sessionStorage.scrollTop != "undefined") {
            $(window).scrollTop(sessionStorage.scrollTop);
         }
         });

      </script>
      
   </body>
</html>