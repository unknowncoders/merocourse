<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title') </title>

   @include('resources/all_header')

  </head>

  <body>
      
   @yield('header')


 @yield ('content')
   
      
   @include('resources/footer')
     

  </body>

</html>
