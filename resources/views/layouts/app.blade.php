<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#0b1220" />
    <title>@yield('title', 'GiftNest - Thoughtful Gifts for Every Occasion')</title>
    <link rel="icon" type="image/svg+xml" href="/gift-svgrepo-com.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/main.css" />
    <link rel="stylesheet" href="/css/components.css" />
    <link rel="stylesheet" href="/css/responsive.css" />
  </head>
  <body>
    <div class="site-shell">
      <div class="site-glow site-glow--one" aria-hidden="true"></div>
      <div class="site-glow site-glow--two" aria-hidden="true"></div>
      <div class="site-grid" aria-hidden="true"></div>

      @include('components.navbar')

      <main class="container page">
        @yield('content')
      </main>

      @include('components.footer')
    </div>

    <script src="/js/app.js" defer></script>
    <script src="/js/cart.js" defer></script>
    <script src="/js/wishlist.js" defer></script>
  </body>
</html>
