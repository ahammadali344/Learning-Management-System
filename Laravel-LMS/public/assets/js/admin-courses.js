document.addEventListener('click', e => {
    document.querySelectorAll('.action-menu').forEach(menu => {
        menu.classList.remove('show');
    });

    const btn = e.target.closest('.action-btn');
    if (!btn) return;

    e.stopPropagation();
    btn.nextElementSibling.classList.toggle('show');
});
