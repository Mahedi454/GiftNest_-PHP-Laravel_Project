@props([
  'id' => 1,
  'name' => 'Gift Item',
  'price' => 499,
  'image' => null,
  'badge' => 'Popular',
])

<article class="card product-card">
  <a class="product-card__media" href="{{ route('product.show', ['id' => $id]) }}">
    @if ($image)
      <img src="{{ $image }}" alt="{{ $name }}" loading="lazy" />
    @else
      <div class="product-card__placeholder" aria-hidden="true">
        <span>Gift</span>
      </div>
    @endif
    <span class="pill">{{ $badge }}</span>
  </a>

  <div class="product-card__body">
    <h3 class="product-card__title">
      <a href="{{ route('product.show', ['id' => $id]) }}">{{ $name }}</a>
    </h3>
    <div class="product-card__row">
      <div class="price">৳ {{ number_format($price) }}</div>
      <button class="btn btn--small" type="button" data-add-to-cart data-product-id="{{ $id }}">
        Add
      </button>
    </div>
  </div>
</article>

