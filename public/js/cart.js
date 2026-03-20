(() => {
  const STORAGE_KEY = 'giftnest.cart';

  const readCart = () => {
    try { return JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]'); } catch { return []; }
  };

  const writeCart = (items) => {
    try { localStorage.setItem(STORAGE_KEY, JSON.stringify(items)); } catch {}
  };

  const setCartCount = (count) => {
    document.querySelectorAll('[data-cart-count]').forEach((el) => {
      el.textContent = String(count);
    });
  };

  const formatPrice = (amount) => `৳ ${Number(amount || 0).toLocaleString()}`;
  const calcSubtotal = (items) => items.reduce((sum, it) => sum + (Number(it.price || 0) * Number(it.quantity || 0)), 0);

  const normalizeItem = (it) => ({
    productId: Number(it.productId || it.id || 0) || 0,
    name: it.name || `Gift Item #${it.productId || it.id || 0}`,
    price: Number(it.price || 0),
    image: it.image || '',
    category: it.category || 'Gift',
    quantity: Math.max(1, Number(it.quantity || 1)),
  });

  const renderCartPage = () => {
    const itemsWrap = document.querySelector('[data-cart-items]');
    if (!itemsWrap) return;

    const empty = document.querySelector('[data-cart-empty]');
    const items = readCart().map(normalizeItem);
    setCartCount(items.reduce((n, it) => n + it.quantity, 0));

    itemsWrap.querySelectorAll('[data-cart-row]').forEach((n) => n.remove());

    if (items.length === 0) {
      if (empty) empty.hidden = false;
      return;
    }

    if (empty) empty.hidden = true;

    items.forEach((it) => {
      const row = document.createElement('div');
      row.className = 'cartrow';
      row.setAttribute('data-cart-row', '');
      row.innerHTML = `
        <div class="cartrow__media">
          ${it.image
            ? `<img src="${it.image}" alt="${it.name}" class="cartrow__image" />`
            : `<div class="cartrow__placeholder">${it.category}</div>`}
        </div>
        <div class="cartrow__main">
          <div class="cartrow__title">${it.name}</div>
          <div class="muted small">${it.category} · ID ${it.productId}</div>
        </div>
        <div class="cartrow__qty">
          <button class="btn btn--ghost btn--small" type="button" data-dec>-</button>
          <span class="cartrow__qtyVal">${it.quantity}</span>
          <button class="btn btn--ghost btn--small" type="button" data-inc>+</button>
        </div>
        <div class="cartrow__price">${formatPrice(it.price * it.quantity)}</div>
        <button class="btn btn--danger btn--small" type="button" data-remove>Remove</button>
      `;

      row.querySelector('[data-inc]').addEventListener('click', () => {
        const next = readCart().map((x) => {
          const item = normalizeItem(x);
          return item.productId === it.productId ? { ...item, quantity: item.quantity + 1 } : item;
        });
        writeCart(next);
        renderCartPage();
        renderTotals();
      });

      row.querySelector('[data-dec]').addEventListener('click', () => {
        const next = readCart().map((x) => {
          const item = normalizeItem(x);
          return item.productId === it.productId ? { ...item, quantity: Math.max(1, item.quantity - 1) } : item;
        });
        writeCart(next);
        renderCartPage();
        renderTotals();
      });

      row.querySelector('[data-remove]').addEventListener('click', () => {
        const next = readCart()
          .map(normalizeItem)
          .filter((x) => x.productId !== it.productId);
        writeCart(next);
        renderCartPage();
        renderTotals();
      });

      itemsWrap.appendChild(row);
    });
  };

  const renderTotals = () => {
    const items = readCart().map(normalizeItem);
    const subtotal = calcSubtotal(items);
    const shipping = items.length ? 60 : 0;

    document.querySelectorAll('[data-cart-subtotal]').forEach((n) => {
      n.textContent = formatPrice(subtotal);
    });
    document.querySelectorAll('[data-cart-total]').forEach((n) => {
      n.textContent = formatPrice(subtotal + shipping);
    });
    document.querySelectorAll('[data-cart-shipping]').forEach((n) => {
      n.textContent = formatPrice(shipping);
    });
  };

  const upsertCartItem = ({ productId, name, price, image, category }) => {
    const items = readCart().map(normalizeItem);
    const idx = items.findIndex((x) => x.productId === productId);

    if (idx >= 0) {
      items[idx] = {
        ...items[idx],
        name,
        price,
        image,
        category,
        quantity: items[idx].quantity + 1,
      };
    } else {
      items.push({
        productId,
        name,
        price,
        image,
        category,
        quantity: 1,
      });
    }

    writeCart(items);
    setCartCount(items.reduce((n, it) => n + it.quantity, 0));
  };

  document.addEventListener('click', (e) => {
    const btn = e.target.closest?.('[data-add-to-cart]');
    if (!btn) return;

    const productId = Number(btn.getAttribute('data-product-id') || '0') || 1;
    const name = btn.getAttribute('data-product-name') || `Gift Item #${productId}`;
    const price = Number(btn.getAttribute('data-product-price') || '0');
    const image = btn.getAttribute('data-product-image') || '';
    const category = btn.getAttribute('data-product-category') || 'Gift';

    upsertCartItem({ productId, name, price, image, category });
  });

  const style = document.createElement('style');
  style.textContent = `
    .cartrow{display:grid; grid-template-columns:72px 1.2fr .7fr .5fr auto; gap:12px; align-items:center; padding:12px 10px; border-radius:14px;}
    .cartrow:hover{background:rgba(208,107,76,.05);}
    .cartrow__media{width:72px; height:72px;}
    .cartrow__image,.cartrow__placeholder{width:100%; height:100%; border-radius:16px;}
    .cartrow__image{object-fit:cover; display:block;}
    .cartrow__placeholder{display:grid; place-items:center; background:linear-gradient(135deg, #fff5ee, #f4dfd0); color:#6d6259; font-weight:700; text-align:center; padding:8px;}
    .cartrow__title{font-weight:800;}
    .cartrow__qty{display:flex; gap:10px; align-items:center; justify-content:flex-end;}
    .cartrow__qtyVal{min-width:18px; text-align:center;}
    .cartrow__price{font-weight:800; text-align:right;}
    @media (max-width: 720px){
      .cartrow{grid-template-columns:1fr; align-items:start;}
      .cartrow__media{width:88px; height:88px;}
      .cartrow__qty{justify-content:flex-start;}
      .cartrow__price{text-align:left;}
    }
  `;
  document.head.appendChild(style);

  setCartCount(readCart().map(normalizeItem).reduce((n, it) => n + it.quantity, 0));
  renderCartPage();
  renderTotals();
})();
