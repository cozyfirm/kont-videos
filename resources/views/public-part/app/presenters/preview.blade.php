@extends('public-part.layout.layout')

@section('public-content')
    <!-- Import episode trailer -->
    @include('public-part.app.shared.trailer')

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
                                    <h1>{{ $presenter->episodeRel->title ?? '' }}</h1>
                                </div>
                                <div class="full-width d-center">
                                    <h2>{{ $presenter->episodeRel->short_description ?? '' }}</h2>
                                </div>
                                <div class="full-width d-center">
                                    <div class="btns__wrapper">
                                        <button class="play-btn go-to" custom-uri="{{ route('public.episodes.preview', ['slug' => $presenter->episodeRel->slug]) }}">
                                            <i class="fi fi-br-play"></i>
                                            {{ __('PLAY') }}
                                        </button>
                                        <button class="watch-trailer show__trailer" episode-id="{{ $presenter->episodeRel->id }}">
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
                                        <p>{{ EpisodeHelper::getNumberOfChapters($presenter->episodeRel->totalChapters()) }}</p>
                                        <span>|</span>
                                        <p>{{ $presenter->episodeRel->getCreationYear() }}</p>
                                        <span>|</span>
                                        <div class="icon_btn">
                                            <i class="fi fi-bs-clock"></i>
                                            <p>{{ $presenter->episodeRel->totalDuration() }}</p>
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

        <!-- All presenters -->
        @include('public-part.app.presenters.includes.all-presenters')
    </div>
@endsection
