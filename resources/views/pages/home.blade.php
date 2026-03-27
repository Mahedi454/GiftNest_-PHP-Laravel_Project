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
            <div class="stat__value">{{ $categoryCount }}</div>
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
              <div class="hero-card__subtitle">Selected from your live product catalog</div>
            </div>
            <span class="chip chip--strong">Trending</span>
          </div>
          <div class="hero-card__feature">
            <div>
              <div class="hero-card__featureLabel">This week</div>
              <div class="hero-card__featureValue">Products are now managed from the admin dashboard and loaded from MySQL.</div>
            </div>
            <a class="link" href="{{ route('shop') }}">Explore collection</a>
          </div>
          <div class="grid grid--3">
            @foreach ($heroProducts as $product)
              @include('components.product-card', ['id' => $product->id, 'name' => $product->name, 'price' => $product->price, 'image' => $product->image, 'category' => $product->category->name])
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
        @include('components.product-card', ['id' => $product->id, 'name' => $product->name, 'price' => $product->price, 'image' => $product->image, 'category' => $product->category->name])
      @endforeach
    </div>
  </section>
@endsection
