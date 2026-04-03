@extends('layouts.app')

@section('title', 'GiftNest - Thoughtful Gifts for Every Occasion')

@section('content')
  @php
    $heroItems = $heroProducts->take(3)->values();
    $spotlightCount = $heroItems->count() ?: max(1, $featuredProducts->count());
  @endphp

  <section class="hero hero--showcase">
    <div class="hero-showcase">
      <div class="hero-showcase__content">
        <div class="hero-showcase__eyebrow">
          <span class="kicker">Modern gifting for Bangladesh</span>
          <span class="chip">Same-day friendly</span>
        </div>

        <h1>Find the right gift with ease.</h1>

        <p class="lead hero-showcase__lead">
          Discover curated picks for birthdays, campus surprises, and everyday celebrations with a smoother shopping experience from first click to checkout.
        </p>

        <div class="hero-showcase__actions">
          <a class="btn" href="{{ route('shop') }}">Shop now</a>
          <a class="btn btn--ghost" href="{{ route('about') }}">Learn more</a>
        </div>

        <div class="hero-showcase__stats">
          <div class="hero-showcase__stat card">
            <div class="hero-showcase__statValue">{{ count($featuredProducts) + count($heroProducts) }}+</div>
            <div class="hero-showcase__statLabel">Featured gift picks</div>
          </div>
          <div class="hero-showcase__stat card">
            <div class="hero-showcase__statValue">{{ $categoryCount }}</div>
            <div class="hero-showcase__statLabel">Gift categories</div>
          </div>
          <div class="hero-showcase__stat card">
            <div class="hero-showcase__statValue">24h</div>
            <div class="hero-showcase__statLabel">Fast local dispatch</div>
          </div>
        </div>
      </div>

      <div class="hero-showcase__panel card">
        <div class="hero-showcase__panelHead">
          <div class="hero-showcase__panelTitle">
            <span class="hero-showcase__panelKicker">Curated now</span>
            <h2>Today's Picks</h2>
            <p>Selected from your new gift catalog</p>
          </div>
          <span class="chip">Trending</span>
        </div>

        <div class="hero-showcase__promo">
          <div>
            <div class="hero-showcase__promoLabel">This week</div>
            <p>Ready-to-ship gifts selected from the latest collection</p>
          </div>
          <a class="hero-showcase__promoLink" href="{{ route('shop') }}">Explore collection</a>
        </div>

        @if ($heroItems->isNotEmpty())
          <div class="hero-showcase__products">
            @foreach ($heroItems as $product)
              @php
                $productImagePath = $product->image ? public_path('images/products/' . $product->image) : null;
                $productImageUrl = $productImagePath && file_exists($productImagePath)
                  ? '/images/products/' . $product->image . '?v=' . filemtime($productImagePath)
                  : '';
              @endphp

              <article class="hero-mini card">
                <a class="hero-mini__media" href="{{ route('product.show', $product) }}">
                  @if ($productImageUrl)
                    <img src="{{ $productImageUrl }}" alt="{{ $product->name }}" class="hero-mini__image" />
                  @else
                    <div class="hero-mini__placeholder">{{ $product->name }}</div>
                  @endif
                  <span class="hero-mini__tag">
                    {{ ['Best Seller', 'Elegant', 'Romantic'][$loop->index] ?? 'Gift Pick' }}
                  </span>
                </a>

                <div class="hero-mini__body">
                  <div class="hero-mini__meta">
                    <span>Ready to ship</span>
                  </div>

                  <h3 class="hero-mini__title">
                    <a href="{{ route('product.show', $product) }}">{{ $product->name }}</a>
                  </h3>

                  <div class="hero-mini__price">Tk {{ number_format((float) $product->price, 0) }}</div>
                  <p class="hero-mini__text">
                    {{ \Illuminate\Support\Str::limit($product->description, 52) }}
                  </p>

                  <div class="hero-mini__actions">
                    <form method="POST" action="{{ route('cart.store', $product) }}">
                      @csrf
                      <button class="btn" type="submit">Add</button>
                    </form>
                  </div>
                </div>
              </article>
            @endforeach
          </div>
        @else
          <div class="hero-showcase__empty">
            <div class="empty">
              <div class="empty__title">No picks yet</div>
              <div class="empty__subtitle">Add a few products to the catalog to populate this section.</div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>

  <section class="section section--tight why-giftnest">
    <div class="section__head">
      <div>
        <div class="kicker">Why GiftNest</div>
        <h2>A simple gifting flow made for quick decisions</h2>
      </div>
    </div>

    <div class="grid grid--3">
      <article class="feature-panel card feature-panel--home">
        <div class="feature-panel__icon">01</div>
        <h3>Browse curated picks</h3>
        <p>Explore a focused collection of gifts for birthdays, campus moments, and everyday surprises without unnecessary clutter.</p>
      </article>

      <article class="feature-panel card feature-panel--home">
        <div class="feature-panel__icon">02</div>
        <h3>Add to cart in seconds</h3>
        <p>Use the simple session-based cart to collect your favorites and adjust quantities quickly before checkout.</p>
      </article>

      <article class="feature-panel card feature-panel--home">
        <div class="feature-panel__icon">03</div>
        <h3>Place a smooth order</h3>
        <p>Complete checkout with basic delivery details and finish the order flow with a clean, beginner-friendly experience.</p>
      </article>
    </div>
  </section>

  <section class="section">
    <div class="section__head">
      <div>
        <div class="kicker">Featured collection</div>
        <h2>Thoughtful picks that look good and ship beautifully</h2>
      </div>
      <a class="link" href="{{ route('shop') }}">View all</a>
    </div>
    <div class="grid grid--4">
      @foreach ($featuredProducts as $product)
        <x-product-card :product="$product" />
      @endforeach
    </div>
  </section>
@endsection
