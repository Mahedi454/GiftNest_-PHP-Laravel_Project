@extends('layouts.app')

@section('title', 'GiftNest - Dashboard')

@section('content')
  <section class="section">
    <div class="section__head">
      <h1>Dashboard</h1>
      <div class="muted">Manage your orders, saved items, and account activity from one place.</div>
    </div>

    <div class="grid grid--2">
      <div class="card">
        <div class="card__title">Quick actions</div>
        <div class="stack">
          <a class="btn btn--ghost" href="{{ route('orders') }}">View orders</a>
          <a class="btn btn--ghost" href="{{ route('cart') }}">Open cart</a>
          <a class="btn" href="{{ route('shop') }}">Continue shopping</a>
        </div>
      </div>

      <div class="card">
        <div class="card__title">Account</div>
        <div class="muted">Use this area to review your recent orders and move through the simple GiftNest shopping flow.</div>
      </div>
    </div>
  </section>
@endsection
