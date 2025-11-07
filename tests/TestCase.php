<?php

namespace r0073rr0r\LanguageSwitcher\Tests;

use Illuminate\Support\Facades\View;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use r0073rr0r\LanguageSwitcher\LanguageSwitcherServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LanguageSwitcherServiceProvider::class,
            LivewireServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('app.key', 'base64:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=');
        $app['config']->set('app.locale', 'en');
        $app['config']->set('language-switcher.supported_locales', ['en', 'sr', 'ru']);
        $app['config']->set('language-switcher.default_locale', 'en');
        $app['config']->set('language-switcher.flags', [
            'en' => 'gb',
            'sr' => 'rs',
            'ru' => 'ru',
        ]);
        $app['config']->set('language-switcher.names', [
            'en' => 'English',
            'sr' => 'Srpski',
            'ru' => 'Русский',
        ]);

        // Use a simple stub view for tests to avoid Jetstream UI components
        View::addNamespace('language-switcher', __DIR__.'/stubs/views');
    }
}
