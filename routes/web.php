<?php

use Illuminate\Support\Facades\Route;

$viewForDevice = static function (string $page): string {
    $device = request()->attributes->get('device', 'mobile');

    return $device.'.'.$page;
};

Route::get('/', function () use ($viewForDevice) {
    return view($viewForDevice('main'));
})->name('home');

Route::get('/services', function () use ($viewForDevice) {
    return view($viewForDevice('services'));
})->name('services');

Route::get('/about', function () use ($viewForDevice) {
    return view($viewForDevice('about'));
})->name('about');

Route::get('/location', function () use ($viewForDevice) {
    return view($viewForDevice('location'));
})->name('location');

Route::get('/sitemap.xml', function () {
    $urls = [
        route('home'),
        route('services'),
        route('about'),
        route('location'),
    ];

    $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    foreach ($urls as $url) {
        $xml .= '<url><loc>'.e($url).'</loc></url>';
    }

    $xml .= '</urlset>';

    return response($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');

Route::get('/language/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['de', 'en', 'es', 'it'], true), 404);

    session(['locale' => $locale]);

    return redirect()->back();
})->name('language.switch');
