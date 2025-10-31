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
        $locale = session('locale', config('app.locale'));

        if (in_array($locale, ['en', 'sr', 'ru'])) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
