@extends('layouts.app')

@section('title', 'GiftNest - About')

@section('content')
  <section class="about-hero">
    <div class="about-hero__grid">
      <div class="about-hero__copy">
        <div class="kicker">About GiftNest</div>
        <h1>We make gifting simple and special.</h1>
        <p class="lead">
          GiftNest is built for shoppers who want beautiful gifts without the stress of browsing low-quality options, confusing layouts, or last-minute checkout friction.
        </p>

        <div class="about-hero__stats">
          <div class="stat">
            <div class="stat__value">22+</div>
            <div class="stat__label">Curated products</div>
          </div>
          <div class="stat">
            <div class="stat__value">7</div>
            <div class="stat__label">Gift categories</div>
          </div>
          <div class="stat">
            <div class="stat__value">24h</div>
            <div class="stat__label">Fast local response</div>
          </div>
        </div>
      </div>

      <div class="card about-hero__panel">
        <div class="about-hero__panelLabel">What GiftNest stands for</div>
        <h2>Curated gifting with a polished shopping experience</h2>
        <p>
          We focus on products that feel presentable, gift-ready, and relevant for birthdays, celebrations, student life, and romantic moments.
        </p>
        <div class="about-hero__chips">
          <span class="chip">Flowers</span>
          <span class="chip">Jewelry</span>
          <span class="chip">Perfumes</span>
          <span class="chip">Chocolate gifts</span>
          <span class="chip">Gift hampers</span>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="section__head">
      <div>
        <div class="kicker">Our story</div>
        <h2>Designed for gifting moments that should feel special, not complicated</h2>
      </div>
    </div>

    <div class="about-story">
      <article class="card about-story__main">
        <p>
          GiftNest started with a simple idea: people should be able to discover meaningful gifts quickly without sacrificing presentation or trust. Too many online stores feel cluttered, inconsistent, or hard to navigate when you are already short on time.
        </p>
        <p>
          This storefront is shaped around a better experience. Products are curated into clear categories, presented in a cleaner frame, and supported by a warmer, more modern interface that feels closer to a premium boutique than a generic catalog.
        </p>
      </article>

      <aside class="card about-story__side">
        <div class="about-point">
          <div class="about-point__title">Who we serve</div>
          <p>Students, couples, families, and local shoppers looking for stylish, gift-ready options in Bangladesh.</p>
        </div>
        <div class="about-point">
          <div class="about-point__title">What we curate</div>
          <p>Flowers, jewelry, personalized gifts, stationery, perfumes, chocolates, and ready-made gift bundles.</p>
        </div>
        <div class="about-point">
          <div class="about-point__title">What we value</div>
          <p>Clarity, visual quality, gift presentation, and a shopping flow that feels simple from start to finish.</p>
        </div>
      </aside>
    </div>
  </section>

  <section class="section">
    <div class="section__head">
      <div>
        <div class="kicker">Why choose us</div>
        <h2>A professional gifting experience built around trust and presentation</h2>
      </div>
    </div>

    <div class="grid grid--3">
      <article class="card feature-panel about-feature">
        <div class="feature-panel__icon">01</div>
        <h3>Curated catalog</h3>
        <p>Every item is chosen to fit real gifting occasions instead of filling the shop with random products.</p>
      </article>
      <article class="card feature-panel about-feature">
        <div class="feature-panel__icon">02</div>
        <h3>Cleaner presentation</h3>
        <p>Framed product images, balanced spacing, and polished cards help every product feel more premium.</p>
      </article>
      <article class="card feature-panel about-feature">
        <div class="feature-panel__icon">03</div>
        <h3>Local-ready experience</h3>
        <p>The storefront is designed around familiar buying habits and gift needs for Bangladeshi shoppers.</p>
      </article>
    </div>
  </section>

  <section class="section">
    <div class="card about-process">
      <div class="section__head">
        <div>
          <div class="kicker">How it works</div>
          <h2>From discovery to delivery in a smoother flow</h2>
        </div>
      </div>

      <div class="about-process__grid">
        <div class="about-step">
          <div class="about-step__number">1</div>
          <h3>Browse by occasion</h3>
          <p>Explore flowers, jewelry, gift boxes, chocolate bouquets, and other curated picks.</p>
        </div>
        <div class="about-step">
          <div class="about-step__number">2</div>
          <h3>Choose a polished gift</h3>
          <p>View product details in a cleaner layout with clearer categories, imagery, and pricing.</p>
        </div>
        <div class="about-step">
          <div class="about-step__number">3</div>
          <h3>Send with confidence</h3>
          <p>Move into checkout with a more thoughtful storefront experience designed to feel trustworthy.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="about-cta card">
      <div>
        <div class="kicker">Explore GiftNest</div>
        <h2>Find a gift that looks good before it even gets delivered</h2>
        <p class="lead">Browse the latest collection or reach out if you want help choosing something more personal.</p>
      </div>
      <div class="about-cta__actions">
        <a class="btn" href="{{ route('shop') }}">Shop the collection</a>
        <a class="btn btn--ghost" href="{{ route('contact') }}">Contact us</a>
      </div>
    </div>
  </section>
@endsection
