<form class="card admin-product-form" method="POST" action="{{ $formAction }}">
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

  <label class="field admin-product-form__full">
    <span class="field__label">Description</span>
    <textarea class="input" name="description" rows="5" required>{{ old('description', $product->description) }}</textarea>
    @error('description') <span class="muted">{{ $message }}</span> @enderror
  </label>

  <label class="field field--inline admin-product-form__toggle">
    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $product->is_active)) />
    <span class="field__label">Visible on storefront</span>
  </label>

  <div class="admin-product-form__actions">
    <button class="btn" type="submit">{{ $submitLabel }}</button>
    <a class="btn btn--ghost" href="{{ route('admin.products') }}">Cancel</a>
  </div>
</form>
