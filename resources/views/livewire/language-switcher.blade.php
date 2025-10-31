<div class="m-6">
    <x-dropdown align="none" width="48">
        <x-slot name="trigger">
            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none">
                <div class="flex items-center gap-1">
                    <span class="fi fi-{{ $flags[$locale] ?? $locale }}"></span>
                    <span>{{ $names[$locale] ?? strtoupper($locale) }}</span>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            @foreach($supportedLocales as $lang)
                <x-dropdown-link wire:click.prevent="switchLanguage('{{ $lang }}')" href="#">
                    <span class="fi fi-{{ $flags[$lang] ?? $lang }}"></span>
                    {{ $names[$lang] ?? strtoupper($lang) }}
                </x-dropdown-link>
            @endforeach
        </x-slot>
    </x-dropdown>
</div>
