@extends('layouts.admin')

@section('title', 'Admin - Products')

@section('content')
  <section class="section">
    <div class="section__head">
      <div>
        <h1>Manage products</h1>
        <div class="muted">Live catalog management for products, stock, categories, and storefront visibility.</div>
      </div>
      <a class="btn" href="{{ route('admin.products.create') }}">Add product</a>
    </div>

    @if (session('status'))
      <div class="card admin-feedback">{{ session('status') }}</div>
    @endif

    <div class="grid grid--4">
      <article class="card kpi">
        <div class="kpi__label">Products</div>
        <div class="kpi__value">{{ $productStats['total'] }}</div>
      </article>
      <article class="card kpi">
        <div class="kpi__label">Active</div>
        <div class="kpi__value">{{ $productStats['active'] }}</div>
      </article>
      <article class="card kpi">
        <div class="kpi__label">Categories</div>
        <div class="kpi__value">{{ $productStats['categories'] }}</div>
      </article>
      <article class="card kpi">
        <div class="kpi__label">Low stock</div>
        <div class="kpi__value">{{ $productStats['low_stock'] }}</div>
      </article>
    </div>
  </section>

  <section class="section section--tight">
    <div class="card table">
      <div class="table__row table__head table__row--products">
        <div>Product</div>
        <div>Category</div>
        <div>Stock</div>
        <div>Price</div>
        <div>Status</div>
        <div>Actions</div>
      </div>

      @forelse ($products as $product)
        <div class="table__row table__row--products">
          <div>
            <div class="admin-listing">
              <div class="admin-listing__thumb">
                @if ($product->image)
                  <img src="/images/products/{{ $product->image }}" alt="{{ $product->name }}" />
                @else
                  <div class="admin-listing__placeholder">{{ strtoupper(substr($product->name, 0, 1)) }}</div>
                @endif
              </div>
              <div class="admin-listing__content">
                <strong>{{ $product->name }}</strong>
                <div class="muted small">{{ \Illuminate\Support\Str::limit($product->description, 56) }}</div>
              </div>
            </div>
          </div>
          <div>{{ $product->category->name }}</div>
          <div>{{ $product->stock }}</div>
          <div>Tk {{ number_format((float) $product->price, 2) }}</div>
          <div>
            <span class="status {{ $product->is_active ? 'status--delivered' : 'status--pending' }}">
              {{ $product->is_active ? 'Active' : 'Hidden' }}
            </span>
          </div>
          <div class="table__actions">
            <a class="btn btn--ghost btn--small" href="{{ route('admin.products.edit', $product) }}">Edit</a>
            <form class="table__actionForm" method="POST" action="{{ route('admin.products.destroy', $product) }}">
              @csrf
              @method('DELETE')
              <button class="btn btn--danger btn--small" type="submit">Delete</button>
            </form>
          </div>
        </div>
      @empty
        <div class="empty">
          <div class="empty__title">No products yet</div>
          <div class="empty__subtitle">Create your first product to start managing the catalog.</div>
        </div>
      @endforelse
    </div>

    <div class="pagination">
      @if ($products->onFirstPage())
        <span class="pagination__link pagination__link--disabled">Prev</span>
      @else
        <a class="pagination__link" href="{{ $products->previousPageUrl() }}">Prev</a>
      @endif

      @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
        <a class="pagination__link {{ $page === $products->currentPage() ? 'pagination__link--active' : '' }}" href="{{ $url }}">
          {{ $page }}
        </a>
      @endforeach

      @if ($products->hasMorePages())
        <a class="pagination__link" href="{{ $products->nextPageUrl() }}">Next</a>
      @else
        <span class="pagination__link pagination__link--disabled">Next</span>
      @endif
    </div>
  </section>
@endsection
