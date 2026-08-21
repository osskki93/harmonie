<nav class="bottom-nav-bar" aria-label="Bottom navigation">
    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">{{ __('site.nav.home') }}</a>
    <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">{{ __('site.nav.services') }}</a>
    <a href="#contact">{{ __('site.nav.contact') }}</a>
    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">{{ __('site.nav.about') }}</a>
</nav>
