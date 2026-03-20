<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'GiftNest') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/components.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
  </head>
  <body>
    <main class="container page" style="padding-block: 4rem;">
      <section class="section-card" style="max-width: 760px; margin: 0 auto; text-align: center;">
        <span class="section-eyebrow">Laravel Project</span>
        <h1 style="margin-top: 1rem;">GiftNest is now aligned with HTML, CSS, JavaScript, PHP, and Laravel only.</h1>
        <p style="margin: 1rem 0 2rem; color: #5b6475;">
          The leftover starter frontend tooling was removed so your project stays focused on the stack you need for university.
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
          <a class="btn btn--primary" href="{{ route('home') }}">Open Home Page</a>
          <a class="btn btn--ghost" href="{{ route('shop') }}">Open Shop Page</a>
        </div>
      </section>
    </main>

    <script src="{{ asset('js/app.js') }}" defer></script>
  </body>
</html>
