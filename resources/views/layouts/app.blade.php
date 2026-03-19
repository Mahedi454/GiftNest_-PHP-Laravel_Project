<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#0b1220" />
    <title>@yield('title', 'GiftNest')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/components.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
  </head>
  <body>
    @include('components.navbar')

    <main class="container page">
      @yield('content')
    </main>

    @include('components.footer')

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/cart.js') }}" defer></script>
    <script src="{{ asset('js/wishlist.js') }}" defer></script>
    <script src="{{ asset('js/darkmode.js') }}" defer></script>
  </body>
</html>

