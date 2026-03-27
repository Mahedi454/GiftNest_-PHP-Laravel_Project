@extends('layouts.app')

@section('title', 'GiftNest - Shop')

@section('content')
  <section class="section section--tight">
    <div class="section__head">
      <div>
        <div class="kicker">Browse collection</div>
        <h1>Shop curated gifts</h1>
      </div>
      <div class="muted">Every product below is fetched from the database and can be managed in the admin panel.</div>
    </div>

    <form class="filters card" method="GET" action="{{ route('shop') }}">
      <div class="filters__intro">
        <div>
          <div class="filters__title">Find the right gift faster</div>
          <div class="filters__subtitle">Search by product name, description, category, or price range.</div>
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
          <a class="btn btn--ghost" href="{{ route('shop') }}">Clear</a>
        </div>
      </div>
    </form>
  </section>

  <section class="section">
    <div class="grid grid--4">
      @forelse ($products as $product)
        @include('components.product-card', ['id' => $product->id, 'name' => $product->name, 'price' => $product->price, 'image' => $product->image, 'category' => $product->category->name])
      @empty
        <div class="card empty shop-empty">
          <div class="empty__title">No gifts matched your search</div>
          <div class="empty__subtitle">Try another keyword, a different category, or a higher price range.</div>
        </div>
      @endforelse
    </div>

    @if ($products->count() === 0 && $recommendedProducts->isNotEmpty())
      <div class="section__head shop-empty__head">
        <div>
          <div class="kicker">Recommended for you</div>
          <h2>Try these gift ideas instead</h2>
        </div>
      </div>
      <div class="grid grid--4">
        @foreach ($recommendedProducts as $product)
          @include('components.product-card', ['id' => $product->id, 'name' => $product->name, 'price' => $product->price, 'image' => $product->image, 'category' => $product->category->name])
        @endforeach
      </div>
    @endif
  </section>
@endsection
