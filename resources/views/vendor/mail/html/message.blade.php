<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.url')">
    <div style="width: 250px;display: flex;justify-content: center">
        <img style="max-width: 100%;max-height: 100%" class="img-fluid" src="{{ asset(Helper::settings()->logo) }}" alt="Logo Sistema">
    </div>
</x-mail::header>
</x-slot:header>
    <style>
        .button-primary {
            background: {{ Helper::settings()->color_primary }}!important;
            background-color: {{ Helper::settings()->color_primary }}!important;
            border-bottom: 8px solid {{ Helper::settings()->color_primary }}!important;
            border-left: 18px solid {{ Helper::settings()->color_primary }}!important;
            border-right: 18px solid {{ Helper::settings()->color_primary }}!important;
            border-top: 8px solid {{ Helper::settings()->color_primary }}!important;
        }
    </style>

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
© {{ date('Y') }} {{ Helper::settings()->name }}. @lang('All rights reserved.')
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
