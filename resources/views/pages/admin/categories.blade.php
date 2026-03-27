@extends('layouts.admin')

@section('title', 'Admin - Categories')

@section('content')
  <section class="section">
    <div class="section__head">
      <div>
        <h1>Manage categories</h1>
        <div class="muted">Categories organize products and power filtering in the shop.</div>
      </div>
    </div>

    @if (session('status'))
      <div class="card" style="margin-bottom: 1rem; padding: 1rem;">{{ session('status') }}</div>
    @endif

    <div class="grid grid--2">
      <div class="card" style="padding: 1.5rem;">
        <h2>Add category</h2>
        <form method="POST" action="{{ route('admin.categories.store') }}">
          @csrf
          <label class="field">
            <span class="field__label">Category name</span>
            <input class="input" type="text" name="name" required />
          </label>
          <button class="btn" type="submit">Create category</button>
        </form>
      </div>

      <div class="card table">
        <div class="table__row table__head">
          <div>Name</div>
          <div>Products</div>
          <div>Actions</div>
        </div>
        @foreach ($categories as $category)
          <div class="table__row">
            <div>{{ $category->name }}</div>
            <div>{{ $category->products_count }}</div>
            <div class="table__actions">
              <form method="POST" action="{{ route('admin.categories.update', $category) }}" style="display:flex; gap:0.5rem;">
                @csrf
                @method('PUT')
                <input class="input" type="text" name="name" value="{{ $category->name }}" />
                <button class="btn btn--ghost btn--small" type="submit">Update</button>
              </form>
              <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn--danger btn--small" type="submit">Delete</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
