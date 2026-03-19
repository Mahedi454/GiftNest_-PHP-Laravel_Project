(() => {
  const STORAGE_KEY = 'giftnest.theme';
  const root = document.body;
  const getSaved = () => {
    try { return localStorage.getItem(STORAGE_KEY); } catch { return null; }
  };
  const save = (v) => {
    try { localStorage.setItem(STORAGE_KEY, v); } catch {}
  };

  const apply = (theme) => {
    if (theme === 'dark') root.setAttribute('data-theme', 'dark');
    else root.removeAttribute('data-theme');
    save(theme);
  };

  const saved = getSaved();
  if (saved === 'light' || saved === 'dark') apply(saved);

  const btn = document.querySelector('[data-darkmode-toggle]');
  if (btn) {
    btn.addEventListener('click', () => {
      const isDark = root.getAttribute('data-theme') === 'dark';
      apply(isDark ? 'light' : 'dark');
    });
  }
})();

