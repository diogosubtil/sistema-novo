@props([
    'url',
    'color' => 'primary',
    'align' => 'center',
])
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
<table class="action" align="{{ $align }}" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="{{ $align }}">
<table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="{{ $align }}">
<table border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td>

<a href="{{ $url }}" class="button button-{{ $color }}" target="_blank" rel="noopener">{{ $slot }}</a>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
