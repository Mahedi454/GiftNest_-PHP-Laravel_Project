@extends('layouts.admin')

@section('title', 'Admin - Categories')

@section('content')
  <section class="section">
    <div class="section__head">
      <div>
        <h1>Manage categories</h1>
        <div class="muted">Keep product groups organized so the storefront stays clean and easy to browse.</div>
      </div>
    </div>

    @if (session('status'))
      <div class="card admin-feedback">{{ session('status') }}</div>
    @endif

    <div class="grid grid--3">
      <article class="card kpi">
        <div class="kpi__label">Total categories</div>
        <div class="kpi__value">{{ $categoryStats['total'] }}</div>
      </article>
      <article class="card kpi">
        <div class="kpi__label">Active groups</div>
        <div class="kpi__value">{{ $categoryStats['with_products'] }}</div>
      </article>
      <article class="card kpi">
        <div class="kpi__label">Empty groups</div>
        <div class="kpi__value">{{ $categoryStats['empty'] }}</div>
      </article>
    </div>
  </section>

  <section class="section section--tight">
    <div class="grid grid--2">
      <div class="card admin-category-card">
        <h2>Add category</h2>
        <p class="muted">Create a category and use it immediately in product forms.</p>

        <form class="admin-category-form" method="POST" action="{{ route('admin.categories.store') }}">
          @csrf
          <label class="field">
            <span class="field__label">Category name</span>
            <input class="input" type="text" name="name" required />
          </label>
          <button class="btn" type="submit">Create category</button>
        </form>
      </div>

      <div class="card table">
        <div class="table__row table__head table__row--categories">
          <div>Name</div>
          <div>Products</div>
          <div>Actions</div>
        </div>

        @forelse ($categories as $category)
          <div class="table__row table__row--categories">
            <div>
              <strong>{{ $category->name }}</strong>
            </div>
            <div>{{ $category->products_count }}</div>
            <div class="table__actions table__actions--category">
              <form class="admin-inline-form" method="POST" action="{{ route('admin.categories.update', $category) }}">
                @csrf
                @method('PUT')
                <input class="input" type="text" name="name" value="{{ $category->name }}" />
                <button class="btn btn--ghost admin-inline-form__button" type="submit">Update</button>
              </form>
              <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn--danger btn--small" type="submit">Delete</button>
              </form>
            </div>
          </div>
        @empty
          <div class="empty">
            <div class="empty__title">No categories yet</div>
            <div class="empty__subtitle">Create your first category to organize the catalog.</div>
          </div>
        @endforelse
      </div>
    </div>
  </section>
@endsection
