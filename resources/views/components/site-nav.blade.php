@php
    $isGerman = app()->getLocale() === 'de_CH';
    $isHome = request()->routeIs('home');
    $isServices = request()->routeIs('services');
    $isAbout = request()->routeIs('about');
@endphp

<header class="site-header" data-reveal>
    <div class="container nav-shell">
        <a href="{{ route('home') }}" class="brand-link" aria-label="Harmonie home">
            <img src="{{ asset('images/logo.jpg') }}" alt="Harmonie logo" class="brand-logo">
            <span class="brand-name">{{ __('site.brand.name') }}</span>
        </a>

        <div class="nav-controls">
            <div class="lang-switch" aria-label="{{ __('site.nav.language') }}">
                <a href="{{ route('language.switch', ['locale' => 'de_CH']) }}" class="{{ $isGerman ? 'active' : '' }}">DE-CH</a>
                <a href="{{ route('language.switch', ['locale' => 'en']) }}" class="{{ $isGerman ? '' : 'active' }}">EN</a>
            </div>

            <button type="button" class="menu-toggle" data-menu-toggle aria-label="Open main menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <nav class="main-nav" data-mobile-menu aria-label="Primary">
            <a href="{{ route('home') }}" class="nav-link {{ $isHome ? 'active' : '' }}">{{ __('site.nav.home') }}</a>
            <a href="{{ route('services') }}" class="nav-link {{ $isServices ? 'active' : '' }}">{{ __('site.nav.services') }}</a>
            <a href="{{ route('about') }}" class="nav-link {{ $isAbout ? 'active' : '' }}">{{ __('site.nav.about') }}</a>
            <a href="{{ route('home') }}#contact" class="nav-link">{{ __('site.nav.contact') }}</a>
        </nav>

        <div class="nav-actions">
            <a href="{{ route('home') }}#contact" class="btn-primary nav-cta">{{ __('site.nav.book') }}</a>
        </div>
    </div>
</header>
