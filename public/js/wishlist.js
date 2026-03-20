(() => {
  const STORAGE_KEY = 'giftnest.wishlist';
  const PRODUCT_KEY = 'giftnest.wishlist.products';

  const readList = () => {
    try { return JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]'); } catch { return []; }
  };

  const writeList = (items) => {
    try { localStorage.setItem(STORAGE_KEY, JSON.stringify(items)); } catch {}
  };

  const readProducts = () => {
    try { return JSON.parse(localStorage.getItem(PRODUCT_KEY) || '{}'); } catch { return {}; }
  };

  const writeProducts = (items) => {
    try { localStorage.setItem(PRODUCT_KEY, JSON.stringify(items)); } catch {}
  };

  const formatPrice = (price) => `৳ ${Number(price || 0).toLocaleString()}`;

  const setButtonState = (btn, saved) => {
    if (!btn) return;
    btn.classList.toggle('is-saved', saved);
    btn.setAttribute('aria-pressed', saved ? 'true' : 'false');
    const label = btn.querySelector('[data-wishlist-label]');
    if (label) label.textContent = saved ? 'Saved to wishlist' : 'Add to wishlist';
  };

  const toggle = (productId, product = null) => {
    const items = readList();
    const products = readProducts();
    const exists = items.includes(productId);

    if (exists) {
      writeList(items.filter((id) => id !== productId));
      delete products[productId];
      writeProducts(products);
      return false;
    }

    writeList([...items, productId]);
    if (product) {
      products[productId] = product;
      writeProducts(products);
    }
    return true;
  };

  const renderPage = () => {
    const grid = document.querySelector('[data-wishlist-grid]');
    if (!grid) return;

    const empty = document.querySelector('[data-wishlist-empty]');
    const items = readList();
    const products = readProducts();

    grid.querySelectorAll('[data-wishlist-card]').forEach((n) => n.remove());

    if (items.length === 0) {
      if (empty) empty.hidden = false;
      return;
    }

    if (empty) empty.hidden = true;

    items.forEach((id) => {
      const product = products[id] || {
        name: `Gift Item #${id}`,
        price: 0,
        category: 'Gift',
        image: '',
      };

      const card = document.createElement('div');
      card.className = 'card wishcard';
      card.setAttribute('data-wishlist-card', '');

      const imageMarkup = product.image
        ? `<img src="${product.image}" alt="${product.name}" class="wishcard__image" loading="lazy" />`
        : `<div class="wishcard__imagePlaceholder">${product.category}</div>`;

      card.innerHTML = `
        <div class="wishcard__imageWrap">${imageMarkup}</div>
        <div class="wishcard__content">
          <div class="wishcard__meta">${product.category}</div>
          <div class="wishcard__title">${product.name}</div>
          <div class="wishcard__price">${formatPrice(product.price)}</div>
          <div class="wishcard__row">
            <a class="btn btn--ghost btn--small" href="/product/${id}">View</a>
            <button class="btn btn--danger btn--small" type="button" data-remove>Remove</button>
          </div>
        </div>
      `;

      card.querySelector('[data-remove]').addEventListener('click', () => {
        writeList(readList().filter((x) => x !== id));
        const nextProducts = readProducts();
        delete nextProducts[id];
        writeProducts(nextProducts);
        renderPage();
        syncButtons();
      });

      grid.appendChild(card);
    });
  };

  const syncButtons = () => {
    const items = readList();
    document.querySelectorAll('[data-add-to-wishlist]').forEach((btn) => {
      const productId = Number(btn.getAttribute('data-product-id') || '0') || 0;
      setButtonState(btn, items.includes(productId));
    });
  };

  document.addEventListener('click', (e) => {
    const btn = e.target.closest?.('[data-add-to-wishlist]');
    if (!btn) return;

    const productId = Number(btn.getAttribute('data-product-id') || '0') || 1;
    const saved = toggle(productId, {
      id: productId,
      name: btn.getAttribute('data-product-name') || `Gift Item #${productId}`,
      price: Number(btn.getAttribute('data-product-price') || '0'),
      category: btn.getAttribute('data-product-category') || 'Gift',
      image: btn.getAttribute('data-product-image') || '',
    });

    setButtonState(btn, saved);
    renderPage();
  });

  const style = document.createElement('style');
  style.textContent = `
    .btn.is-saved{
      background:rgba(208,107,76,.12);
      border-color:rgba(208,107,76,.28);
      color:var(--accent3);
      box-shadow:none;
    }
    .wishcard{padding:14px; display:flex; flex-direction:column; gap:14px;}
    .wishcard__imageWrap{
      height:200px;
      padding:10px;
      border-radius:18px;
      background:linear-gradient(180deg, rgba(255,255,255,.82), rgba(250,238,230,.92));
    }
    .wishcard__image{
      width:100%;
      height:100%;
      object-fit:cover;
      border-radius:14px;
      display:block;
    }
    .wishcard__imagePlaceholder{
      width:100%;
      height:100%;
      display:grid;
      place-items:center;
      border-radius:14px;
      background:linear-gradient(135deg, #fff5ee, #f4dfd0);
      font-weight:800;
    }
    .wishcard__meta{
      font-size:11px;
      letter-spacing:.08em;
      text-transform:uppercase;
      color:var(--muted);
      font-weight:800;
    }
    .wishcard__title{font-weight:900; letter-spacing:-.02em; margin-top:6px;}
    .wishcard__price{margin-top:8px; font-weight:800;}
    .wishcard__row{display:flex; gap:10px; margin-top:14px;}
  `;
  document.head.appendChild(style);

  syncButtons();
  renderPage();
})();
