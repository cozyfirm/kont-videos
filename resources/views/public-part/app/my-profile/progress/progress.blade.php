@extends('public-part.layout.layout')

@section('public-content')
    <!-- Include menu -->
    @include('public-part.app.my-profile.snippets.inner-menu')

    <div class="main__profile__wrapper white__wrapper">
        <div class="profile__wrapper">
            <div class="last__watched">
                <div class="episode__image">
                    <img src="{{ asset($lastWatched->imageRel->getFile()) }}" class="episode-img">
                </div>
                <div class="episode__details">
                    <div class="text__wrapper">
                        <div class="width-100">
                            <button class="btn-secondary">{{ __('ZADNJE GLEDANO') }}</button>
                        </div>
                        <div class="width-100 episode__title">
                            <h1>{{ $lastWatched->title }}</h1>
                        </div>
                        <div class="width-100 video__title">
                            <h2>{{ __('Društveno odgovorna moda') }}</h2>
                        </div>
                        <div class="width-100 description">
                            {!! substr(strip_tags($lastWatched->description), 0 , 300) !!} ...
                        </div>
                        <div class="width-100 tags">
                            <button class="btn-dark-grey">{{ __('Moda') }}</button>
                            <button class="btn-dark-grey">{{ __('Društvo') }}</button>
                            <button class="btn-dark-grey">{{ __('Sestre') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
