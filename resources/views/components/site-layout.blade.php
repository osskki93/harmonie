<!DOCTYPE html>
<html lang="en">
    <head>
        @php
            $pageTitle = $title ?? __('site.meta.site_name');
            $pageDescription = $description ?? __('site.brand.tagline');
            $ogImage = asset('images/og-harmonie.jpg');
            $canonicalUrl = url()->current();
        @endphp

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $pageTitle }}</title>
        <meta name="description" content="{{ $pageDescription }}">
        <meta name="keywords" content="{{ __('site.meta.keywords') }}">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{ $canonicalUrl }}">
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

        <meta property="og:type" content="website">
        <meta property="og:site_name" content="{{ __('site.meta.site_name') }}">
        <meta property="og:locale" content="en_GB">
        <meta property="og:title" content="{{ $pageTitle }}">
        <meta property="og:description" content="{{ $pageDescription }}">
        <meta property="og:url" content="{{ $canonicalUrl }}">
        <meta property="og:image" content="{{ $ogImage }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $pageTitle }}">
        <meta name="twitter:description" content="{{ $pageDescription }}">
        <meta name="twitter:image" content="{{ $ogImage }}">

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <link rel="stylesheet" href="{{ asset('css/site.css') }}">
            <script src="{{ asset('js/site.js') }}" defer></script>
        @endif
    </head>
    <body>
        <div class="site-shell">
            <x-site-nav />

            <main class="site-main">
                {{ $slot }}
            </main>

            <x-site-footer />
        </div>
    </body>
</html>
