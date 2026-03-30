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

  const profileMenus = $$('[data-profile-menu]');
  profileMenus.forEach((menu) => {
    const trigger = $('[data-profile-menu-toggle]', menu);
    const panel = $('[data-profile-menu-panel]', menu);
    if (!trigger || !panel) return;

    trigger.addEventListener('click', (event) => {
      event.stopPropagation();
      const isHidden = panel.hasAttribute('hidden');

      profileMenus.forEach((otherMenu) => {
        const otherPanel = $('[data-profile-menu-panel]', otherMenu);
        if (otherPanel && otherPanel !== panel) otherPanel.setAttribute('hidden', '');
      });

      if (isHidden) panel.removeAttribute('hidden');
      else panel.setAttribute('hidden', '');
    });
  });

  document.addEventListener('click', (event) => {
    profileMenus.forEach((menu) => {
      const panel = $('[data-profile-menu-panel]', menu);
      if (!panel) return;
      if (!menu.contains(event.target)) panel.setAttribute('hidden', '');
    });
  });

  // Expose tiny helpers for other modules (no framework).
  window.GiftNest = window.GiftNest || {};
  window.GiftNest.dom = { $, $$ };
})();

