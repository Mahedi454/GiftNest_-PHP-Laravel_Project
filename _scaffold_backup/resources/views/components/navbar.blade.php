<header class="navbar">
  <div class="container navbar__inner">
    <a class="brand" href="{{ route('home') }}">
      <span class="brand__mark">GN</span>
      <span class="brand__name">GiftNest</span>
    </a>

    <nav class="navlinks" aria-label="Primary">
      <a href="{{ route('shop') }}">Shop</a>
      <a href="{{ route('about') }}">About</a>
      <a href="{{ route('contact') }}">Contact</a>
    </nav>

    <div class="navactions">
      <button class="iconbtn" type="button" data-darkmode-toggle aria-label="Toggle dark mode" title="Toggle dark mode">
        <span class="iconbtn__icon" aria-hidden="true">◐</span>
      </button>
      <a class="iconbtn" href="{{ route('wishlist') }}" aria-label="Wishlist" title="Wishlist">
        <span class="iconbtn__icon" aria-hidden="true">♡</span>
      </a>
      <a class="iconbtn" href="{{ route('cart') }}" aria-label="Cart" title="Cart">
        <span class="iconbtn__icon" aria-hidden="true">🛒</span>
        <span class="badge" data-cart-count>0</span>
      </a>
      <a class="btn btn--ghost" href="{{ route('login') }}">Login</a>
      <a class="btn" href="{{ route('register') }}">Sign up</a>
      <button class="hamburger" type="button" aria-label="Open menu" data-mobile-menu-toggle>
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>

  <div class="mobilemenu" data-mobile-menu hidden>
    <div class="container mobilemenu__inner">
      <a href="{{ route('shop') }}">Shop</a>
      <a href="{{ route('about') }}">About</a>
      <a href="{{ route('contact') }}">Contact</a>
      <div class="mobilemenu__row">
        <a class="btn btn--ghost" href="{{ route('login') }}">Login</a>
        <a class="btn" href="{{ route('register') }}">Sign up</a>
      </div>
    </div>
  </div>
</header>

