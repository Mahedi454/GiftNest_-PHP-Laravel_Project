@extends('layouts.admin')

@section('title', 'Admin - Products')

@section('content')
  <section class="section">
    <div class="section__head">
      <div>
        <h1>Manage products</h1>
        <div class="muted">Create, edit, activate, or delete storefront products.</div>
      </div>
      <a class="btn" href="{{ route('admin.products.create') }}">Add product</a>
    </div>

    @if (session('status'))
      <div class="card" style="margin-bottom: 1rem; padding: 1rem;">{{ session('status') }}</div>
    @endif

    <div class="card table">
      <div class="table__row table__head">
        <div>Name</div>
        <div>Category</div>
        <div>Stock</div>
        <div>Price</div>
        <div>Status</div>
        <div>Actions</div>
      </div>
      @foreach ($products as $product)
        <div class="table__row">
          <div>{{ $product->name }}</div>
          <div>{{ $product->category->name }}</div>
          <div>{{ $product->stock }}</div>
          <div>Tk {{ number_format((float) $product->price, 2) }}</div>
          <div><span class="chip">{{ $product->is_active ? 'Active' : 'Hidden' }}</span></div>
          <div class="table__actions">
            <a class="btn btn--ghost btn--small" href="{{ route('admin.products.edit', $product) }}">Edit</a>
            <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
              @csrf
              @method('DELETE')
              <button class="btn btn--danger btn--small" type="submit">Delete</button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endsection
