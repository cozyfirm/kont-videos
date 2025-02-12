@component('mail::message')

Poštovani/a {{ $_username }},

S veseljem vas obavještavamo da je nova epizoda KONT Masterclass serijala upravo objavljena na našoj platformi!
Vaš novi predavač je {{ $_presenter }}, a predavanje nosi naslov <b>"{{ $_episode_title }}"</b>.

{!! nl2br($_episode_description) !!}

{!! nl2br($_presenter_description) !!}

Da biste pogledali najnoviju epizodu, jednostavno kliknite na donji link:

<a href="{{route('public.episodes.preview', ['slug' => $_slug ] )}}">Pogledajte novu epizodu</a>

<a href="{{ env('APP_DOMAIN') }}"> {{ env('APP_NAME_LONG') }} </a>
@endcomponent
