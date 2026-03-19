@extends('layouts.app')

@section('title', 'GiftNest · Shop')

@section('content')
  <section class="section section--tight">
    <div class="section__head">
      <h1>Shop</h1>
      <div class="muted">Search and filters will plug into real products later.</div>
    </div>

    <div class="filters card">
      <div class="filters__row">
        <label class="field">
          <span class="field__label">Search</span>
          <input class="input" type="search" placeholder="Search gifts…" />
        </label>
        <label class="field">
          <span class="field__label">Category</span>
          <select class="input">
            <option>All</option>
            <option>Students</option>
            <option>Birthday</option>
            <option>Anniversary</option>
          </select>
        </label>
        <label class="field">
          <span class="field__label">Max price</span>
          <select class="input">
            <option>Any</option>
            <option>৳ 300</option>
            <option>৳ 500</option>
            <option>৳ 1000</option>
          </select>
        </label>
        <button class="btn btn--ghost" type="button">Apply</button>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="grid grid--4">
      @for ($i = 1; $i <= 12; $i++)
        @include('components.product-card', [
          'id' => $i,
          'name' => 'Gift Item #' . $i,
          'price' => 199 + ($i * 35),
          'badge' => $i % 3 === 0 ? 'Hot' : ($i % 2 === 0 ? 'New' : 'Popular'),
        ])
      @endfor
    </div>
  </section>
@endsection

