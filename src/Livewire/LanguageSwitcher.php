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

        // Handle reload method based on configuration
        $reloadMethod = config('language-switcher.reload_method', 'js');

        return match ($reloadMethod) {
            'js' => $this->js('window.location.reload()'),
            'redirect' => $this->redirect(request()->header('Referer') ?? '/'),
            'none' => null,
            default => $this->redirect(request()->header('Referer') ?? '/')
        };
    }

    public function render()
    {
        return view('language-switcher::livewire.language-switcher');
    }
}
