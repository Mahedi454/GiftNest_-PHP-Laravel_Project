(() => {
  const STORAGE_KEY = 'giftnest.wishlist';

  const readList = () => {
    try { return JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]'); } catch { return []; }
  };
  const writeList = (items) => {
    try { localStorage.setItem(STORAGE_KEY, JSON.stringify(items)); } catch {}
  };

  const toggle = (productId) => {
    const items = readList();
    const exists = items.includes(productId);
    const next = exists ? items.filter((id) => id !== productId) : [...items, productId];
    writeList(next);
    return !exists;
  };

  const renderPage = () => {
    const grid = document.querySelector('[data-wishlist-grid]');
    if (!grid) return;
    const empty = document.querySelector('[data-wishlist-empty]');
    const items = readList();

    grid.querySelectorAll('[data-wishlist-card]').forEach((n) => n.remove());

    if (items.length === 0) {
      if (empty) empty.hidden = false;
      return;
    }
    if (empty) empty.hidden = true;

    items.forEach((id) => {
      const card = document.createElement('div');
      card.className = 'card wishcard';
      card.setAttribute('data-wishlist-card', '');
      card.innerHTML = `
        <div class="wishcard__title">Gift Item #${id}</div>
        <div class="muted small">Saved item (placeholder)</div>
        <div class="wishcard__row">
          <a class="btn btn--ghost btn--small" href="/product/${id}">View</a>
          <button class="btn btn--danger btn--small" type="button" data-remove>Remove</button>
        </div>
      `;
      card.querySelector('[data-remove]').addEventListener('click', () => {
        const next = readList().filter((x) => x !== id);
        writeList(next);
        renderPage();
      });
      grid.appendChild(card);
    });
  };

  document.addEventListener('click', (e) => {
    const btn = e.target.closest?.('[data-add-to-wishlist]');
    if (!btn) return;
    const productId = Number(btn.getAttribute('data-product-id') || '0') || 1;
    toggle(productId);
  });

  const style = document.createElement('style');
  style.textContent = `
    .wishcard{padding:14px;}
    .wishcard__title{font-weight:900; letter-spacing:-.02em;}
    .wishcard__row{display:flex; gap:10px; margin-top:12px;}
  `;
  document.head.appendChild(style);

  renderPage();
})();

