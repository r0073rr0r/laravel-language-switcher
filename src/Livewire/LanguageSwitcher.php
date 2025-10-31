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

    public function mount()
    {
        $this->locale = app()->getLocale();
        $this->supportedLocales = config('language-switcher.supported_locales', ['en']);
        $this->flags = config('language-switcher.flags', []);
        $this->names = config('language-switcher.names', []);
    }

    public function switchLanguage(string $locale)
    {
        if (! in_array($locale, $this->supportedLocales)) {
            return;
        }

        session(['locale' => $locale]);

        app()->setLocale($locale);

        $this->locale = $locale;

        return redirect(request()->header('Referer') ?? '/');
    }

    public function render()
    {
        return view('language-switcher::livewire.language-switcher');
    }
}
