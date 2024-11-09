@component('mail::message')

Poštovani/a {{ $_name }},

Uspješno ste kreirali profil na www.kont.com.

Za verifikaciju Vašeg email-a, molimo kliknite <a href="{{ route('auth.verify-account', ['token' => $_token]) }}">ovdje</a>.

Hvala Vam što koristite naš sistem!
Ugodan ostatak dana,<br>
<a href="{{ env('APP_DOMAIN') }}"> {{ env('APP_NAME_LONG') }} </a>
@endcomponent
