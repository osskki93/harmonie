@php
    $currentPage = $currentPage ?? '';
    $menuId = $menuId ?? 'mobile-menu';
    $topbarClass = $topbarClass ?? 'mobile-topbar';
    $menuClass = $menuClass ?? 'mobile-menu';
    $toggleClass = $toggleClass ?? 'menu-toggle';
    $title = $title ?? null;
    $titleWrapClass = $titleWrapClass ?? '';
    $titleClass = $titleClass ?? '';
    $languageOnly = $languageOnly ?? false;
    $currentLocale = app()->getLocale();
    $languageLinks = [
        'de' => 'Deutsch',
        'en' => 'English',
        'es' => 'Español',
        'it' => 'Italiano',
    ];
@endphp

<script>
    (() => {
        const isTouchTablet = navigator.maxTouchPoints > 1
            && Math.min(window.screen.width, window.screen.height) >= 700;
        const url = new URL(window.location.href);

        if (isTouchTablet && url.searchParams.get('device') !== 'tablet') {
            url.searchParams.set('device', 'tablet');
            window.location.replace(url.toString());
        }
    })();
</script>

<style>
    .mobile-menu-language {
        padding-top: 16px;
        margin-top: 0;
    }

    .language-dropdown-wrapper {
        position: relative;
        width: 100%;
    }

    .language-dropdown-toggle {
        width: 100%;
        padding: 12px 0;
        border: none;
        background: transparent;
        color: #532514;
        font-size: 18px;
        font-weight: 500;
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
        font-family: inherit;
        outline: none;
        -webkit-tap-highlight-color: transparent;
    }

    .language-dropdown-toggle::after {
        content: '';
        width: 6px;
        height: 6px;
        border-right: 1.5px solid currentColor;
        border-bottom: 1.5px solid currentColor;
        transform: rotate(-45deg);
        margin-left: 8px;
        transition: transform 0.2s ease;
    }

    .language-dropdown-toggle.is-open::after {
        transform: rotate(135deg);
    }

    .language-dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #3d1c0f;
        border-radius: 8px;
        margin-top: 4px;
        z-index: 100;
        overflow: hidden;
    }

    .language-dropdown-menu.is-open {
        display: block;
    }

    .language-dropdown-menu a {
        display: block;
        padding: 12px 16px;
        color: #faf4e8;
        font-size: 16px;
        font-weight: 500;
        text-decoration: none;
        border-bottom: none;
        opacity: 0.9;
        transition: all 0.15s ease;
    }

    .language-dropdown-menu a:last-child {
        border-bottom: none;
    }

    .language-dropdown-menu a:active {
        opacity: 1;
        background: transparent;
    }

    .language-dropdown-menu a.is-active {
        opacity: 1;
        background: transparent;
        font-weight: 600;
    }

    .language-selector {
        width: 48px;
        height: 48px;
        border: 0;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        color: #532514;
        background: rgba(250, 244, 232, 0.88);
        box-shadow: 0 2px 5px rgba(83, 37, 20, 0.05);
        cursor: pointer;
    }

    .language-selector .language-toggle-icon {
        width: 21px;
        height: 21px;
    }
</style>

<header class="{{ $topbarClass }}">
    <img class="brand-logo" src="{{ asset('images/harmonie_logo.png') }}" alt="{{ __('site.brand.logo_alt') }}">

    @if($title !== null)
        <div class="{{ $titleWrapClass }}">
            <h1 class="{{ $titleClass }}">{{ $title }}</h1>
        </div>
    @endif

    <button type="button" class="{{ $toggleClass }}{{ $languageOnly ? ' language-selector' : '' }}" data-menu-toggle aria-label="{{ $languageOnly ? __('site.nav.language') : __('site.mobile.open_menu') }}" aria-expanded="false" aria-controls="{{ $menuId }}">
        @if($languageOnly)
            <svg class="language-toggle-icon" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="9"/>
                <path d="M3 12h18M12 3c2.3 2.5 3.5 5.5 3.5 9s-1.2 6.5-3.5 9c-2.3-2.5-3.5-6.5-3.5-9S9.7 5.5 12 3Z"/>
            </svg>
        @else
            <span></span>
            <span></span>
            <span></span>
        @endif
    </button>
</header>

<nav class="{{ $menuClass }}" id="{{ $menuId }}" data-mobile-menu aria-label="{{ __('site.mobile.menu_label') }}">
    @unless($languageOnly)
        <a href="{{ route('home') }}" data-menu-link data-menu-target="home">{{ __('site.nav.home') }}</a>
        <a href="{{ route('services') }}" data-menu-link data-menu-target="services">{{ __('site.nav.services') }}</a>
        <a href="{{ route('about') }}" data-menu-link data-menu-target="about">{{ __('site.nav.about') }}</a>
        <a href="{{ route('location') }}" data-menu-link data-menu-target="location">{{ __('site.nav.location') }}</a>
    @endunless

    <div class="mobile-menu-language">
        <div class="language-dropdown-wrapper">
            <button type="button" class="language-dropdown-toggle" data-language-dropdown-toggle aria-label="{{ __('site.nav.language') }}" aria-expanded="false" aria-haspopup="true">
                <span data-language-current>{{ $languageLinks[$currentLocale] }}</span>
            </button>
            <div class="language-dropdown-menu" data-language-dropdown-menu>
                @foreach($languageLinks as $locale => $label)
                    <a
                        href="{{ route('language.switch', $locale) }}"
                        data-language-option
                        class="{{ $locale === $currentLocale ? 'is-active' : '' }}"
                    >
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</nav>

<script>
    (() => {
        const languageToggle = document.querySelector('[data-language-dropdown-toggle]');
        const languageMenu = document.querySelector('[data-language-dropdown-menu]');

        if (languageToggle && languageMenu) {
            languageToggle.addEventListener('click', () => {
                const isOpen = languageMenu.classList.contains('is-open');
                languageMenu.classList.toggle('is-open');
                languageToggle.classList.toggle('is-open');
                languageToggle.setAttribute('aria-expanded', !isOpen);
            });

            languageMenu.querySelectorAll('[data-language-option]').forEach(option => {
                option.addEventListener('click', (e) => {
                    languageMenu.classList.remove('is-open');
                    languageToggle.classList.remove('is-open');
                    languageToggle.setAttribute('aria-expanded', 'false');
                });
            });

            document.addEventListener('click', (e) => {
                if (!e.target.closest('[data-language-dropdown-wrapper]') && !e.target.closest('.language-dropdown-wrapper')) {
                    languageMenu.classList.remove('is-open');
                    languageToggle.classList.remove('is-open');
                    languageToggle.setAttribute('aria-expanded', 'false');
                }
            });
        }
    })();
</script>
