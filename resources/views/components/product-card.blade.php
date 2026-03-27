@props([
  'id' => 1,
  'name' => 'Gift Item',
  'price' => 499,
  'image' => null,
  'category' => 'Gift',
])

@php
  $imagePath = $image ? public_path('images/products/' . $image) : null;
  $hasImage = $imagePath && file_exists($imagePath);
  $imageUrl = $hasImage ? '/images/products/' . $image : '';
@endphp

<article class="card product-card">
  <a class="product-card__media" href="{{ route('product.show', ['product' => $id]) }}">
    <div class="product-card__frame">
      @if ($hasImage)
        <img src="{{ $imageUrl }}" alt="{{ $name }}" loading="lazy" />
      @else
        <div class="product-card__placeholder" aria-hidden="true">
          <span>{{ $category }}</span>
        </div>
      @endif
    </div>
    <span class="pill">{{ $category }}</span>
  </a>

  <div class="product-card__body">
    <div class="product-card__meta">
      <span>{{ $category }}</span>
      <span>Database powered</span>
    </div>
    <h3 class="product-card__title">
      <a href="{{ route('product.show', ['product' => $id]) }}">{{ $name }}</a>
    </h3>
    <div class="product-card__row">
      <div>
        <div class="price">Tk {{ number_format((float) $price, 2) }}</div>
        <div class="product-card__note">Managed from the admin panel</div>
      </div>
      <a class="btn btn--small" href="{{ route('product.show', ['product' => $id]) }}">View</a>
    </div>
  </div>
</article>
