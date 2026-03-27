<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#0b1220" />
    <title>@yield('title', 'Admin - GiftNest')</title>
    <link rel="icon" type="image/svg+xml" href="/gift-svgrepo-com.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/main.css" />
    <link rel="stylesheet" href="/css/components.css" />
    <link rel="stylesheet" href="/css/responsive.css" />
  </head>
  <body class="admin">
    <header class="admin-topbar">
      <div class="container admin-topbar__inner">
        <a class="brand" href="{{ route('admin.index') }}">
          <img class="brand__logo" src="/gift-svgrepo-com.svg" alt="GiftNest logo" />
          <span class="brand__name">GiftNest</span>
          <span class="brand__sub">Admin</span>
        </a>
        <nav class="admin-nav">
          <a href="{{ route('admin.index') }}">Dashboard</a>
          <a href="{{ route('admin.products') }}">Products</a>
          <a href="{{ route('admin.categories') }}">Categories</a>
          <a href="{{ route('admin.orders') }}">Orders</a>
          <a href="{{ route('admin.users') }}">Users</a>
        </nav>
        <div style="display:flex; gap:0.75rem; align-items:center;">
          <a class="btn btn--ghost" href="{{ route('home') }}">View site</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn" type="submit">Logout</button>
          </form>
        </div>
      </div>
    </header>

    <main class="container page">
      @yield('content')
    </main>

    <script src="/js/app.js" defer></script>
  </body>
  </html>
