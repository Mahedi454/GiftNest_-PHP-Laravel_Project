(() => {
  const $ = (sel, root = document) => root.querySelector(sel);
  const $$ = (sel, root = document) => Array.from(root.querySelectorAll(sel));

  const mobileToggle = $('[data-mobile-menu-toggle]');
  const mobileMenu = $('[data-mobile-menu]');
  if (mobileToggle && mobileMenu) {
    mobileToggle.addEventListener('click', () => {
      const isHidden = mobileMenu.hasAttribute('hidden');
      if (isHidden) mobileMenu.removeAttribute('hidden');
      else mobileMenu.setAttribute('hidden', '');
    });
  }

  // Expose tiny helpers for other modules (no framework).
  window.GiftNest = window.GiftNest || {};
  window.GiftNest.dom = { $, $$ };
})();

