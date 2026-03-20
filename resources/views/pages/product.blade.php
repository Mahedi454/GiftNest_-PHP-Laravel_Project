@extends('layouts.app')

@section('title', $product['name'] . ' - GiftNest')

@section('content')
  <section class="product">
    <div class="product__grid">
      <div class="card product__media">
        <div class="product__mediaFrame">
          @php
            $imagePath = public_path('images/products/' . $product['image']);
            $imageUrl = file_exists($imagePath) ? asset('images/products/' . $product['image']) : '';
          @endphp
          @if ($imageUrl)
            <img src="{{ $imageUrl }}" alt="{{ $product['name'] }}" class="product__mediaImage" />
          @else
            <div class="product__mediaPlaceholder">
              <div class="product__mediaBadge">{{ $product['badge'] }}</div>
              <span>{{ $product['category'] }}</span>
            </div>
          @endif
        </div>
      </div>

      <div class="product__info">
        <div class="kicker">{{ $product['category'] }} · Product ID: {{ $product['id'] }}</div>
        <h1>{{ $product['name'] }}</h1>
        <div class="rating">
          <span class="rating__stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
          <span class="muted">(4.8)</span>
        </div>
        <p class="lead">
          {{ $product['description'] }}
        </p>

        <div class="product__highlights">
          <span class="chip">{{ $product['category'] }}</span>
          <span class="chip">Gift-ready packaging</span>
          <span class="chip">Framed product display</span>
        </div>

        <div class="product__buy card">
          <div class="product__buyRow">
            <div>
              <div class="muted">Price</div>
              <div class="price price--xl">৳ {{ number_format($product['price']) }}</div>
            </div>
            <label class="field field--inline">
              <span class="field__label">Qty</span>
              <input class="input input--qty" type="number" min="1" value="1" />
            </label>
          </div>
          <div class="product__actions">
            <button
              class="btn"
              type="button"
              data-add-to-cart
              data-product-id="{{ $product['id'] }}"
              data-product-name="{{ $product['name'] }}"
              data-product-price="{{ $product['price'] }}"
              data-product-image="{{ $imageUrl }}"
              data-product-category="{{ $product['category'] }}"
            >
              Add to cart
            </button>
            <button
              class="btn btn--ghost"
              type="button"
              data-add-to-wishlist
              data-product-id="{{ $product['id'] }}"
              data-product-name="{{ $product['name'] }}"
              data-product-price="{{ $product['price'] }}"
              data-product-image="{{ $imageUrl }}"
              data-product-category="{{ $product['category'] }}"
            >
              <span data-wishlist-label>Add to wishlist</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  @if (count($relatedProducts))
    <section class="section">
      <div class="section__head">
        <div>
          <div class="kicker">You may also like</div>
          <h2>More from {{ $product['category'] }}</h2>
        </div>
      </div>
      <div class="grid grid--4">
        @foreach ($relatedProducts as $relatedProduct)
          @include('components.product-card', $relatedProduct)
        @endforeach
      </div>
    </section>
  @endif
@endsection
