@extends('public-part.layout.layout')

@section('public-content')
    <!-- Import episode trailer -->
    @include('public-part.app.shared.trailer')

    <div class="hero-video">
        <video autoplay loop muted preload playsinline src="{{ asset('files/videos/main-vdeo.mp4')}}"></video>

        <div class="hero-bunner">
            <div class="hero-bunner-content">
                <div class="hero-bunner-content-left">
                    <h1>{{ __('KONT masterclass video predavanja') }}</h1>
                    <p>{{ __('Istražite uzbudljive teme od mode i muzike do ekonomije i ratne analitike. Registrujte se gledajte predavanja vodećih stručnjaka!') }}</p>
                    <div class="hero-bunner-left">
                        @if(!Auth()->check())
                            <div class="hero-action-btns">
                                <div class="textfield-outlined">
                                    <input id="input-hero" type="text" placeholder=" ">
                                    <label for="input-hero">{{ __('Vaš e-mail') }}</label>
                                </div>
                                <div class="padding-clas">
                                    <form action="{{ route('auth.create-account-with-email') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="email" id="register-hidden-email">
                                        <button class="btn-tertiary register-hidden-trigger">{{ __('Registruj se') }}</button>
                                    </form>
                                </div>
                            </div>

                            <a href="#s-ep-wrapper"><span class="hero-link-span">{{ __('Saznaj više') }} &rarr; </a>
                        @else
                            <a href="{{ route('public.episodes') }}"><span class="hero-link-span">
                                <button class="btn-primary">{{ __('Gledaj sve epizode') }}  &rarr; </button>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="hero-bunner-right">
                    <div class="tablet green"><a href="#s-ep-wrapper">{{ __('Edukacija') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Umjetnost') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Društvene nauke') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Mediji') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Kreativnost') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Muzika') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Ekonomija') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Novinarstvo') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Etika') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Ratna analitika') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Film') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Korupcija') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Moda') }}</a></div>
                </div>
            </div>
        </div>
    </div>

    @include('public-part.app.shared.episodes')
    @include('public-part.app.shared.news')

    {{--    @include('public-part.app.home.includes.news')--}}

    @include('public-part.app.shared.accordion')

    @include('public-part.app.shared.contact')
@endsection
