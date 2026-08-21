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
        $locale = (string) $request->session()->get('locale', 'de_CH');

        if (! in_array($locale, ['de_CH', 'en'], true)) {
            $locale = 'de_CH';
        }

        App::setLocale($locale);

        return $next($request);
    }
}
