@extends('layouts.app')

@section('title', 'GiftNest · Home')

@section('content')
  <section class="hero">
    <div class="hero__grid">
      <div class="hero__copy">
        <div class="kicker">Apple-clean · Glassmorphism · Bangladesh-ready</div>
        <h1>Find the perfect gift—fast.</h1>
        <p class="lead">
          Curated gifts for students and local shoppers. Simple checkout, smooth UI, and ready for bKash/SSLCommerz integration.
        </p>
        <div class="hero__cta">
          <a class="btn" href="{{ route('shop') }}">Shop now</a>
          <a class="btn btn--ghost" href="{{ route('about') }}">Learn more</a>
        </div>
        <div class="hero__stats">
          <div class="stat">
            <div class="stat__value">Fast</div>
            <div class="stat__label">Shopping flow</div>
          </div>
          <div class="stat">
            <div class="stat__value">Clean</div>
            <div class="stat__label">Modern UI</div>
          </div>
          <div class="stat">
            <div class="stat__value">Ready</div>
            <div class="stat__label">Payments (BD)</div>
          </div>
        </div>
      </div>

      <div class="hero__showcase">
        <div class="card hero-card">
          <div class="hero-card__top">
            <div>
              <div class="hero-card__title">Today’s Picks</div>
              <div class="hero-card__subtitle">Popular with students</div>
            </div>
            <span class="chip">New</span>
          </div>
          <div class="grid grid--3">
            @include('components.product-card', ['id' => 1, 'name' => 'Mini Teddy', 'price' => 399, 'badge' => 'Cute'])
            @include('components.product-card', ['id' => 2, 'name' => 'Chocolate Box', 'price' => 549, 'badge' => 'Sweet'])
            @include('components.product-card', ['id' => 3, 'name' => 'Notebook Set', 'price' => 299, 'badge' => 'Study'])
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="section__head">
      <h2>Featured products</h2>
      <a class="link" href="{{ route('shop') }}">View all</a>
    </div>
    <div class="grid grid--4">
      @include('components.product-card', ['id' => 4, 'name' => 'Keychain Pack', 'price' => 199, 'badge' => 'Budget'])
      @include('components.product-card', ['id' => 5, 'name' => 'Mug (Minimal)', 'price' => 499, 'badge' => 'Daily'])
      @include('components.product-card', ['id' => 6, 'name' => 'Perfume (Mini)', 'price' => 699, 'badge' => 'Gift'])
      @include('components.product-card', ['id' => 7, 'name' => 'Photo Frame', 'price' => 599, 'badge' => 'Memory'])
    </div>
  </section>
@endsection

