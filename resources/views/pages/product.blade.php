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
              <div class="product__mediaBadge">{{ $product->category->name }}</div>
              <span>{{ $product->name }}</span>
            </div>
          @endif
        </div>
      </div>

      <div class="product__info">
        <div class="kicker">{{ $product->category->name }} · Product ID: {{ $product->id }}</div>
        <h1>{{ $product->name }}</h1>
        <p class="lead">{{ $product->description }}</p>

        <div class="product__highlights">
          <span class="chip">{{ $product->category->name }}</span>
          <span class="chip">Stock: {{ $product->stock }}</span>
          <span class="chip">{{ $product->is_active ? 'Available' : 'Hidden' }}</span>
        </div>

        <div class="product__buy card">
          <div class="product__buyRow">
            <div>
              <div class="muted">Price</div>
              <div class="price price--xl">Tk {{ number_format((float) $product->price, 2) }}</div>
            </div>
          </div>
          <div class="product__actions">
            <button class="btn" type="button">Add to cart</button>
            <a class="btn btn--ghost" href="{{ route('shop') }}">Continue shopping</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  @if ($relatedProducts->count())
    <section class="section">
      <div class="section__head">
        <div>
          <div class="kicker">You may also like</div>
          <h2>More from {{ $product->category->name }}</h2>
        </div>
      </div>
      <div class="grid grid--4">
        @foreach ($relatedProducts as $relatedProduct)
          @include('components.product-card', ['id' => $relatedProduct->id, 'name' => $relatedProduct->name, 'price' => $relatedProduct->price, 'image' => $relatedProduct->image, 'category' => $relatedProduct->category->name])
        @endforeach
      </div>
    </section>
  @endif
@endsection
