<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>{{ __('site.nav.services') }} - {{ __('site.brand.name') }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap');

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family: "Cormorant Garamond", Georgia, serif;
            color: #532514;
            min-height: 100svh;
            position: relative;
            background: #f6efe2;
            overflow-x: hidden;
            overflow-y: auto;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(to bottom, #f6efe2 0%, rgba(246, 239, 226, 0.64) 18%, rgba(246, 239, 226, 0) 34%, rgba(246, 239, 226, 0) 62%, rgba(246, 239, 226, 0.64) 78%, #f6efe2 100%),
                url("{{ asset('images/background_image.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -1;
        }

        .services-main {
            min-height: 100svh;
            padding: calc(16px + env(safe-area-inset-top) + 72px) 16px calc(16px + env(safe-area-inset-bottom));
        }

        .services-topbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 30;
            overflow: visible;
            padding: calc(16px + env(safe-area-inset-top)) 16px 0;
            display: grid;
            grid-template-columns: 48px 1fr 48px;
            align-items: start;
            gap: 12px;
            margin-bottom: 16px;
            background: linear-gradient(180deg, rgba(246, 239, 226, 0.95), rgba(246, 239, 226, 0.86));
            backdrop-filter: blur(10px);
        }

        .services-topbar::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: -28px;
            height: 28px;
            background: linear-gradient(180deg, rgba(246, 239, 226, 0.82) 0%, rgba(246, 239, 226, 0) 100%);
            pointer-events: none;
        }

        .services-topbar .brand-logo {
            width: 48px;
            height: auto;
            display: block;
        }

        .services-title-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 48px;
        }

        .services-head {
            margin-bottom: 16px;
        }

        .services-title {
            margin: 0;
            font-size: 40px;
            font-weight: 600;
            text-align: center;
            letter-spacing: 0.02em;
        }

        .services-menu-toggle {
            width: 48px;
            height: 48px;
            border: 0;
            border-radius: 999px;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4px;
            padding: 0;
            background: rgba(250, 244, 232, 0.88);
            color: #532514;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(83, 37, 20, 0.05);
        }

        .services-menu-toggle span {
            display: block;
            width: 16px;
            height: 1.8px;
            border-radius: 999px;
            background: currentColor;
        }

        .services-mobile-menu {
            position: fixed;
            top: calc(16px + env(safe-area-inset-top) + 56px);
            right: 16px;
            z-index: 20;
            min-width: 168px;
            padding: 10px;
            border-radius: 20px;
            background: rgba(255, 250, 243, 0.96);
            box-shadow: 0 18px 40px rgba(83, 37, 20, 0.18);
            opacity: 0;
            transform: translateY(-8px) scale(0.98);
            pointer-events: none;
            transition: opacity 220ms ease, transform 220ms ease;
        }

        .services-mobile-menu.is-open {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }

        .services-mobile-menu a {
            display: block;
            padding: 12px 14px;
            border-radius: 14px;
            color: #532514;
            text-decoration: none;
            font-size: 22px;
            line-height: 1;
            font-weight: 600;
            cursor: pointer;
        }

        .services-mobile-menu a + a {
            margin-top: 4px;
        }

        .services-mobile-menu a:hover,
        .services-mobile-menu a:focus-visible {
            background: rgba(83, 37, 20, 0.06);
            outline: none;
        }

        .services-stack {
            display: flex;
            flex-direction: column;
            gap: 12px;
            padding-bottom: 6px;
        }

        .service-tile {
            appearance: none;
            -webkit-appearance: none;
            border: 0;
            position: relative;
            display: block;
            width: 100%;
            min-height: 34svh;
            border-radius: 20px;
            overflow: hidden;
            padding: 0;
            text-decoration: none;
            color: #532514;
            background: #faf4e8;
            box-shadow:
                0 14px 34px rgba(83, 37, 20, 0.12),
                inset 0 0 0 1px rgba(255, 250, 243, 0.22);
            --entry-shift: -30px;
            --tap-scale: 1;
            opacity: 0;
            transform: translate3d(var(--entry-shift), 0, 0) scale(var(--tap-scale));
            transition:
                transform 920ms cubic-bezier(0.22, 1, 0.36, 1),
                opacity 760ms ease,
                box-shadow 180ms ease;
            cursor: pointer;
            will-change: transform, opacity;
        }

        .service-tile:nth-child(even) {
            --entry-shift: 30px;
        }

        .service-tile:nth-child(1) {
            transition-delay: 0ms;
        }

        .service-tile:nth-child(2) {
            transition-delay: 120ms;
        }

        .service-tile:nth-child(3) {
            transition-delay: 240ms;
        }

        .service-tile:nth-child(4) {
            transition-delay: 360ms;
        }

        .service-tile:nth-child(5) {
            transition-delay: 480ms;
        }

        .service-tile.is-visible {
            opacity: 1;
            --entry-shift: 0px;
        }

        .service-tile:active {
            --tap-scale: 0.985;
            box-shadow:
                0 10px 22px rgba(83, 37, 20, 0.10),
                inset 0 0 0 1px rgba(255, 250, 243, 0.20);
        }

        .service-tile::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 0;
            background:
                linear-gradient(110deg, rgba(250, 244, 232, 0.22) 8%, rgba(255, 250, 243, 0.72) 18%, rgba(250, 244, 232, 0.22) 33%),
                linear-gradient(180deg, rgba(246, 239, 226, 0.84), rgba(246, 239, 226, 0.48));
            background-size: 220% 100%, 100% 100%;
            animation: shimmer 1.35s linear infinite;
            transition: opacity 240ms ease;
        }

        .service-tile.is-loaded::before {
            opacity: 0;
            animation: none;
        }

        .service-tile img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.02);
            filter: saturate(0.96) contrast(1.02);
            opacity: 0;
            transition: opacity 420ms ease, transform 420ms ease;
        }

        .service-tile.is-loaded img {
            opacity: 1;
        }

        .service-tile::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(to top, rgba(246, 239, 226, 0.38) 0%, rgba(246, 239, 226, 0.08) 35%, rgba(246, 239, 226, 0) 60%),
                linear-gradient(to bottom, rgba(83, 37, 20, 0.08), rgba(83, 37, 20, 0.02) 42%, rgba(83, 37, 20, 0.08));
        }

        .service-name {
            position: absolute;
            z-index: 1;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 12px;
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 36px;
            font-weight: 600;
            letter-spacing: 0.02em;
            line-height: 1;
            color: #532514;
            text-shadow: 0 1px 8px rgba(250, 244, 232, 0.6);
        }

        .service-name.bottom-left {
            align-items: flex-end;
            justify-content: flex-start;
            text-align: left;
            padding: 12px 14px 14px;
        }

        .service-name.top-left {
            align-items: flex-start;
            justify-content: flex-start;
            text-align: left;
            padding: 14px 14px 12px;
        }

        .service-dialog {
            width: min(92vw, 420px);
            max-height: calc(100svh - env(safe-area-inset-top) - env(safe-area-inset-bottom) - 28px);
            border: 0;
            border-radius: 24px;
            padding: 0;
            overflow: hidden;
            background: rgba(255, 250, 243, 0.96);
            color: #532514;
            box-shadow: 0 18px 50px rgba(83, 37, 20, 0.25);
            opacity: 0;
            transform: translateY(24px) scale(0.965);
            transition: opacity 320ms ease, transform 320ms cubic-bezier(0.22, 1, 0.36, 1);
        }

        .service-dialog.is-open {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .service-dialog::backdrop {
            background: rgba(34, 18, 10, 0.44);
            backdrop-filter: blur(4px);
            opacity: 0;
            transition: opacity 320ms ease;
        }

        .service-dialog.is-open::backdrop {
            opacity: 1;
        }

        .service-dialog-inner {
            padding: 18px;
            max-height: calc(100svh - env(safe-area-inset-top) - env(safe-area-inset-bottom) - 28px);
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }

        .service-dialog-title {
            margin: 0;
            font-size: 34px;
            line-height: 1;
            font-weight: 600;
            font-family: 'Playfair Display', Georgia, serif;
            letter-spacing: 0.01em;
        }

        .service-dialog-price {
            margin: 8px 0 0;
            font-size: 22px;
            font-weight: 600;
        }

        .service-dialog-price:empty {
            display: none;
        }

        .service-dialog-text {
            margin: 12px 0 0;
            font-size: 22px;
            line-height: 1.35;
            white-space: pre-line;
            text-align: justify;
            text-justify: inter-word;
        }

        .service-dialog-close {
            margin-top: 16px;
            width: fit-content;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 0;
            border-radius: 999px;
            padding: 8px 14px;
            background: transparent;
            color: #532514;
            font-family: inherit;
            font-size: 20px;
            font-weight: 600;
            text-decoration: underline;
            text-decoration-thickness: 1px;
            text-underline-offset: 4px;
            outline: none;
            box-shadow: none;
            -webkit-tap-highlight-color: transparent;
        }

        .service-dialog-close:focus,
        .service-dialog-close:focus-visible,
        .service-dialog-close:active {
            outline: none;
            box-shadow: none;
        }

        @keyframes shimmer {
            0% {
                background-position: -220% 0, 0 0;
            }

            100% {
                background-position: 220% 0, 0 0;
            }
        }

        @media (min-width: 1024px) and (orientation: landscape) {
            body {
                overflow: hidden;
            }

            .services-main {
                min-height: 100svh;
                padding: 92px clamp(44px, 6vw, 110px) 24px;
            }

            .services-stack {
                width: min(100%, 1180px);
                margin: 0 auto;
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 14px;
            }

            .service-tile {
                min-height: clamp(130px, 22vh, 190px);
            }

            .service-tile:last-child {
                grid-column: 1 / -1;
                min-height: clamp(100px, 16vh, 140px);
            }

            .service-name {
                font-size: clamp(28px, 2.5vw, 42px);
            }
        }
    </style>
</head>
<body>
    @php
        $services = __('site.services.list');
        $currentPage = 'services';
    @endphp

    <main class="services-main">
        @include('components.mobile.topbar-menu', [
            'currentPage' => $currentPage,
            'menuId' => 'services-mobile-menu',
            'topbarClass' => 'services-topbar',
            'menuClass' => 'services-mobile-menu',
            'toggleClass' => 'services-menu-toggle',
            'title' => __('site.nav.services'),
            'titleWrapClass' => 'services-title-wrap',
            'titleClass' => 'services-title',
        ])

        <section class="services-stack" aria-label="Services list">
            <button type="button" class="service-tile" aria-label="{{ $services[0]['aria_label'] }}" data-service-name="{{ $services[0]['name'] }}" data-service-price="{{ $services[0]['price'] }}" data-service-text="{{ $services[0]['text'] }}" data-service-image="{{ asset('images/hairstrokes_after.png') }}" data-service-image-alt="{{ $services[0]['alt'] }}">
                <img src="{{ asset('images/hairstrokes_after.png') }}" alt="{{ $services[0]['alt'] }}" loading="lazy">
                <div class="service-name bottom-left">{{ $services[0]['name'] }}</div>
            </button>

            <button type="button" class="service-tile" aria-label="{{ $services[1]['aria_label'] }}" data-service-name="{{ $services[1]['name'] }}" data-service-price="{{ $services[1]['price'] }}" data-service-text="{{ $services[1]['text'] }}" data-service-image="{{ asset('images/magic_shading_after.png') }}" data-service-image-alt="{{ $services[1]['alt'] }}" data-service-image-position="center 28%">
                <img src="{{ asset('images/magic_shading_after.png') }}" alt="{{ $services[1]['alt'] }}" loading="lazy" style="object-position: center 28%;">
                <div class="service-name top-left">{{ $services[1]['name'] }}</div>
            </button>

            <button type="button" class="service-tile" aria-label="{{ $services[2]['aria_label'] }}" data-service-name="{{ $services[2]['name'] }}" data-service-price="{{ $services[2]['price'] }}" data-service-text="{{ $services[2]['text'] }}" data-service-image="{{ asset('images/soft_liner_1.png') }}" data-service-image-alt="{{ $services[2]['alt'] }}">
                <img src="{{ asset('images/soft_liner_1.png') }}" alt="{{ $services[2]['alt'] }}" loading="lazy">
                <div class="service-name bottom-left">{{ $services[2]['name'] }}</div>
            </button>

            <button type="button" class="service-tile" aria-label="{{ $services[3]['aria_label'] }}" data-service-name="{{ $services[3]['name'] }}" data-service-price="{{ $services[3]['price'] }}" data-service-text="{{ $services[3]['text'] }}" data-service-image="{{ asset('images/eyeliner_classic_1.png') }}" data-service-image-alt="{{ $services[3]['alt'] }}">
                <img src="{{ asset('images/eyeliner_classic_1.png') }}" alt="{{ $services[3]['alt'] }}" loading="lazy">
                <div class="service-name top-left">{{ $services[3]['name'] }}</div>
            </button>

            <button type="button" class="service-tile" aria-label="{{ __('site.services.consultation.aria_label') }}" data-service-name="{{ __('site.services.consultation.title') }}" data-service-price="30CHF" data-service-text="{{ __('site.services.consultation.text') }}" data-service-image="{{ asset('images/consultation_and_design.jpg') }}" data-service-image-alt="{{ __('site.services.consultation.alt') }}">
                <img src="{{ asset('images/consultation_and_design.jpg') }}" alt="{{ __('site.services.consultation.alt') }}" loading="lazy">
                <div class="service-name bottom-left">{{ __('site.services.consultation.title') }}</div>
            </button>
        </section>
    </main>

    <dialog class="service-dialog" data-service-dialog>
        <div class="service-dialog-inner">
            <h2 class="service-dialog-title" data-dialog-title></h2>
            <p class="service-dialog-price" data-dialog-price></p>
            <p class="service-dialog-text" data-dialog-text></p>
            <button type="button" class="service-dialog-close" data-dialog-close>{{ __('site.mobile.close') }}</button>
        </div>
    </dialog>

    <script>
        (() => {
            const dialog = document.querySelector('[data-service-dialog]');
            const dialogInner = document.querySelector('.service-dialog-inner');
            const dialogTitle = document.querySelector('[data-dialog-title]');
            const dialogPrice = document.querySelector('[data-dialog-price]');
            const dialogText = document.querySelector('[data-dialog-text]');
            const closeButton = document.querySelector('[data-dialog-close]');
            const serviceTiles = document.querySelectorAll('.service-tile');
            let dialogClosing = false;
            const menuToggle = document.querySelector('[data-menu-toggle]');
            const mobileMenu = document.querySelector('[data-mobile-menu]');
            const menuLinks = document.querySelectorAll('[data-menu-link]');
            const currentPage = @json($currentPage);

            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.28,
            });

            const markImageLoaded = (tile) => {
                tile.classList.add('is-loaded');
            };

            const openDialog = (tile) => {
                dialogClosing = false;
                dialogTitle.textContent = tile.dataset.serviceName || '';
                dialogPrice.textContent = tile.dataset.servicePrice || '';
                dialogText.textContent = tile.dataset.serviceText || '';

                if (dialogInner) {
                    dialogInner.scrollTop = 0;
                }

                if (typeof dialog.showModal === 'function') {
                    dialog.showModal();
                    requestAnimationFrame(() => {
                        dialog.classList.add('is-open');
                    });
                }
            };

            const setMenuOpen = (open) => {
                if (!menuToggle || !mobileMenu) {
                    return;
                }

                mobileMenu.classList.toggle('is-open', open);
                menuToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            };

            const navigateAfterClose = (url) => {
                setMenuOpen(false);
                window.setTimeout(() => {
                    window.location.href = url;
                }, 220);
            };

            const closeDialog = () => {
                if (!dialog.open || dialogClosing) {
                    return;
                }

                dialogClosing = true;
                dialog.classList.remove('is-open');

                window.setTimeout(() => {
                    if (dialog.open) {
                        dialog.close();
                    }
                    dialogClosing = false;
                }, 260);
            };

            serviceTiles.forEach((tile) => {
                revealObserver.observe(tile);

                const image = tile.querySelector('img');
                if (image) {
                    if (image.complete && image.naturalWidth > 0) {
                        markImageLoaded(tile);
                    } else {
                        image.addEventListener('load', () => markImageLoaded(tile), { once: true });
                        image.addEventListener('error', () => markImageLoaded(tile), { once: true });
                    }
                }

                tile.addEventListener('click', () => openDialog(tile));
            });

            if (menuToggle && mobileMenu) {
                menuToggle.addEventListener('click', () => {
                    setMenuOpen(!mobileMenu.classList.contains('is-open'));
                });

                menuLinks.forEach((link) => {
                    link.addEventListener('click', (event) => {
                        event.preventDefault();

                        const target = link.dataset.menuTarget || '';

                        if (target === currentPage) {
                            setMenuOpen(false);
                            return;
                        }

                        navigateAfterClose(link.href);
                    });
                });

                document.addEventListener('click', (event) => {
                    if (!mobileMenu.classList.contains('is-open')) {
                        return;
                    }

                    if (mobileMenu.contains(event.target) || menuToggle.contains(event.target)) {
                        return;
                    }

                    setMenuOpen(false);
                });

                document.addEventListener('keydown', (event) => {
                    if (event.key === 'Escape') {
                        setMenuOpen(false);
                    }
                });
            }

            closeButton.addEventListener('click', () => closeDialog());
            dialog.addEventListener('click', (event) => {
                if (event.target === dialog) {
                    closeDialog();
                }
            });
        })();
    </script>
</body>
</html>