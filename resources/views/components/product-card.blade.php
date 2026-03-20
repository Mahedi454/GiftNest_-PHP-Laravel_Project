@props([
  'id' => 1,
  'name' => 'Gift Item',
  'price' => 499,
  'image' => null,
  'badge' => 'Popular',
  'category' => 'Gift',
])

@php
  $imagePath = $image ? public_path('images/products/' . $image) : null;
  $hasImage = $imagePath && file_exists($imagePath);
  $imageUrl = $hasImage ? '/images/products/' . $image : '';
@endphp

<article class="card product-card">
  <a class="product-card__media" href="{{ route('product.show', ['id' => $id]) }}">
    <div class="product-card__frame">
      @if ($hasImage)
        <img src="{{ $imageUrl }}" alt="{{ $name }}" loading="lazy" />
      @else
        <div class="product-card__placeholder" aria-hidden="true">
          <span>{{ $category }}</span>
        </div>
      @endif
    </div>
    <span class="pill">{{ $badge }}</span>
  </a>

  <div class="product-card__body">
    <div class="product-card__meta">
      <span>{{ $category }}</span>
      <span>Ready to ship</span>
    </div>
    <h3 class="product-card__title">
      <a href="{{ route('product.show', ['id' => $id]) }}">{{ $name }}</a>
    </h3>
    <div class="product-card__row">
      <div>
        <div class="price">৳ {{ number_format($price) }}</div>
        <div class="product-card__note">Framed to fit mixed image sizes</div>
      </div>
      <button
        class="btn btn--small"
        type="button"
        data-add-to-cart
        data-product-id="{{ $id }}"
        data-product-name="{{ $name }}"
        data-product-price="{{ $price }}"
        data-product-image="{{ $imageUrl }}"
        data-product-category="{{ $category }}"
      >
        Add
      </button>
    </div>
  </div>
</article>
