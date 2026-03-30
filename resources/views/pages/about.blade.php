@extends('layouts.app')

@section('title', 'GiftNest - About')

@section('content')
  <section class="section">
    <div class="section__head">
      <div>
        <div class="kicker">About GiftNest</div>
        <h1>Simple gifting, clean Laravel structure.</h1>
      </div>
      <div class="muted">A university showcase eCommerce project built with Laravel, Blade, and MySQL.</div>
    </div>

    <div class="card prose">
      <p>
        GiftNest is a simple online gift shop project focused on a clean shopping flow: browse products, add items to cart,
        place an order, and manage products from the admin panel.
      </p>
      <p>
        The project uses Blade components, session-based cart logic, and a modern glassmorphism-inspired interface while
        keeping the code readable and beginner-friendly.
      </p>
    </div>
  </section>
@endsection
