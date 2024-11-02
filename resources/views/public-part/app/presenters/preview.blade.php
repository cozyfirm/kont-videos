@extends('public-part.layout.layout')

@section('public-content')
    <div class="presenters__wrapper">
        <div class="sp__inner_w">
            <div class="sp__content">
                <div class="sp__data">
                    <div class="cover__image">
                        <img src="{{ asset('files/images/public-part/users/' . ($presenter->coverPhotoUri())) }}" class="{{ $presenter->name ?? '' }}">
                    </div>

                    <div class="text__info">
                        {!! nl2br($presenter->about ?? '') !!}
                    </div>

                    <div class="episode__info">
                        <div class="ei__rest">
                            <div class="ei_r_data">
                                <div class="full-width d-center">
                                    <button class="btn-light-grey">{{ __('NOVO') }}</button>
                                </div>
                                <div class="full-width d-center">
                                    <h1>{{ __('Kaftan Studio') }}</h1>
                                </div>
                                <div class="full-width d-center">
                                    <h2>{{ __('Društveno odgovorna moda') }}</h2>
                                </div>
                                <div class="full-width d-center">
                                    <div class="btns__wrapper">
                                        <button class="play-btn">
                                            <i class="fi fi-br-play"></i>
                                            {{ __('PLAY') }}
                                        </button>
                                        <button class="watch-trailer">
                                            {{ __('Pregledaj trailer') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="tags__wrapper">
                                    <button> {{ __('Moda') }} </button>
                                    <button> {{ __('Društvo') }} </button>
                                    <button> {{ __('Sestre') }} </button>
                                </div>
                                <div class="full-width d-center">
                                    <div class="details__inner">
                                        <p> 4 čaptera </p>
                                        <span>|</span>
                                        <p> 2024 </p>
                                        <span>|</span>
                                        <div class="icon_btn">
                                            <i class="fi fi-bs-clock"></i>
                                            <p> 15 min</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ei__img">
                            <img src="{{ asset($presenter->episodeRel->imageRel->getFile()) }}" class="episode-img">
                        </div>
                    </div>
                </div>
                @include('public-part.app.blog.includes.categories')
            </div>
        </div>
    </div>
@endsection
