<div>
    <div>
        {{ $names[$locale] ?? strtoupper($locale) }}
    </div>
    <ul>
        @foreach($supportedLocales as $lang)
            <li>{{ $names[$lang] ?? strtoupper($lang) }}</li>
        @endforeach
    </ul>
</div>


