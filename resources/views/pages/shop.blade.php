@extends('layouts.app')

@section('title', 'GiftNest - Shop')

@section('content')
  <section class="section section--tight">
    <div class="section__head">
      <div>
        <div class="kicker">Browse collection</div>
        <h1>Shop curated gifts</h1>
      </div>
      <div class="muted">Explore flowers, jewelry, perfumes, stationery, chocolates, and curated gift sets.</div>
    </div>

    <form class="filters card" method="GET" action="{{ route('shop') }}">
      <div class="filters__intro">
        <div>
          <div class="filters__title">Find the right gift faster</div>
          <div class="filters__subtitle">Flowers, jewelry, perfumes, stationery, chocolates, and custom gift sets.</div>
        </div>
        <span class="chip">{{ $products->total() }} products</span>
      </div>
      <div class="filters__row">
        <label class="field">
          <span class="field__label">Search</span>
          <input class="input" type="search" name="search" value="{{ $filters['search'] }}" placeholder="Search gifts..." />
        </label>
        <label class="field">
          <span class="field__label">Category</span>
          <select class="input" name="category">
            <option value="">All</option>
            @foreach ($categories as $category)
              <option value="{{ $category }}" @selected($filters['category'] === $category)>{{ $category }}</option>
            @endforeach
          </select>
        </label>
        <label class="field">
          <span class="field__label">Max price</span>
          <select class="input" name="max_price">
            <option value="0" @selected($filters['max_price'] === 0)>Any</option>
            <option value="500" @selected($filters['max_price'] === 500)>Tk 500</option>
            <option value="1000" @selected($filters['max_price'] === 1000)>Tk 1000</option>
            <option value="2000" @selected($filters['max_price'] === 2000)>Tk 2000</option>
            <option value="3000" @selected($filters['max_price'] === 3000)>Tk 3000</option>
          </select>
        </label>
        <div class="filters__actions">
          <button class="btn" type="submit">Apply filters</button>
          @if ($filters['search'] !== '' || $filters['category'] !== '' || $filters['max_price'] > 0)
            <a class="btn btn--ghost" href="{{ route('shop') }}">Clear</a>
          @endif
        </div>
      </div>
    </form>
  </section>

  <section class="section">
    @if ($products->count() > 0)
      <div class="grid grid--4">
        @foreach ($products as $product)
          @include('components.product-card', $product)
        @endforeach
      </div>
    @else
      <div class="card empty shop-empty">
        <div class="empty__title">No gifts matched your search</div>
        <div class="empty__subtitle">
          We could not find anything for
          @if ($filters['search'] !== '')
            "{{ $filters['search'] }}"
          @else
            your selected filters
          @endif.
          Try another keyword, choose a different category, or browse these recommended picks.
        </div>
      </div>

      @if (!empty($recommendedProducts))
        <div class="section__head shop-empty__head">
          <div>
            <div class="kicker">Recommended for you</div>
            <h2>Try these gift ideas instead</h2>
          </div>
        </div>
        <div class="grid grid--4">
          @foreach ($recommendedProducts as $product)
            @include('components.product-card', $product)
          @endforeach
        </div>
      @endif
    @endif

    @if ($products->hasPages())
      <nav class="pagination" aria-label="Shop pagination">
        @if ($products->onFirstPage())
          <span class="pagination__link pagination__link--disabled">Previous</span>
        @else
          <a class="pagination__link" href="{{ $products->previousPageUrl() }}">Previous</a>
        @endif

        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
          @if ($page === $products->currentPage())
            <span class="pagination__link pagination__link--active">{{ $page }}</span>
          @else
            <a class="pagination__link" href="{{ $url }}">{{ $page }}</a>
          @endif
        @endforeach

        @if ($products->hasMorePages())
          <a class="pagination__link" href="{{ $products->nextPageUrl() }}">Next</a>
        @else
          <span class="pagination__link pagination__link--disabled">Next</span>
        @endif
      </nav>
    @endif
  </section>
@endsection
