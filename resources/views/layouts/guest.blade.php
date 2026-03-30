<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'GiftNest') }}</title>
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

      <x-navbar />

      <main class="container page">
        <section class="section auth">
          <div class="auth__shell">
            <div class="auth__intro">
              <div class="kicker">GiftNest Account</div>
              <h1>Simple authentication for your storefront.</h1>
              <p class="lead">Laravel Breeze is now powering the auth flow while keeping the GiftNest UI clean and easy to follow.</p>
            </div>

            <div class="auth__card card">
              {{ $slot }}
            </div>
          </div>
        </section>
      </main>

      <x-footer />
    </div>

    <script src="/js/app.js" defer></script>
  </body>
</html>
