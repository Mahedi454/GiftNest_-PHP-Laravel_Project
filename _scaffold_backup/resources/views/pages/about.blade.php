@extends('layouts.app')

@section('title', 'GiftNest · About')

@section('content')
  <section class="section">
    <div class="section__head">
      <h1>About GiftNest</h1>
      <div class="muted">A portfolio-ready eCommerce demo for Bangladesh.</div>
    </div>

    <div class="card prose">
      <p>
        GiftNest is a fully responsive eCommerce web app designed for students and local Bangladeshi customers.
        The goal is a clean, modern Apple-inspired UI with a smooth shopping experience.
      </p>
      <ul>
        <li>Modern UI with glassmorphism components</li>
        <li>Full-stack Laravel architecture (MVC + Eloquent)</li>
        <li>Payment integration structure for bKash / SSLCommerz</li>
      </ul>
    </div>
  </section>
@endsection

