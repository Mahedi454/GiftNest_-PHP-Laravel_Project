@extends('layouts.app')

@section('title', 'GiftNest - Checkout')

@php
  $total = $subtotal + $shipping;
@endphp

@section('content')
  <section class="section section--tight">
    <div class="section__head">
      <div>
        <h1>Checkout</h1>
        <div class="muted">Fill in your delivery information to place the order.</div>
      </div>
      @if (session('status'))
        <div class="chip chip--strong">{{ session('status') }}</div>
      @endif
    </div>
  </section>

  <section class="section">
    <div class="checkout">
      <form class="card checkout__form" method="POST" action="{{ route('checkout.store') }}">
        @csrf
        <div class="formgrid">
          <label class="field">
            <span class="field__label">Name</span>
            <input class="input" type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required />
            @error('name') <span class="muted">{{ $message }}</span> @enderror
          </label>

          <label class="field">
            <span class="field__label">Phone</span>
            <input class="input" type="text" name="phone" value="{{ old('phone') }}" required />
            @error('phone') <span class="muted">{{ $message }}</span> @enderror
          </label>

          <label class="field field--full">
            <span class="field__label">Address</span>
            <textarea class="input" name="address" rows="5" required>{{ old('address') }}</textarea>
            @error('address') <span class="muted">{{ $message }}</span> @enderror
          </label>
        </div>

        <button class="btn btn--full" type="submit">Place order</button>
      </form>

      <aside class="card checkout__summary">
        <div class="cart__summaryTitle">Order summary</div>
        @foreach ($cartItems as $item)
          <div class="cart__summaryRow">
            <span class="muted">{{ $item['name'] }} x{{ $item['quantity'] }}</span>
            <span>Tk {{ number_format((float) ($item['price'] * $item['quantity']), 2) }}</span>
          </div>
        @endforeach
        <div class="divider"></div>
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
      </aside>
    </div>
  </section>
@endsection
