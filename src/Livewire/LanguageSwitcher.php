<?php

namespace r0073rr0r\LanguageSwitcher\Livewire;

use Livewire\Component;

class LanguageSwitcher extends Component
{
    public string $locale;

    public array $flags = [];

    public array $names = [];

    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Foundation\Application|mixed|object|null
     */
    public mixed $supportedLocales;

    public function mount(): void
    {
        $this->locale = app()->getLocale();
        $this->supportedLocales = (array) config('language-switcher.supported_locales', ['en']);
        $this->flags = (array) config('language-switcher.flags', []);
        $this->names = (array) config('language-switcher.names', []);
    }

    public function switchLanguage(string $locale)
    {
        if (! in_array($locale, $this->supportedLocales, true)) {
            return;
        }

        if (request()->hasSession()) {
            request()->session()->put('locale', $locale);
            request()->session()->save();
        } else {
            session()->put('locale', $locale);
            session()->save();
        }

        app()->setLocale($locale);

        $this->locale = $locale;

        // Force page reload to apply new locale
        $this->js('window.location.reload()');
    }

    public function render()
    {
        return view('language-switcher::livewire.language-switcher');
    }
}
