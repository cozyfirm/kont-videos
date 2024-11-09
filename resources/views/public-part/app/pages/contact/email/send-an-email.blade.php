@component('mail::message')
# {{ $_subject }}

Ime i prezime: {{ $_name }},<br>
Email: {{ $_email }}

Poruka: {{ $_message }}

{{ __('Ugodan ostatak dana') }},<br>
<a href="{{ env('APP_DOMAIN') }}"> {{ env('APP_NAME_LONG') }} </a>
@endcomponent
