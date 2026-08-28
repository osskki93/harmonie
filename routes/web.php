<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('mobile.main');
})->name('home');

Route::get('/services', function () {
    return view('mobile.services');
})->name('services');

Route::get('/about', function () {
    return view('mobile.about');
})->name('about');

Route::get('/sitemap.xml', function () {
    $urls = [
        route('home'),
        route('services'),
        route('about'),
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
    abort_unless(in_array($locale, ['de_CH', 'de', 'en', 'es', 'it'], true), 404);

    session(['locale' => $locale]);

    return redirect()->back();
})->name('language.switch');
