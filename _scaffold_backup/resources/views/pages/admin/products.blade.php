@extends('layouts.admin')

@section('title', 'Admin · Products')

@section('content')
  <section class="section">
    <div class="section__head">
      <h1>Products</h1>
      <button class="btn" type="button">Add product</button>
    </div>

    <div class="card table">
      <div class="table__row table__head">
        <div>Name</div>
        <div>Stock</div>
        <div>Price</div>
        <div>Actions</div>
      </div>
      @for ($i = 1; $i <= 6; $i++)
        <div class="table__row">
          <div>Gift Item #{{ $i }}</div>
          <div class="muted">{{ 10 + $i }}</div>
          <div>৳ {{ number_format(199 + $i * 50) }}</div>
          <div class="table__actions">
            <button class="btn btn--ghost btn--small" type="button">Edit</button>
            <button class="btn btn--danger btn--small" type="button">Delete</button>
          </div>
        </div>
      @endfor
    </div>
  </section>
@endsection

