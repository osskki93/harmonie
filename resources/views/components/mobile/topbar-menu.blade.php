@php
    $currentPage = $currentPage ?? '';
    $menuId = $menuId ?? 'mobile-menu';
    $topbarClass = $topbarClass ?? 'mobile-topbar';
    $menuClass = $menuClass ?? 'mobile-menu';
    $toggleClass = $toggleClass ?? 'menu-toggle';
    $title = $title ?? null;
    $titleWrapClass = $titleWrapClass ?? '';
    $titleClass = $titleClass ?? '';
    $currentLocale = app()->getLocale();
    $languageLinks = [
        'en' => 'English',
        'de' => 'Deutsch',
        'es' => 'Español',
        'it' => 'Italiano',
        'de_CH' => 'Deutsch (CH)',
    ];
@endphp

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

    <button type="button" class="{{ $toggleClass }}" data-menu-toggle aria-label="{{ __('site.mobile.open_menu') }}" aria-expanded="false" aria-controls="{{ $menuId }}">
        <span></span>
        <span></span>
        <span></span>
    </button>
</header>

<nav class="{{ $menuClass }}" id="{{ $menuId }}" data-mobile-menu aria-label="{{ __('site.mobile.menu_label') }}">
    <a href="{{ route('home') }}" data-menu-link data-menu-target="home">{{ __('site.nav.home') }}</a>
    <a href="{{ route('services') }}" data-menu-link data-menu-target="services">{{ __('site.nav.services') }}</a>
    <a href="{{ route('about') }}" data-menu-link data-menu-target="about">{{ __('site.nav.about') }}</a>

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
