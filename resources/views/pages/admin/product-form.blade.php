@extends('layouts.admin')

@section('title', $pageTitle . ' - Admin')

@section('content')
  <section class="section">
    <div class="section__head">
      <div>
        <h1>{{ $pageTitle }}</h1>
        <div class="muted">Fill in the product details stored in MySQL.</div>
      </div>
    </div>

    <form class="card" method="POST" action="{{ $formAction }}" style="padding: 1.5rem;">
      @csrf
      @if ($formMethod !== 'POST')
        @method($formMethod)
      @endif

      <div class="grid grid--2">
        <label class="field">
          <span class="field__label">Product name</span>
          <input class="input" type="text" name="name" value="{{ old('name', $product->name) }}" required />
          @error('name') <span class="muted">{{ $message }}</span> @enderror
        </label>
        <label class="field">
          <span class="field__label">Category</span>
          <select class="input" name="category_id" required>
            <option value="">Select category</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
            @endforeach
          </select>
          @error('category_id') <span class="muted">{{ $message }}</span> @enderror
        </label>
        <label class="field">
          <span class="field__label">Price</span>
          <input class="input" type="number" min="0" step="0.01" name="price" value="{{ old('price', $product->price) }}" required />
          @error('price') <span class="muted">{{ $message }}</span> @enderror
        </label>
        <label class="field">
          <span class="field__label">Stock</span>
          <input class="input" type="number" min="0" name="stock" value="{{ old('stock', $product->stock) }}" required />
          @error('stock') <span class="muted">{{ $message }}</span> @enderror
        </label>
        <label class="field">
          <span class="field__label">Image file</span>
          <input class="input" type="text" name="image" value="{{ old('image', $product->image) }}" placeholder="1.jpg" />
          @error('image') <span class="muted">{{ $message }}</span> @enderror
        </label>
      </div>

      <label class="field" style="margin-top: 1rem;">
        <span class="field__label">Description</span>
        <textarea class="input" name="description" rows="5" required>{{ old('description', $product->description) }}</textarea>
        @error('description') <span class="muted">{{ $message }}</span> @enderror
      </label>

      <label class="field field--inline" style="margin-top: 1rem;">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $product->is_active)) />
        <span class="field__label">Visible on storefront</span>
      </label>

      <div style="margin-top: 1.5rem; display:flex; gap:0.75rem;">
        <button class="btn" type="submit">{{ $submitLabel }}</button>
        <a class="btn btn--ghost" href="{{ route('admin.products') }}">Cancel</a>
      </div>
    </form>
  </section>
@endsection
