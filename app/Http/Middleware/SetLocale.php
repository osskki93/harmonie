<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supportedLocales = ['en', 'de', 'es', 'it'];
        $locale = session('locale', config('app.locale'));

        if (! in_array($locale, $supportedLocales, true)) {
            $locale = config('app.fallback_locale', 'de');
        }

        App::setLocale($locale);
        $request->attributes->set('device', $this->deviceFor($request));

        return $next($request);
    }

    private function deviceFor(Request $request): string
    {
        if ($request->query('device') === 'tablet') {
            return 'tablet';
        }

        $userAgent = strtolower($request->userAgent() ?? '');

        $isTablet = str_contains($userAgent, 'ipad')
            || str_contains($userAgent, 'tablet')
            || (str_contains($userAgent, 'android') && ! str_contains($userAgent, 'mobile'));

        return $isTablet ? 'tablet' : 'computer';
    }
}
