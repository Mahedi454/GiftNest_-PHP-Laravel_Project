@extends('layouts.app')

@section('title', 'GiftNest - Thoughtful Gifts for Every Occasion')

@section('content')
  <section class="hero">
    <div class="hero__grid">
      <div class="hero__copy">
        <div class="hero__eyebrow">
          <span class="kicker">Modern gifting for Bangladesh</span>
          <span class="chip chip--strong">Same-day friendly</span>
        </div>
        <h1>Find the right gift with ease.</h1>
        <p class="lead">
          Discover curated picks for birthdays, campus surprises, and everyday celebrations with a smoother shopping experience from first click to checkout.
        </p>
        <div class="hero__cta">
          <a class="btn" href="{{ route('shop') }}">Shop now</a>
          <a class="btn btn--ghost" href="{{ route('about') }}">Learn more</a>
        </div>
        <div class="hero__stats">
          <div class="stat">
            <div class="stat__value">{{ count($featuredProducts) + count($heroProducts) }}+</div>
            <div class="stat__label">Featured gift picks</div>
          </div>
          <div class="stat">
            <div class="stat__value">6</div>
            <div class="stat__label">Gift categories</div>
          </div>
          <div class="stat">
            <div class="stat__value">24h</div>
            <div class="stat__label">Fast local dispatch</div>
          </div>
        </div>
      </div>

      <div class="hero__showcase">
        <div class="card hero-card">
          <div class="hero-card__top">
            <div>
              <div class="hero-card__title">Today's Picks</div>
              <div class="hero-card__subtitle">Selected from your new gift catalog</div>
            </div>
            <span class="chip chip--strong">Trending</span>
          </div>
          <div class="hero-card__feature">
            <div>
              <div class="hero-card__featureLabel">This week</div>
              <div class="hero-card__featureValue">Flowers, jewelry, chocolates, and curated hampers</div>
            </div>
            <a class="link" href="{{ route('shop') }}">Explore collection</a>
          </div>
          <div class="grid grid--3">
            @foreach ($heroProducts as $product)
              @include('components.product-card', $product)
            @endforeach
          </div>
        </div>
      </div>
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
        @include('components.product-card', $product)
      @endforeach
    </div>
  </section>

  <section class="section">
    <div class="grid grid--3">
      <article class="card feature-panel">
        <div class="feature-panel__icon">01</div>
        <h3>Real shop-ready catalog</h3>
        <p>Your storefront now has named products, categories, and image slots prepared for the uploaded collection.</p>
      </article>
      <article class="card feature-panel">
        <div class="feature-panel__icon">02</div>
        <h3>Consistent framed images</h3>
        <p>Every product card now uses a cleaner image frame so mixed image sizes still look neat inside the grid.</p>
      </article>
      <article class="card feature-panel">
        <div class="feature-panel__icon">03</div>
        <h3>Flexible for expansion</h3>
        <p>The shared product catalog keeps the storefront organized and makes collection updates easy to manage.</p>
      </article>
    </div>
  </section>
@endsection
