@extends('layouts.app')

@section('title', 'GiftNest - About')

@section('content')
  <section class="section">
    <div class="section__head">
      <div>
        <div class="kicker">About GiftNest</div>
        <h1>Thoughtful gifting with a more refined shopping experience.</h1>
      </div>
      <div class="muted">GiftNest is built around curated products, clear presentation, and a dependable checkout journey.</div>
    </div>

    <div class="grid grid--2 about-page__intro">
      <article class="card prose about-page__panel">
        <div class="kicker">Our approach</div>
        <h2>Curated products, cleaner decisions</h2>
        <p>
          GiftNest is designed to make gift shopping feel lighter, faster, and more considered. Instead of overwhelming
          customers with clutter, the experience focuses on a selective catalog, clear product presentation, and a checkout
          flow that feels simple from start to finish.
        </p>
        <p>
          Every part of the storefront is shaped around ease of use, from discoverability and cart handling to order
          placement and admin-side catalog maintenance. The result is a store experience that feels polished, readable,
          and easy to trust.
        </p>
      </article>

      <article class="card about-page__panel about-page__panel--accent">
        <div class="kicker">What we value</div>
        <h2>Presentation, clarity, and consistency</h2>
        <div class="about-page__list">
          <div>
            <strong>Curated catalog</strong>
            <p>Products are organized to help customers make confident choices without unnecessary friction.</p>
          </div>
          <div>
            <strong>Clean ordering flow</strong>
            <p>The path from product discovery to checkout is structured to stay simple and reliable.</p>
          </div>
          <div>
            <strong>Professional management</strong>
            <p>The admin experience supports product updates, category organization, order handling, and role control.</p>
          </div>
        </div>
      </article>
    </div>
  </section>

  <section class="section section--tight">
    <div class="section__head">
      <div>
        <div class="kicker">Why customers choose us</div>
        <h2>A gift store experience shaped around confidence</h2>
      </div>
    </div>

    <div class="grid grid--3">
      <article class="feature-panel card feature-panel--home">
        <div class="feature-panel__icon">01</div>
        <h3>Carefully selected products</h3>
        <p>GiftNest focuses on presentable, occasion-friendly items that feel suitable for meaningful personal and professional gifting.</p>
      </article>
      <article class="feature-panel card feature-panel--home">
        <div class="feature-panel__icon">02</div>
        <h3>Clear and modern browsing</h3>
        <p>The storefront is organized to keep product details readable, categories understandable, and actions easy to complete.</p>
      </article>
      <article class="feature-panel card feature-panel--home">
        <div class="feature-panel__icon">03</div>
        <h3>Smooth fulfillment flow</h3>
        <p>From cart to checkout, the overall journey is built to reduce confusion and create a more dependable shopping experience.</p>
      </article>
    </div>
  </section>

  <section class="section section--tight">
    <div class="card prose about-page__closing">
      <div class="kicker">Our promise</div>
      <h2>Make gifting easier, more elegant, and more dependable.</h2>
      <p>
        GiftNest brings together curated products, simple interaction patterns, and a professional storefront structure
        to create an experience that feels approachable for customers and manageable for administrators.
      </p>
    </div>
  </section>
@endsection
