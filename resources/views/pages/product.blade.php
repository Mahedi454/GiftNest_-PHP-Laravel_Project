@extends('layouts.app')

@section('title', 'GiftNest · Product')

@section('content')
  <section class="product">
    <div class="product__grid">
      <div class="card product__media">
        <div class="product__mediaPlaceholder">
          <span>Product image</span>
        </div>
      </div>

      <div class="product__info">
        <div class="kicker">Product ID: {{ $productId ?? request()->route('id') }}</div>
        <h1>Minimal Gift Item</h1>
        <div class="rating">
          <span class="rating__stars" aria-hidden="true">★★★★★</span>
          <span class="muted">(4.8)</span>
        </div>
        <p class="lead">
          A clean, premium-feel product description placeholder. Later this becomes dynamic from the `products` table.
        </p>

        <div class="product__buy card">
          <div class="product__buyRow">
            <div>
              <div class="muted">Price</div>
              <div class="price price--xl">৳ 599</div>
            </div>
            <label class="field field--inline">
              <span class="field__label">Qty</span>
              <input class="input input--qty" type="number" min="1" value="1" />
            </label>
          </div>
          <div class="product__actions">
            <button class="btn" type="button" data-add-to-cart data-product-id="{{ $productId ?? 1 }}">Add to cart</button>
            <button class="btn btn--ghost" type="button" data-add-to-wishlist data-product-id="{{ $productId ?? 1 }}">Wishlist</button>
          </div>
          <div class="muted small">
            Stock, shipping, and payment options will show here later.
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

