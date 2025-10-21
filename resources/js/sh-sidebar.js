// SmartHealth Tracker - Sidebar minimal JS
document.addEventListener('DOMContentLoaded', () => {
  const sidebar = document.querySelector('.sh-sidebar');
  if (!sidebar) return;

  const compactToggle = document.getElementById('sh-sidebar-toggle');
  if (compactToggle) {
    compactToggle.addEventListener('click', () => {
      document.body.classList.toggle('sh-compact');
      localStorage.setItem('shCompact', document.body.classList.contains('sh-compact'));
    });
  }

  // Load persisted compact state
  if (localStorage.getItem('shCompact') === 'true') {
    document.body.classList.add('sh-compact');
  }

  // Submenu toggling with one-open-at-a-time
  sidebar.querySelectorAll('.sh-link[data-target]').forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      // Expand from compact when clicking parent
      if (document.body.classList.contains('sh-compact')) {
        document.body.classList.remove('sh-compact');
      }
      const sel = link.getAttribute('data-target');
      const panel = sidebar.querySelector(sel);
      if (!panel) return;

      const isOpen = panel.classList.contains('is-open');
      // Close others
      sidebar.querySelectorAll('.sh-submenu.is-open').forEach(ul => {
        if (ul !== panel) ul.classList.remove('is-open');
      });
      // Toggle current
      panel.classList.toggle('is-open', !isOpen);
      link.setAttribute('aria-expanded', String(!isOpen));
    });
  });

  // Clicking icons when compact opens submenu automatically
  sidebar.addEventListener('click', (e) => {
    if (!document.body.classList.contains('sh-compact')) return;
    const icon = e.target.closest('.sh-link__icon');
    const item = e.target.closest('.sh-menu__item');
    if (icon && item) {
      document.body.classList.remove('sh-compact');
      const trigger = item.querySelector('.sh-link[data-target]');
      if (trigger) trigger.click();
    }
  });
});


