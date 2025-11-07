<?php

namespace r0073rr0r\LanguageSwitcher\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     * @return Response
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(Request $request, Closure $next)
    {
        $supported = (array) config('language-switcher.supported_locales', []);
        $default = (string) config('language-switcher.default_locale', (string) config('app.locale', 'en'));

        $sessionLocale = $request->hasSession() 
            ? $request->session()->get('locale') 
            : session('locale');
        
        $locale = is_string($sessionLocale) ? $sessionLocale : $default;

        if (in_array($locale, $supported, true)) {
            app()->setLocale($locale);
        } else {
            app()->setLocale($default);
        }

        return $next($request);
    }
}
