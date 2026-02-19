<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')

    @include('admin.slidebar')
    
    {{-- this is where u edit body --}}
    @include('admin.body')

    @include('admin.footer')
    
  </body>
</html>