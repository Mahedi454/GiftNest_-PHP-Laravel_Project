@extends('layouts.app')

@section('title', 'GiftNest - Cart')

@php
  $total = $subtotal + $shipping;
@endphp

@section('content')
  <section class="section section--tight">
    <div class="section__head">
      <div>
        <h1>Cart</h1>
        <div class="muted">Review your selected products before moving to checkout.</div>
      </div>
      @if (session('status'))
        <div class="chip chip--strong">{{ session('status') }}</div>
      @endif
    </div>
  </section>

  <section class="section">
    <div class="cart">
      <div class="card cart__items">
        @forelse ($cartItems as $item)
          <div class="cartrow">
            <div class="cartrow__media">
              @php
                $imagePath = $item['image'] ? public_path('images/products/' . $item['image']) : null;
                $imageUrl = $imagePath && file_exists($imagePath) ? '/images/products/' . $item['image'] : '';
              @endphp

              @if ($imageUrl)
                <img src="{{ $imageUrl }}" alt="{{ $item['name'] }}" class="cartrow__image" />
              @else
                <div class="cartrow__placeholder">GiftNest</div>
              @endif
            </div>

            <div class="cartrow__main">
              <div class="cartrow__title">{{ $item['name'] }}</div>
              <div class="muted small">Tk {{ number_format((float) $item['price'], 2) }} each</div>
            </div>

            <form class="cartrow__form" method="POST" action="{{ route('cart.update', $item['id']) }}">
              @csrf
              @method('PATCH')
              <label class="field">
                <span class="field__label">Qty</span>
                <input class="input" type="number" min="1" name="quantity" value="{{ $item['quantity'] }}" />
              </label>
              <button class="btn btn--ghost btn--small" type="submit">Update</button>
            </form>

            <div class="cartrow__price">Tk {{ number_format((float) $item['total'], 2) }}</div>

            <form method="POST" action="{{ route('cart.destroy', $item['id']) }}">
              @csrf
              @method('DELETE')
              <button class="btn btn--danger btn--small" type="submit">Remove</button>
            </form>
          </div>
        @empty
          <div class="empty">
            <div class="empty__title">Your cart is empty</div>
            <div class="empty__subtitle">Add something from the shop to get started.</div>
            <a class="btn" href="{{ route('shop') }}">Browse products</a>
          </div>
        @endforelse
      </div>

      <aside class="card cart__summary">
        <div class="cart__summaryTitle">Order summary</div>
        <div class="cart__summaryRow">
          <span class="muted">Subtotal</span>
          <span>Tk {{ number_format((float) $subtotal, 2) }}</span>
        </div>
        <div class="cart__summaryRow">
          <span class="muted">Shipping</span>
          <span>Tk {{ number_format((float) $shipping, 2) }}</span>
        </div>
        <div class="divider"></div>
        <div class="cart__summaryRow cart__summaryRow--total">
          <span>Total</span>
          <span>Tk {{ number_format((float) $total, 2) }}</span>
        </div>
        <a class="btn btn--full" href="{{ route('checkout') }}">Checkout</a>
      </aside>
    </div>
  </section>
@endsection
