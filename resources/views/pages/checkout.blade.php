@extends('layouts.app')

@section('title', 'GiftNest · Checkout')

@section('content')
  <section class="section section--tight">
    <div class="section__head">
      <h1>Checkout</h1>
      <div class="muted">Billing/shipping + payment structure (bKash/SSLCommerz-ready) comes next.</div>
    </div>
  </section>

  <section class="section">
    <div class="checkout">
      <form class="card checkout__form">
        <div class="formgrid">
          <label class="field">
            <span class="field__label">Full name</span>
            <input class="input" type="text" placeholder="Your name" />
          </label>
          <label class="field">
            <span class="field__label">Phone</span>
            <input class="input" type="tel" placeholder="+880…" />
          </label>
          <label class="field">
            <span class="field__label">Email</span>
            <input class="input" type="email" placeholder="you@example.com" />
          </label>
          <label class="field">
            <span class="field__label">City</span>
            <input class="input" type="text" placeholder="Dhaka" />
          </label>
          <label class="field field--full">
            <span class="field__label">Address</span>
            <input class="input" type="text" placeholder="Street, area, etc." />
          </label>
        </div>

        <div class="checkout__payment">
          <div class="checkout__paymentTitle">Payment</div>
          <div class="segmented">
            <button class="segmented__btn is-active" type="button">Cash on Delivery</button>
            <button class="segmented__btn" type="button">bKash</button>
            <button class="segmented__btn" type="button">SSLCommerz</button>
          </div>
          <div class="muted small">Integrations will be implemented in Phase 4/6.</div>
        </div>

        <button class="btn btn--full" type="button">Place order</button>
      </form>

      <aside class="card checkout__summary">
        <div class="cart__summaryTitle">Summary</div>
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
      </aside>
    </div>
  </section>
@endsection

