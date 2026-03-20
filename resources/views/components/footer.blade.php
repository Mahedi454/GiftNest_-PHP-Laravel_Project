<footer class="footer">
  <div class="container footer__inner">
    <div class="footer__left">
      <div class="footer__brand">
        <img class="brand__logo" src="/gift-svgrepo-com.svg" alt="GiftNest logo" />
        <div>
          <div class="footer__title">GiftNest</div>
          <div class="footer__subtitle">Thoughtful gifts for students, friends, and local shoppers across Bangladesh.</div>
        </div>
      </div>
      <p class="footer__copy">
        Designed for quick discovery, friendly checkout, and moments that still feel personal.
      </p>
      <div class="footer__meta">
        <span class="chip">Cash on Delivery</span>
        <span class="chip">bKash-ready</span>
        <span class="chip">SSLCommerz-ready</span>
      </div>
    </div>

    <div class="footer__right">
      <div class="footer__col">
        <div class="footer__heading">Explore</div>
        <a href="{{ route('shop') }}">Shop</a>
        <a href="{{ route('wishlist') }}">Wishlist</a>
        <a href="{{ route('orders') }}">Orders</a>
      </div>
      <div class="footer__col">
        <div class="footer__heading">Company</div>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('contact') }}">Contact</a>
      </div>
      <div class="footer__col">
        <div class="footer__heading">Account</div>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('admin.index') }}">Admin</a>
      </div>
    </div>
  </div>

  <div class="container footer__bottom">
    <span>&copy; {{ date('Y') }} GiftNest. All rights reserved.</span>
    <span class="footer__small">Built for a smoother gifting experience.</span>
  </div>
</footer>
