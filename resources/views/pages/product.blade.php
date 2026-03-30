@extends('layouts.app')

@section('title', $product->name . ' - GiftNest')

@section('content')
  <section class="product">
    <div class="product__grid">
      <div class="card product__media">
        <div class="product__mediaFrame">
          @php
            $imagePath = $product->image ? public_path('images/products/' . $product->image) : null;
            $imageUrl = $imagePath && file_exists($imagePath) ? '/images/products/' . $product->image : '';
          @endphp

          @if ($imageUrl)
            <img src="{{ $imageUrl }}" alt="{{ $product->name }}" class="product__mediaImage" />
          @else
            <div class="product__mediaPlaceholder">
              <div class="product__mediaBadge">GiftNest</div>
              <span>{{ $product->name }}</span>
            </div>
          @endif
        </div>
      </div>

      <div class="product__info">
        <div class="kicker">Product Details</div>
        <h1>{{ $product->name }}</h1>
        <p class="lead">{{ $product->description }}</p>

        <div class="product__highlights">
          <span class="chip">Product #{{ $product->id }}</span>
          <span class="chip">Laravel Blade</span>
          <span class="chip">Responsive Design</span>
        </div>

        <div class="product__buy card">
          <div class="product__buyRow">
            <div>
              <div class="muted">Price</div>
              <div class="price price--xl">Tk {{ number_format((float) $product->price, 2) }}</div>
            </div>
          </div>

          <div class="product__actions">
            <form method="POST" action="{{ route('cart.store', $product) }}">
              @csrf
              <button class="btn" type="submit">Add to cart</button>
            </form>
            <a class="btn btn--ghost" href="{{ route('shop') }}">Back to shop</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  @if ($relatedProducts->isNotEmpty())
    <section class="section">
      <div class="section__head">
        <div>
          <div class="kicker">More Products</div>
          <h2>You may also like</h2>
        </div>
      </div>

      <div class="grid grid--4">
        @foreach ($relatedProducts as $relatedProduct)
          <x-product-card :product="$relatedProduct" />
        @endforeach
      </div>
    </section>
  @endif
@endsection
