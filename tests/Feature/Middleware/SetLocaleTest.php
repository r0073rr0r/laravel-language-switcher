<?php

use Illuminate\Support\Facades\Route;
use r0073rr0r\LanguageSwitcher\Http\Middleware\SetLocale;

it('sets locale from session when supported', function () {
    Route::middleware([SetLocale::class])->get('/locale-check', fn () => app()->getLocale());

    $response = $this->withSession(['locale' => 'sr'])->get('/locale-check');

    $response->assertOk();
    expect($response->getContent())->toBe('sr');
});

it('falls back to default when unsupported', function () {
    Route::middleware([SetLocale::class])->get('/locale-check', fn () => app()->getLocale());

    $response = $this->withSession(['locale' => 'xx'])->get('/locale-check');

    $response->assertOk();
    expect($response->getContent())->toBe('en');
});


