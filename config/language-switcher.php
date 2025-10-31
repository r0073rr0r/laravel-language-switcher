<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Supported Locales
    |--------------------------------------------------------------------------
    |
    | This array lists all the language codes your application supports.
    | These are used to generate the language dropdown dynamically.
    | Example: 'en' = English, 'sr' = Serbian, 'ru' = Russian
    |
    */
    'supported_locales' => ['en', 'sr', 'ru'],

    /*
    |--------------------------------------------------------------------------
    | Default Locale
    |--------------------------------------------------------------------------
    |
    | This is the default language your application will use if no language
    | is set in the user's session or by the middleware.
    |
    */
    'default_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Language Flags Mapping
    |--------------------------------------------------------------------------
    |
    | Map each language code to a corresponding flag icon code (from flag-icons).
    | This is used in the dropdown to show the correct flag for each language.
    | You can add more languages here as needed.
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
    | These are the names of each language to display in the dropdown.
    | You can customize these names or add new languages here.
    |
    */
    'names' => [
        'en' => 'English',
        'sr' => 'Srpski',
        'ru' => 'Русский',
        'fr' => 'Français',
        'de' => 'Deutsch',
    ],
];
