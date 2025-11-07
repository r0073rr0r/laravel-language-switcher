<?php

use Livewire\Livewire;
use r0073rr0r\LanguageSwitcher\Livewire\LanguageSwitcher;

it('renders the component', function () {
    Livewire::test(LanguageSwitcher::class)
        ->assertStatus(200)
        ->assertSee('English');
});

it('switches to a supported language and updates state', function () {
    Livewire::test(LanguageSwitcher::class)
        ->call('switchLanguage', 'sr');

    expect(app()->getLocale())->toBe('sr');
    expect(session('locale'))->toBe('sr');
});

it('ignores unsupported locales', function () {
    Livewire::test(LanguageSwitcher::class)
        ->call('switchLanguage', 'xx')
        ->assertHasNoErrors();

    expect(app()->getLocale())->toBe('en');
    expect(session('locale'))->not()->toBe('xx');
});
