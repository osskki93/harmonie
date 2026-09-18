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
        margin-top: 8px;
        padding-top: 8px;
        border-top: 1px solid rgba(83, 37, 20, 0.10);
    }

    .mobile-menu-language a {
        font-size: 18px;
        line-height: 1;
        font-weight: 500;
        opacity: 0.92;
    }

    .mobile-menu-language a.is-active {
        background: rgba(83, 37, 20, 0.08);
    }
</style>

<header class="{{ $topbarClass }}">
    <img class="brand-logo" src="{{ asset('images/harmonie_logo.png') }}" alt="{{ __('site.brand.logo_alt') }}">

    @if($title !== null)
        <div class="{{ $titleWrapClass }}">
            <h1 class="{{ $titleClass }}">{{ $title }}</h1>
        </div>
    @endif

    <button type="button" class="{{ $toggleClass }}" data-menu-toggle aria-label="{{ $languageOnly ? __('site.nav.language') : __('site.mobile.open_menu') }}" aria-expanded="false" aria-controls="{{ $menuId }}">
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
        @foreach($languageLinks as $locale => $label)
            <a
                href="{{ route('language.switch', $locale) }}"
                data-menu-link
                data-menu-target="language-{{ $locale }}"
                class="{{ $locale === $currentLocale ? 'is-active' : '' }}"
            >
                {{ $label }}
            </a>
        @endforeach
    </div>
</nav>
