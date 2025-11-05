# Laravel Jetstream Livewire Language Switcher

A beautiful and easy-to-use language switcher component for **Laravel** applications using **Jetstream** and **Livewire**. This package provides a dropdown menu with country flags for switching between different application languages.

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![Livewire](https://img.shields.io/badge/Livewire-3.x-pink.svg)](https://livewire.laravel.com)
[![Laravel Jetstream](https://img.shields.io/badge/Jetstream-5.x-blue.svg)](https://jetstream.laravel.com)
[![Packagist Version](https://img.shields.io/packagist/v/r0073rr0r/laravel-language-switcher.svg)](https://packagist.org/packages/r0073rr0r/laravel-language-switcher)
[![Total Downloads](https://img.shields.io/packagist/dt/r0073rr0r/laravel-language-switcher.svg)](https://packagist.org/packages/r0073rr0r/laravel-language-switcher)
[![Monthly Downloads](https://img.shields.io/packagist/dm/r0073rr0r/laravel-language-switcher.svg)](https://packagist.org/packages/r0073rr0r/laravel-language-switcher)
[![GitHub Stars](https://img.shields.io/github/stars/r0073rr0r/laravel-language-switcher?style=social)](https://github.com/r0073rr0r/laravel-language-switcher/stargazers)
[![GitHub Issues](https://img.shields.io/github/issues/r0073rr0r/laravel-language-switcher)](https://github.com/r0073rr0r/laravel-language-switcher/issues)
[![GitHub Forks](https://img.shields.io/github/forks/r0073rr0r/laravel-language-switcher?style=social)](https://github.com/r0073rr0r/laravel-language-switcher/network)


## Features

- 🎨 Beautiful dropdown with country flags
- ⚡ Built with Livewire 3
- 🔧 Easy integration with Laravel Jetstream
- 🌍 Automatic locale detection and persistence
- 🎯 Middleware for automatic locale setting
- 📦 Auto-discovery support
- 🎭 Uses flag-icons for beautiful country flags

## 📋 Requirements

- PHP ^8.2
- **Laravel ^12.0**
- **Livewire ^3.0**
- **Jetstream ^5.0**

## 📦 Installation

Install the package via Composer:
```bash
composer require r0073rr0r/laravel-language-switcher
```

#### Install flag-icons package:
```bash
npm install flag-icons
```
---
### Publish Assets

Publish the package assets
 ```bash
 php artisan vendor:publish --tag=language-switcher
 ```
This will publish to your `public/vendor/language-switcher` directory.

<a href="https://asciinema.org/a/4yZfzItbqpigFITGlCH9mfv9c" target="_blank">
<img src="https://asciinema.org/a/4yZfzItbqpigFITGlCH9mfv9c.svg" alt="Language Switcher Installation" />
</a>

---

Include the CSS file in your `resources/css/app.css` file:
```css
@import "/node_modules/flag-icons/css/flag-icons.min.css";
```
---
#### Build project:
```bash
npm run build
```
---
## ⚙️ Configuration

### 1. Register the Middleware

Add the `SetLocale` middleware to your `bootstrap/app.php`:

```php
use r0073rr0r\LanguageSwitcher\Http\Middleware\SetLocale;

->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [
        SetLocale::class,
    ]);
})
```

### Configure Available Locales

In your `config/app.php`, make sure you have your supported locales defined:

    'locale' => 'en',
    'fallback_locale' => 'en',

### Add Translation Files

Create translation files for your supported languages in lang/ directory:

    lang/
      en/
      sr/
      de/

## Usage

### Add to Jetstream Navigation

Add the language switcher component to your Jetstream navigation menu in navigation-menu.blade.php:

<img src="https://cloud.dbase.in.rs/public.php/dav/files/MfdJGCox6St4ms3/" alt="Language Switcher">

```bladehtml
<!-- Language Switcher -->
<livewire:language-switcher/>
```

### Customize Available Languages

The default supported languages are defined in `config/language-switcher.php`:

- `supported_locales` — list of language codes (e.g., 'en', 'sr', 'de')
- `flags` — maps language code to flag-icons class
- `names` — optional display names for languages

You can add new languages by updating these arrays.

If you update supported languages, make sure to update the `supported_locales` array in `config/app.php`.
And clear config cache:
```bash
php artisan config:clear
php artisan cache:clear
```

## How It Works

1. **Middleware**: The SetLocale middleware automatically sets the application locale based on the session value
2. **Livewire Component**: The LanguageSwitcher component provides the UI for language selection
3. **Session Persistence**: Selected language is stored in the session and persists across requests
4. **Flag Icons**: Uses the flag-icons library to display beautiful country flags

## 🎨 Customization

### Adding More Languages

To add more languages, edit the languages array in the component with the language code and corresponding flag code (ISO 3166-1-alpha-2).

Example flag codes:
- gb - Great Britain (English)
- rs - Serbia (Serbian)
- de - Germany (German)
- fr - France (French)
- es - Spain (Spanish)
- it - Italy (Italian)

## Development

The package uses Laravel Pint for code formatting:

```bash
./vendor/bin/pint
```

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 🔒 Security

If you discover any security-related issues, please email `majstorov@gmail.com` instead of using the issue tracker.

## 📝 License

This package is open-sourced software licensed under the MIT license.

## Credits

- Flag Icons for the beautiful flag icons

## Support

If you find this package useful, please consider giving it a star on GitHub!