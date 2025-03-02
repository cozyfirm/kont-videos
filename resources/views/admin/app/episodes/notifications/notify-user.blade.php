@component('mail::message')

Poštovani/a {{ $_username }},

Želimo Vas obavijestiti da je nova epizoda KONT Masterclass serijala upravo objavljena na našoj platformi!
Vaš novi predavač je {{ $_presenter }}, a predavanje nosi naslov <b>"{{ $_episode_title }}"</b>.

{!! nl2br($_episode_description) !!}

{!! nl2br($_presenter_description) !!}

Da biste pogledali najnoviju epizodu, jednostavno kliknite na <a href="{{route('public.episodes.preview', ['slug' => $_slug ] )}}"><b>ovaj link</b></a>.

<div style="text-align: center;">
<a href="{{ route('auth.unsubscribe', ['token' => $_api_token]) }}"> <small>{{ __('Odjavite se sa email obavijesti') }}</small> </a>
</div>
@endcomponent
