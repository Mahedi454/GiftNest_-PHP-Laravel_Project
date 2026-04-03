<footer class="footer">
  <div class="container footer__inner">
    <div class="footer__left">
      <div class="footer__brand">
        <img class="brand__logo" src="/gift-svgrepo-com.svg" alt="GiftNest logo" />
        <div>
          <div class="footer__title">GiftNest</div>
          <div class="footer__subtitle">A simple and modern Laravel gift shop for your university showcase project.</div>
        </div>
      </div>
      <p class="footer__copy">
        Built with reusable Blade components, a clean layout system, and a beginner-friendly storefront structure.
      </p>
      <div class="footer__meta">
        <span class="chip">Laravel MVC</span>
        <span class="chip">Session Cart</span>
        <span class="chip">Responsive UI</span>
      </div>
    </div>

    <div class="footer__right">
      <div class="footer__col">
        <div class="footer__heading">Store</div>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('shop') }}">Shop</a>
        <a href="{{ route('cart') }}">Cart</a>
        <a href="{{ route('checkout') }}">Checkout</a>
      </div>
      <div class="footer__col">
        <div class="footer__heading">Account</div>
        @auth
          <a href="{{ route('orders') }}">Orders</a>
          @if (auth()->user()->isAdmin())
            <a href="{{ route('admin.index') }}">Admin Panel</a>
          @endif
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="footer__button" type="submit">Logout</button>
          </form>
        @else
          <a href="{{ route('login') }}">Login</a>
          <a href="{{ route('register') }}">Register</a>
        @endauth
      </div>
    </div>
  </div>

  <div class="container footer__bottom">
    <span>&copy; {{ date('Y') }} GiftNest. All rights reserved.</span>
    <span class="footer__small">Built with Laravel, Blade, and PostgreSQL.</span>
  </div>
</footer>
