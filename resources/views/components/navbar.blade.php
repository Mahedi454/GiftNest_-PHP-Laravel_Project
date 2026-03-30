<header class="navbar">
  @php
    $cartCount = collect(session('cart', []))->sum('quantity');
    $user = auth()->user();
    $userInitials = $user
      ? collect(explode(' ', trim($user->name)))
          ->filter()
          ->take(2)
          ->map(fn ($part) => strtoupper(substr($part, 0, 1)))
          ->implode('')
      : '';
  @endphp

  <div class="container navbar__inner">
    <a class="brand" href="{{ route('home') }}">
      <img class="brand__logo" src="/gift-svgrepo-com.svg" alt="GiftNest logo" />
      <span class="brand__name">GiftNest</span>
    </a>

    <nav class="navlinks" aria-label="Primary">
      <a href="{{ route('home') }}">Home</a>
      <a href="{{ route('shop') }}">Shop</a>
      <a href="{{ route('about') }}">About</a>
    </nav>

    <div class="navactions">
      <a class="iconbtn" href="{{ route('cart') }}" aria-label="View cart">
        <svg class="iconbtn__svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <path d="M3 4h2l2.4 10.2a1 1 0 0 0 1 .8h8.9a1 1 0 0 0 1-.8L20 7H7" />
          <circle cx="10" cy="19" r="1.5" />
          <circle cx="17" cy="19" r="1.5" />
        </svg>
        @if ($cartCount > 0)
          <span class="badge">{{ $cartCount }}</span>
        @endif
      </a>

      @auth
        @if (auth()->user()->isAdmin())
          <a class="btn btn--ghost" href="{{ route('admin.index') }}">Admin</a>
        @endif
        <div class="profilemenu" data-profile-menu>
          <button class="profilemenu__trigger" type="button" aria-label="Open profile menu" data-profile-menu-toggle>
            <span class="profilemenu__avatar">{{ $userInitials }}</span>
            <span class="profilemenu__meta">
              <span class="profilemenu__name">{{ $user->name }}</span>
              <span class="profilemenu__role">{{ $user->isAdmin() ? 'Administrator' : 'Customer' }}</span>
            </span>
          </button>

          <div class="profilemenu__dropdown" data-profile-menu-panel hidden>
            <a class="profilemenu__link" href="{{ route('profile.edit') }}">My profile</a>
            @unless ($user->isAdmin())
              <a class="profilemenu__link" href="{{ route('orders') }}">My orders</a>
            @endunless
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="profilemenu__logout" type="submit">Logout</button>
            </form>
          </div>
        </div>
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
      <div class="mobilemenu__eyebrow">Simple shopping, clean flow</div>
      <a href="{{ route('home') }}">Home</a>
      <a href="{{ route('shop') }}">Shop</a>
      <a href="{{ route('about') }}">About</a>
      <a href="{{ route('cart') }}">Cart</a>
      <div class="mobilemenu__row">
        @auth
          @if (auth()->user()->isAdmin())
            <a class="btn btn--ghost" href="{{ route('admin.index') }}">Admin</a>
          @else
            <a class="btn btn--ghost" href="{{ route('orders') }}">Orders</a>
          @endif
          <a class="btn btn--ghost" href="{{ route('profile.edit') }}">Profile</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn--ghost" type="submit">Logout</button>
          </form>
        @else
          <a class="btn btn--ghost" href="{{ route('login') }}">Login</a>
          <a class="btn" href="{{ route('register') }}">Sign up</a>
        @endauth
      </div>
    </div>
  </div>
</header>
