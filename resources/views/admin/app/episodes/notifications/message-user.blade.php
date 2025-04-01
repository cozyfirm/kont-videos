@component('mail::message')

{!! nl2br($_content) !!}

<div style="text-align: center;">
    <a href="{{ route('auth.unsubscribe', ['token' => $_api_token]) }}"> <small>{{ __('Odjavite se sa email obavijesti') }}</small> </a>
</div>
@endcomponent
