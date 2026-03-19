@extends('layouts.app')

@section('title', 'GiftNest · Cart')

@section('content')
  <section class="section section--tight">
    <div class="section__head">
      <h1>Cart</h1>
      <div class="muted">Cart uses localStorage for the UI scaffold.</div>
    </div>
  </section>

  <section class="section">
    <div class="cart">
      <div class="card cart__items" data-cart-items>
        <div class="empty" data-cart-empty>
          <div class="empty__title">Your cart is empty</div>
          <div class="empty__subtitle">Add something from the shop to get started.</div>
          <a class="btn" href="{{ route('shop') }}">Browse products</a>
        </div>
      </div>

      <aside class="card cart__summary">
        <div class="cart__summaryTitle">Order summary</div>
        <div class="cart__summaryRow">
          <span class="muted">Subtotal</span>
          <span data-cart-subtotal>৳ 0</span>
        </div>
        <div class="cart__summaryRow">
          <span class="muted">Shipping</span>
          <span>৳ 60</span>
        </div>
        <div class="divider"></div>
        <div class="cart__summaryRow cart__summaryRow--total">
          <span>Total</span>
          <span data-cart-total>৳ 60</span>
        </div>
        <a class="btn btn--full" href="{{ route('checkout') }}">Checkout</a>
      </aside>
    </div>
  </section>
@endsection

