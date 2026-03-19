(() => {
  const STORAGE_KEY = 'giftnest.cart';

  const readCart = () => {
    try { return JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]'); } catch { return []; }
  };
  const writeCart = (items) => {
    try { localStorage.setItem(STORAGE_KEY, JSON.stringify(items)); } catch {}
  };

  const setCartCount = (count) => {
    const el = document.querySelector('[data-cart-count]');
    if (!el) return;
    el.textContent = String(count);
  };

  const calcSubtotal = (items) => items.reduce((sum, it) => sum + (it.price * it.quantity), 0);

  const renderCartPage = () => {
    const itemsWrap = document.querySelector('[data-cart-items]');
    if (!itemsWrap) return;

    const empty = document.querySelector('[data-cart-empty]');
    const items = readCart();
    setCartCount(items.reduce((n, it) => n + it.quantity, 0));

    if (items.length === 0) {
      if (empty) empty.hidden = false;
      itemsWrap.querySelectorAll('[data-cart-row]').forEach((n) => n.remove());
    } else {
      if (empty) empty.hidden = true;
      itemsWrap.querySelectorAll('[data-cart-row]').forEach((n) => n.remove());
      items.forEach((it) => {
        const row = document.createElement('div');
        row.className = 'cartrow';
        row.setAttribute('data-cart-row', '');
        row.innerHTML = `
          <div class="cartrow__main">
            <div class="cartrow__title">${it.name}</div>
            <div class="muted small">৳ ${it.price} · ID ${it.productId}</div>
          </div>
          <div class="cartrow__qty">
            <button class="btn btn--ghost btn--small" type="button" data-dec>-</button>
            <span class="cartrow__qtyVal">${it.quantity}</span>
            <button class="btn btn--ghost btn--small" type="button" data-inc>+</button>
          </div>
          <div class="cartrow__price">৳ ${it.price * it.quantity}</div>
          <button class="btn btn--danger btn--small" type="button" data-remove>Remove</button>
        `;

        row.querySelector('[data-inc]').addEventListener('click', () => {
          const next = readCart().map((x) => x.productId === it.productId ? { ...x, quantity: x.quantity + 1 } : x);
          writeCart(next);
          renderCartPage();
          renderTotals();
        });
        row.querySelector('[data-dec]').addEventListener('click', () => {
          const next = readCart()
            .map((x) => x.productId === it.productId ? { ...x, quantity: Math.max(1, x.quantity - 1) } : x);
          writeCart(next);
          renderCartPage();
          renderTotals();
        });
        row.querySelector('[data-remove]').addEventListener('click', () => {
          const next = readCart().filter((x) => x.productId !== it.productId);
          writeCart(next);
          renderCartPage();
          renderTotals();
        });

        itemsWrap.appendChild(row);
      });
    }
  };

  const renderTotals = () => {
    const items = readCart();
    const subtotal = calcSubtotal(items);
    const shipping = 60;
    const subtotalEl = document.querySelectorAll('[data-cart-subtotal]');
    const totalEl = document.querySelectorAll('[data-cart-total]');
    subtotalEl.forEach((n) => n.textContent = `৳ ${subtotal}`);
    totalEl.forEach((n) => n.textContent = `৳ ${subtotal + (items.length ? shipping : shipping)}`);
  };

  const upsertCartItem = (productId, name, price) => {
    const items = readCart();
    const idx = items.findIndex((x) => x.productId === productId);
    if (idx >= 0) items[idx] = { ...items[idx], quantity: items[idx].quantity + 1 };
    else items.push({ productId, name, price, quantity: 1 });
    writeCart(items);
    setCartCount(items.reduce((n, it) => n + it.quantity, 0));
  };

  document.addEventListener('click', (e) => {
    const btn = e.target.closest?.('[data-add-to-cart]');
    if (!btn) return;
    const productId = Number(btn.getAttribute('data-product-id') || '0') || 1;
    // Placeholder pricing/name; replace with real product data later.
    upsertCartItem(productId, `Gift Item #${productId}`, 499);
  });

  // Minimal styles for dynamically rendered cart rows
  const style = document.createElement('style');
  style.textContent = `
    .cartrow{display:grid; grid-template-columns: 1.2fr .7fr .5fr auto; gap:10px; align-items:center; padding:12px 10px; border-radius:14px;}
    .cartrow:hover{background:rgba(255,255,255,.05);}
    .cartrow__title{font-weight:800;}
    .cartrow__qty{display:flex; gap:10px; align-items:center; justify-content:flex-end;}
    .cartrow__qtyVal{min-width:18px; text-align:center;}
    .cartrow__price{font-weight:800; text-align:right;}
    @media (max-width: 720px){
      .cartrow{grid-template-columns:1fr; align-items:start;}
      .cartrow__qty{justify-content:flex-start;}
      .cartrow__price{text-align:left;}
    }
  `;
  document.head.appendChild(style);

  // Initial paint
  setCartCount(readCart().reduce((n, it) => n + it.quantity, 0));
  renderCartPage();
  renderTotals();
})();

