<script>
    (() => {
        const toggle = document.querySelector('[data-menu-toggle]');
        const menu = document.querySelector('[data-mobile-menu]');
        const menuLinks = document.querySelectorAll('[data-menu-link]');
        const currentPage = @json($currentPage);

        if (!toggle || !menu) {
            return;
        }

        const setOpen = (open) => {
            menu.classList.toggle('is-open', open);
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        };

        toggle.addEventListener('click', () => {
            setOpen(!menu.classList.contains('is-open'));
        });

        menuLinks.forEach((link) => {
            link.addEventListener('click', (event) => {
                const target = link.dataset.menuTarget || '';

                if (target === currentPage) {
                    event.preventDefault();
                    setOpen(false);
                    return;
                }

                if (target.startsWith('language-')) {
                    setOpen(false);
                    return;
                }

                event.preventDefault();
                setOpen(false);
                window.setTimeout(() => {
                    window.location.href = link.href;
                }, 220);
            });
        });

        document.addEventListener('click', (event) => {
            if (menu.classList.contains('is-open') && !menu.contains(event.target) && !toggle.contains(event.target)) {
                setOpen(false);
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                setOpen(false);
            }
        });
    })();
</script>
