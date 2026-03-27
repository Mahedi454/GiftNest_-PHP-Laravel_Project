<header class="navbar">
  <div class="container navbar__inner">
    <a class="brand" href="{{ route('home') }}">
      <img class="brand__logo" src="/gift-svgrepo-com.svg" alt="GiftNest logo" />
      <span class="brand__name">GiftNest</span>
    </a>

    <nav class="navlinks" aria-label="Primary">
      <a href="{{ route('shop') }}">Shop</a>
      <a href="{{ route('about') }}">About</a>
      <a href="{{ route('contact') }}">Contact</a>
    </nav>

    <div class="navactions">
      <a class="iconbtn" href="{{ route('wishlist') }}" aria-label="Wishlist" title="Wishlist">
        <span class="iconbtn__icon" aria-hidden="true">&#9825;</span>
      </a>
      <a class="iconbtn" href="{{ route('cart') }}" aria-label="Cart" title="Cart">
        <span class="iconbtn__icon" aria-hidden="true">&#128722;</span>
        <span class="badge" data-cart-count>0</span>
      </a>

      @auth
        @if (auth()->user()->isAdmin())
          <a class="btn btn--ghost" href="{{ route('admin.index') }}">Admin</a>
        @else
          <a class="btn btn--ghost" href="{{ route('dashboard') }}">Dashboard</a>
        @endif
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn" type="submit">Logout</button>
        </form>
      @else
        <a class="btn btn--ghost" href="{{ route('login') }}">Login</a>
        <a class="btn" href="{{ route('register') }}">Sign up</a>
      @endauth

      <button class="hamburger" type="button" aria-label="Open menu" data-mobile-menu-toggle>
        <img class="hamburger__icon" src="/line-3-svgrepo-com.svg" alt="" aria-hidden="true" />
      </button>
    </div>
  </div>

  <div class="mobilemenu" data-mobile-menu hidden>
    <div class="container mobilemenu__inner">
      <div class="mobilemenu__eyebrow">Explore GiftNest</div>
      <a href="{{ route('shop') }}">Shop</a>
      <a href="{{ route('about') }}">About</a>
      <a href="{{ route('contact') }}">Contact</a>
      <div class="mobilemenu__row">
        @auth
          @if (auth()->user()->isAdmin())
            <a class="btn btn--ghost" href="{{ route('admin.index') }}">Admin</a>
          @else
            <a class="btn btn--ghost" href="{{ route('dashboard') }}">Dashboard</a>
          @endif
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn" type="submit">Logout</button>
          </form>
        @else
          <a class="btn btn--ghost" href="{{ route('login') }}">Login</a>
          <a class="btn" href="{{ route('register') }}">Sign up</a>
        @endauth
      </div>
    </div>
  </div>
</header>
