@props([
  'product',
])

@php
  $imagePath = $product->image ? public_path('images/products/' . $product->image) : null;
  $hasImage = $imagePath && file_exists($imagePath);
  $imageVersion = $hasImage ? filemtime($imagePath) : null;
  $imageUrl = $hasImage ? '/images/products/' . $product->image . '?v=' . $imageVersion : '';
@endphp

<article class="card product-card">
  <a class="product-card__media" href="{{ route('product.show', ['product' => $product->id]) }}">
    <div class="product-card__frame">
      @if ($hasImage)
        <img src="{{ $imageUrl }}" alt="{{ $product->name }}" loading="lazy" />
      @else
        <div class="product-card__placeholder" aria-hidden="true">
          <span>GiftNest</span>
        </div>
      @endif
    </div>
    <span class="pill">Gift Item</span>
  </a>

  <div class="product-card__body">
    <div class="product-card__meta">
      <span>GiftNest</span>
      <span>Product #{{ $product->id }}</span>
    </div>
    <h3 class="product-card__title">
      <a href="{{ route('product.show', ['product' => $product->id]) }}">{{ $product->name }}</a>
    </h3>
    <div class="product-card__note">{{ \Illuminate\Support\Str::limit($product->description, 72) }}</div>
    <div class="product-card__row">
      <div class="price">Tk {{ number_format((float) $product->price, 2) }}</div>
      <div class="product-card__actions">
        <form method="POST" action="{{ route('cart.store', $product) }}">
          @csrf
          <button class="btn btn--ghost btn--small" type="submit">Add</button>
        </form>
        <a class="btn btn--small" href="{{ route('product.show', ['product' => $product->id]) }}">Details</a>
      </div>
    </div>
  </div>
</article>
