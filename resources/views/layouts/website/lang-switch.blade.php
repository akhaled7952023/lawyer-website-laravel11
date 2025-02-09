{{-- <li class="sub-items">
    @php
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $currentProperties = LaravelLocalization::getSupportedLocales()[$currentLocale];
        $flagClass = $currentLocale === 'ar' ? 'flag-icon-sa' : 'flag-icon-gb';
    @endphp

    <a href="javascript:void(0);" title="{{ $currentProperties['native'] }}">
        <i class="flag-icon {{ $flagClass }}" style="margin-right: 8px;"></i>
        {{ $currentProperties['native'] }}
    </a>

    <ul class="sub-menu">
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if ($localeCode !== $currentLocale)
                @php
                    $flagClass = $localeCode === 'ar' ? 'flag-icon-sa' : 'flag-icon-gb';
                @endphp
                <li>
                    <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" title="{{ $properties['native'] }}">
                        <i class="flag-icon {{ $flagClass }}" style="margin-right: 8px;"></i>
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</li> --}}





<li class="sub-items">
    @php
        $currentLocale = LaravelLocalization::getCurrentLocale();
        $currentProperties = LaravelLocalization::getSupportedLocales()[$currentLocale];
        $flagClass = $currentLocale === 'ar' ? 'flag-icon-sa' : 'flag-icon-gb';
    @endphp

    <a href="javascript:void(0);" title="{{ $currentProperties['native'] }}">
        <i class="flag-icon {{ $flagClass }}" style="margin-right: 8px;"></i>
        {{ $currentProperties['native'] }}
    </a>

    <ul class="sub-menu">
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if ($localeCode !== $currentLocale)
                <li>
                    @if(View::hasSection('languageSwitcher'))
                        @yield('languageSwitcher') <!-- عرض الزر المخصص -->
                    @else
                        @php
                            $flagClass = $localeCode === 'ar' ? 'flag-icon-sa' : 'flag-icon-gb';
                        @endphp
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" title="{{ $properties['native'] }}">
                            <i class="flag-icon {{ $flagClass }}" style="margin-right: 8px;"></i>
                            {{ $properties['native'] }}
                        </a>
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
</li>
