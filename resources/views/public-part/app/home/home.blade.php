@extends('public-part.layout.layout')

@section('public-content')
    <!-- Import episode trailer -->
    @include('public-part.app.shared.trailer')

    <div class="hero-video">
        <video autoplay loop muted preload playsinline src="{{ asset('files/videos/main-vdeo.mp4')}}"></video>

        <div class="hero-bunner">
            <div class="hero-bunner-content">
                <div class="hero-bunner-content-left">
                    <h1>KONT Masterclass Lectures</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat exercitationem expedita natus,
                        obcaecati debitis aliquid perspiciatis voluptate ut! Eos facere quidem cupiditate obcaecati,
                        suscipit ullam maiores voluptatem. Ipsa, alias minus.</p>
                    <div class="hero-bunner-left">
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
                        <a href="#s-ep-wrapper"><span class="hero-link-span">Saznaj više &rarr;</a>
                    </div>
                </div>
                <div class="hero-bunner-right">
                    <div class="tablet green"><a href="#s-ep-wrapper">{{ __('Ekonomija') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Moda') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Film') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Muzika') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Subverzivna umjetnost') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Društvo') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Politika') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Mediji') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Etika u novinarstvu') }}</a></div>
                    <div class="tablet"><a href="#s-ep-wrapper">{{ __('Mađunarodni odnosi') }}</a></div>
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
