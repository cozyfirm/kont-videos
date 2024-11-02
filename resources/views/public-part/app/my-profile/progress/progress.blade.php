@extends('public-part.layout.layout')

@section('public-content')
    <!-- Include menu -->
    {{--@include('public-part.app.my-profile.snippets.inner-menu')--}}

    <div class="main__profile__wrapper white__wrapper">
        <div class="profile__wrapper profile__wrapper_wrap">
            <div class="last__watched">
                <div class="episode__image">
                    <img src="{{ asset($lastWatched->episodeRel->imageRel->getFile()) }}" class="episode-img">
                </div>
                <div class="episode__details">
                    <div class="text__wrapper">
                        <div class="mp-width-100 episode__title">
                            <h1>{{ $lastWatched->episodeRel->title ?? '' }}</h1>
                        </div>
                        <div class="mp-width-100">
                            <button class="btn-primary">{{ __('ZADNJE GLEDANO') }}</button>
                        </div>
                        <div class="mp-width-100 video__title">
                            <h2>{{ $lastWatched->title ?? '' }}</h2>
                        </div>
                        <div class="mp-width-100 description">
                            {!! substr(strip_tags($lastWatched->description ?? ''), 0 , 300) !!} ...
                        </div>
{{--                        <div class="mp-width-100 tags">--}}
{{--                            <button class="btn-dark-grey">{{ __('Moda') }}</button>--}}
{{--                            <button class="btn-dark-grey">{{ __('Društvo') }}</button>--}}
{{--                            <button class="btn-dark-grey">{{ __('Sestre') }}</button>--}}
{{--                        </div>--}}
                        <div class="mp-width-100 details">
                            <div class="details__inner">
                                <p>{{ EpisodeHelper::getNumberOfChapters($lastWatched->episodeRel->totalChapters()) }}</p>
                                <span>|</span>
                                <p>{{ $lastWatched->episodeRel->getCreationYear() }}</p>
                                <span>|</span>
                                <div class="icon_btn">
                                    <i class="fi fi-bs-clock"></i>
                                    <p>{{ $lastWatched->episodeRel->totalDuration() }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mp-width-100 more-info">
                            <a href="{{ route('public.episodes.preview', ['slug' => $lastWatched->episodeRel->slug]) }}">
                                {{ __('Više informacija') }}
                                <i class="fi fi-br-arrow-small-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my__learnings__line">

            <div class="my__learnings">
                @foreach($otherActivities as $activity)
                    <div class="learning_wrapper go-to" custom-uri="{{ route('public.episodes.preview', ['slug' => $activity->slug]) }}">
                        <div class="image__wrapper">
                            <img src="{{ asset($activity->imageRel->getFile()) }}" class="episode-img">
                        </div>

                        <div class="text__wrapper">
                            <div class="text__content">
                                <h2> {{ $activity->title ?? '' }} </h2>
                            </div>

                            <div class="progress">
                                <p>{{ $activity->presenterRel->name ?? '' }}</p>

                                <div class="progress_line"><div class="real__progress width-{{ $activity->progressByUser() }}"></div></div>

                                <div class="statistics">
                                    <h2>{{ $activity->progressByUser() }}%</h2>
                                    @if($activity->userRating())
                                        <div class="stars" title="{{ __('Moja ocjena: ') . $activity->userRating() }}">
                                            <div class="svg__wrapper">
                                                @include('public-part.app.shared.common.stars-black', ['stars' => $activity->userRating() ])
                                            </div>
                                            <p>{{ __('Moja ocjena') }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="load__more">
                <a href="{{ route('public.episodes') }}">
                    <button class="btn-secondary">
                        {{ __('Pregled svih epizoda') }}
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
