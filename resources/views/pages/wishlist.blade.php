@extends('layouts.app')

@section('title', 'GiftNest · Wishlist')

@section('content')
  <section class="section">
    <div class="section__head">
      <h1>Wishlist</h1>
      <div class="muted">Wishlist uses localStorage for the UI scaffold.</div>
    </div>

    <div class="grid grid--4" data-wishlist-grid>
      <div class="card empty" data-wishlist-empty>
        <div class="empty__title">No saved items yet</div>
        <div class="empty__subtitle">Tap “Wishlist” on a product to save it.</div>
        <a class="btn" href="{{ route('shop') }}">Browse products</a>
      </div>
    </div>
  </section>
@endsection

