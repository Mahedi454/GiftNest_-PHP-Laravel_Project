@php
  $currentImage = old('image', $product->image);
@endphp

<form class="card admin-product-form admin-product-editor" method="POST" action="{{ $formAction }}" enctype="multipart/form-data" data-product-preview-form>
  @csrf
  @if ($formMethod !== 'POST')
    @method($formMethod)
  @endif

  <div class="admin-product-editor__grid">
    <div class="admin-product-editor__fields">
      <div class="grid grid--2">
        <label class="field">
          <span class="field__label">Product name</span>
          <input class="input" type="text" name="name" value="{{ old('name', $product->name) }}" required data-preview-name />
          @error('name') <span class="muted">{{ $message }}</span> @enderror
        </label>

        <label class="field">
          <span class="field__label">Category</span>
          <select class="input" name="category_id" required data-preview-category>
            <option value="">Select category</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
            @endforeach
          </select>
          @error('category_id') <span class="muted">{{ $message }}</span> @enderror
        </label>

        <label class="field">
          <span class="field__label">Price</span>
          <input class="input" type="number" min="0" step="0.01" name="price" value="{{ old('price', $product->price) }}" required data-preview-price />
          @error('price') <span class="muted">{{ $message }}</span> @enderror
        </label>

        <label class="field">
          <span class="field__label">Stock</span>
          <input class="input" type="number" min="0" name="stock" value="{{ old('stock', $product->stock) }}" required />
          @error('stock') <span class="muted">{{ $message }}</span> @enderror
        </label>

        <label class="field">
          <span class="field__label">Upload image</span>
          <input class="input" type="file" name="image_upload" accept="image/*" data-preview-image />
          @error('image_upload') <span class="muted">{{ $message }}</span> @enderror
        </label>

        <label class="field">
          <span class="field__label">Current image name</span>
          <input class="input" type="text" name="image" value="{{ $currentImage }}" placeholder="Stored image filename" />
          @error('image') <span class="muted">{{ $message }}</span> @enderror
        </label>
      </div>

      <label class="field admin-product-form__full">
        <span class="field__label">Description</span>
        <textarea class="input" name="description" rows="5" required data-preview-description>{{ old('description', $product->description) }}</textarea>
        @error('description') <span class="muted">{{ $message }}</span> @enderror
      </label>

      <label class="field field--inline admin-product-form__toggle">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $product->is_active)) />
        <span class="field__label">Visible on storefront</span>
      </label>

      <div class="admin-product-form__actions">
        <button class="btn admin-product-form__submit" type="submit">{{ $submitLabel }}</button>
        <a class="btn btn--ghost" href="{{ route('admin.products') }}">Cancel</a>
      </div>
    </div>

    <aside class="card admin-preview">
      <div class="admin-preview__label">Live preview</div>
      <div class="admin-preview__media" data-preview-media>
        @if ($currentImage)
          <img src="/images/products/{{ $currentImage }}" alt="{{ old('name', $product->name ?: 'Product preview') }}" />
        @else
          <div class="admin-preview__placeholder" data-preview-placeholder>{{ old('name', $product->name ?: 'Product') }}</div>
        @endif
      </div>
      <div class="admin-preview__body">
        <div class="admin-preview__meta">
          <span data-preview-category-label>{{ optional($categories->firstWhere('id', old('category_id', $product->category_id)))->name ?? 'Choose category' }}</span>
          <span>{{ old('is_active', $product->is_active) ? 'Visible' : 'Hidden' }}</span>
        </div>
        <h3 data-preview-name-label>{{ old('name', $product->name ?: 'Product name') }}</h3>
        <div class="admin-preview__price" data-preview-price-label>
          Tk {{ old('price', $product->price ? number_format((float) $product->price, 2) : '0.00') }}
        </div>
        <p data-preview-description-label>{{ old('description', $product->description ?: 'The product description will appear here as you update the form.') }}</p>
      </div>
    </aside>
  </div>
</form>

<script>
  (() => {
    const form = document.querySelector('[data-product-preview-form]');
    if (!form) return;

    const nameInput = form.querySelector('[data-preview-name]');
    const categoryInput = form.querySelector('[data-preview-category]');
    const priceInput = form.querySelector('[data-preview-price]');
    const descriptionInput = form.querySelector('[data-preview-description]');
    const imageInput = form.querySelector('[data-preview-image]');
    const nameLabel = form.querySelector('[data-preview-name-label]');
    const categoryLabel = form.querySelector('[data-preview-category-label]');
    const priceLabel = form.querySelector('[data-preview-price-label]');
    const descriptionLabel = form.querySelector('[data-preview-description-label]');
    const media = form.querySelector('[data-preview-media]');

    const renderText = () => {
      nameLabel.textContent = nameInput.value.trim() || 'Product name';
      categoryLabel.textContent = categoryInput.options[categoryInput.selectedIndex]?.text || 'Choose category';
      const priceValue = priceInput.value ? Number(priceInput.value).toFixed(2) : '0.00';
      priceLabel.textContent = `Tk ${priceValue}`;
      descriptionLabel.textContent = descriptionInput.value.trim() || 'The product description will appear here as you update the form.';
    };

    const renderImage = () => {
      const file = imageInput.files?.[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = (event) => {
        media.innerHTML = `<img src="${event.target?.result}" alt="Product preview" />`;
      };
      reader.readAsDataURL(file);
    };

    [nameInput, categoryInput, priceInput, descriptionInput].forEach((field) => {
      field?.addEventListener('input', renderText);
      field?.addEventListener('change', renderText);
    });

    imageInput?.addEventListener('change', renderImage);
    renderText();
  })();
</script>
