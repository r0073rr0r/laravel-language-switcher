<?php

namespace r0073rr0r\LanguageSwitcher;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use r0073rr0r\LanguageSwitcher\Http\Middleware\SetLocale;
use r0073rr0r\LanguageSwitcher\Livewire\LanguageSwitcher as LanguageSwitcherComponent;

class LanguageSwitcherServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Livewire::component('language-switcher', LanguageSwitcherComponent::class);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'language-switcher');

        $this->app['router']->aliasMiddleware('setLocale', SetLocale::class);

        // Publish
        $this->publishes([
            // Publish config
            __DIR__.'/../config/language-switcher.php' => config_path('language-switcher.php'),

            // Publish flag-icons CSS
            base_path('node_modules/flag-icons/css/flag-icons.min.css') => public_path('vendor/language-switcher/flag-icons.min.css'),
        ], 'language-switcher');

    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/language-switcher.php', 'language-switcher'
        );
    }
}
