<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Supported Locales
    |--------------------------------------------------------------------------
    |
    | This array lists all the language codes (ISO 639-1) your application
    | supports. These codes are used to:
    | - Generate the language dropdown dynamically
    | - Validate language selection in the LanguageSwitcher component
    | - Filter available languages in the middleware
    |
    | Make sure that:
    | - Each locale has corresponding translation files in the lang/ directory
    | - The locale codes match your Laravel app configuration
    |
    | Example: 'en' = English, 'sr' = Serbian, 'ru' = Russian, 'de' = German
    |
    */
    'supported_locales' => ['en', 'sr', 'ru'],

    /*
    |--------------------------------------------------------------------------
    | Default Locale
    |--------------------------------------------------------------------------
    |
    | This is the default language code (ISO 639-1) your application will use
    | when:
    | - No language is set in the user's session
    | - The session contains an unsupported locale
    | - A user visits the site for the first time
    |
    | This should match your Laravel app's default locale in config/app.php.
    | The middleware will fall back to this value if the session locale is
    | invalid or not set.
    |
    | Example: 'en' for English, 'sr' for Serbian
    |
    */
    'default_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Language Flags Mapping
    |--------------------------------------------------------------------------
    |
    | Maps each language code (ISO 639-1) to a corresponding country flag code
    | (ISO 3166-1 alpha-2) from the flag-icons library.
    |
    | This mapping is used in the dropdown to display the correct flag icon
    | next to each language option. The flag code should be a two-letter
    | country code (e.g., 'gb' for Great Britain, 'rs' for Serbia).
    |
    | You can add more mappings here as needed. Make sure the flag code exists
    | in the flag-icons library.
    |
    | Common mappings:
    | - 'en' => 'gb' (English → Great Britain flag)
    | - 'sr' => 'rs' (Serbian → Serbia flag)
    | - 'ru' => 'ru' (Russian → Russia flag)
    | - 'fr' => 'fr' (French → France flag)
    | - 'de' => 'de' (German → Germany flag)
    |
    */
    'flags' => [
        'en' => 'gb',  // English → Great Britain flag
        'sr' => 'rs',  // Serbian → Serbia flag
        'ru' => 'ru',  // Russian → Russia flag
        'fr' => 'fr',  // French → France flag
        'de' => 'de',  // German → Germany flag
    ],

    /*
    |--------------------------------------------------------------------------
    | Display Names
    |--------------------------------------------------------------------------
    |
    | Maps each language code to its display name that will be shown in the
    | language switcher dropdown. These names are typically written in the
    | native language (e.g., 'Srpski' for Serbian, 'Русский' for Russian).
    |
    | If a language code is not found in this array, the component will
    | fall back to displaying the uppercase locale code (e.g., 'EN', 'SR').
    |
    | You can customize these names to match your application's needs or
    | add new languages here. Make sure the keys match the language codes
    | in the 'supported_locales' array.
    |
    */
    'names' => [
        'en' => 'English',
        'sr' => 'Srpski',
        'ru' => 'Русский',
        'fr' => 'Français',
        'de' => 'Deutsch',
    ],

    /*
    |--------------------------------------------------------------------------
    | Force Page Reload After Language Switch
    |--------------------------------------------------------------------------
    |
    | When set to true, the page will be automatically reloaded after switching
    | the language. This ensures that the new locale is applied immediately
    | across the entire application.
    |
    | Set to false if your application handles locale changes without requiring
    | a page reload (e.g., if you're using Livewire's reactive properties or
    | if the middleware properly handles the locale change on the next request).
    |
    | Default: true
    |
    */
    'force_reload' => true,
];
