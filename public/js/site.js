document.documentElement.classList.add('js');

const siteHeader = document.querySelector('.site-header');
const menuToggle = siteHeader?.querySelector('[data-menu-toggle]');

if (siteHeader && menuToggle) {
    menuToggle.addEventListener('click', () => {
        const isOpen = siteHeader.classList.toggle('menu-open');
        menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    window.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && siteHeader.classList.contains('menu-open')) {
            siteHeader.classList.remove('menu-open');
            menuToggle.setAttribute('aria-expanded', 'false');
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 760 && siteHeader.classList.contains('menu-open')) {
            siteHeader.classList.remove('menu-open');
            menuToggle.setAttribute('aria-expanded', 'false');
        }
    });
}

const contactToast = document.querySelector('[data-contact-toast]');
const previewActions = document.querySelectorAll('[data-press-preview]');
let contactToastTimeout;

const showContactToast = (message) => {
    if (!contactToast || !message) {
        return;
    }

    contactToast.textContent = message;
    contactToast.classList.add('is-visible');
    window.clearTimeout(contactToastTimeout);
    contactToastTimeout = window.setTimeout(() => {
        contactToast.classList.remove('is-visible');
    }, 2000);
};

previewActions.forEach((action) => {
    let pressTimer;
    let longPressTriggered = false;

    const clearPressTimer = () => {
        window.clearTimeout(pressTimer);
    };

    action.addEventListener('pointerdown', (event) => {
        if (event.pointerType === 'mouse' && event.button !== 0) {
            return;
        }

        longPressTriggered = false;
        clearPressTimer();
        pressTimer = window.setTimeout(() => {
            longPressTriggered = true;
            showContactToast(action.dataset.preview);
        }, 450);
    });

    action.addEventListener('pointerup', clearPressTimer);
    action.addEventListener('pointerleave', clearPressTimer);
    action.addEventListener('pointercancel', clearPressTimer);

    action.addEventListener('contextmenu', (event) => {
        event.preventDefault();
        showContactToast(action.dataset.preview);
    });

    action.addEventListener('click', (event) => {
        if (!longPressTriggered) {
            return;
        }

        event.preventDefault();
        longPressTriggered = false;
    });
});

const revealElements = document.querySelectorAll('[data-reveal]');

if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            root: null,
            threshold: 0.15,
            rootMargin: '0px 0px -8% 0px',
        },
    );

    revealElements.forEach((element) => observer.observe(element));
} else {
    revealElements.forEach((element) => element.classList.add('is-visible'));
}
