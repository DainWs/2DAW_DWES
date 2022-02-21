<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('titulo')</title>
  </head>
  <body>
    <header>
        @section('header')
        <h1>No header specified</h1>
        @show
    </header>
    <div class="container">
        @yield('content')
    </div>  
    <footer>
        @section('footer')
        <h1>No footer specified</h1>
        @show
    </footer>
  </body>
</html>