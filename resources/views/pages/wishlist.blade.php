@extends('layouts.app')

@section('title', 'GiftNest - Wishlist')

@section('content')
  <section class="section">
    <div class="section__head">
      <h1>Wishlist</h1>
      <div class="muted">Keep your favorite gifts saved in one place for easy access.</div>
    </div>

    <div class="grid grid--4" data-wishlist-grid>
      <div class="card empty" data-wishlist-empty>
        <div class="empty__title">No saved items yet</div>
        <div class="empty__subtitle">Tap "Add to wishlist" on a product to save it here.</div>
        <a class="btn" href="{{ route('shop') }}">Browse products</a>
      </div>
    </div>
  </section>
@endsection
