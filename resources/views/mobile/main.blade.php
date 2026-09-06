<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#f6efe2">
    <title>{{ __('site.brand.name') }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&display=swap');

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

        .mobile-main {
            min-height: 100svh;
            padding: calc(16px + env(safe-area-inset-top)) 16px calc(16px + env(safe-area-inset-bottom));
            display: flex;
            flex-direction: column;
        }

        .mobile-topbar {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
        }

        .mobile-topbar-spacer {
            width: 48px;
            height: 48px;
        }

        .expanded {
            flex: 1;
            min-height: 0;
        }

        .brand {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .brand-logo {
            width: 48px;
            height: auto;
            display: block;
        }

        .menu-toggle {
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

        .menu-toggle span {
            display: block;
            width: 16px;
            height: 1.8px;
            border-radius: 999px;
            background: currentColor;
        }

        .mobile-menu {
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

        .mobile-menu.is-open {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }

        .mobile-menu a {
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

        .mobile-menu a + a {
            margin-top: 4px;
        }

        .mobile-menu a:hover,
        .mobile-menu a:focus-visible {
            background: rgba(83, 37, 20, 0.06);
            outline: none;
        }

        .brand-name {
            margin-top: 32px;
            font-size: 40px;
            line-height: 1;
            letter-spacing: 0.04em;
            color: #532514;
            align-self: center;
            text-align: center;
            letter-spacing: 0.2em;
        }

        .headline-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .headline {
            margin: 0;
            font-size: 40px;
            line-height: 1.08;
            font-weight: 500;
            color: #532514;
            text-align: center;
        }

        .bottom-actions {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
        }

        .action-btn {
            border: 0;
            width: 60vw;
            padding: 15px 18px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            color: #532514;
            background: #faf4e8;
            cursor: pointer;
        }

        .contact-actions {
            width: 60vw;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .contact-icon-btn {
            width: 56px;
            height: 56px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #532514;
            background: #faf4e8;
        }

        .contact-icon {
            width: 24px;
            height: 24px;
            stroke: currentColor;
            overflow: visible;
        }

        .contact-icon-fill {
            width: 24px;
            height: 24px;
            fill: currentColor;
            overflow: visible;
        }
    </style>
</head>
<body>
    @php
        $currentPage = 'home';
    @endphp

    <main class="mobile-main">
        @include('components.mobile.topbar-menu', [
            'currentPage' => $currentPage,
            'menuId' => 'mobile-menu',
            'topbarClass' => 'mobile-topbar',
            'menuClass' => 'mobile-menu',
            'toggleClass' => 'menu-toggle',
        ])

        <section class="expanded brand">
            <div class="brand-name">{{ strtoupper(__('site.brand.name')) }}</div>
        </section>

        <section class="expanded headline-wrap">
            <h1 class="headline">{{ __('site.home.headline_mobile') }}</h1>
        </section>

        <section class="expanded bottom-actions">
            <a class="action-btn" href="{{ route('services') }}">{{ __('site.nav.services') }}</a>
            @include('components.mobile.contact-links', [
                'wrapperClass' => 'contact-actions',
            ])
        </section>
    </main>

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

            const navigateAfterClose = (url) => {
                setOpen(false);
                window.setTimeout(() => {
                    window.location.href = url;
                }, 220);
            };

            menuLinks.forEach((link) => {
                link.addEventListener('click', (event) => {
                    event.preventDefault();

                    const target = link.dataset.menuTarget || '';

                    if (target === currentPage) {
                        setOpen(false);
                        return;
                    }

                    navigateAfterClose(link.href);
                });
            });

            document.addEventListener('click', (event) => {
                if (!menu.classList.contains('is-open')) {
                    return;
                }

                if (menu.contains(event.target) || toggle.contains(event.target)) {
                    return;
                }

                setOpen(false);
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    setOpen(false);
                }
            });
        })();
    </script>
</body>
</html>