@extends('public-part.layout.layout')

@section('public-content')
    <!-- Include menu -->
    {{--@include('public-part.app.my-profile.snippets.inner-menu')--}}

    <div class="main__profile__wrapper white__wrapper">
        <div class="profile__wrapper profile__wrapper_wrap">
            <div class="last__watched">
                <div class="episode__image">
                    <img src="{{ asset($lastActivity->episodeRel->imageRel->getFile()) }}" class="episode-img">
                </div>
                <div class="episode__details">
                    <div class="text__wrapper">
                        <div class="mp-width-100 episode__title">
                            <h1>{{ $lastActivity->episodeRel->title ?? '' }}</h1>
                        </div>
                        <div class="mp-width-100">
                            <button class="btn-primary">{{ __('POSLJEDNJE GLEDANO') }}</button>
                        </div>
                        <div class="mp-width-100 video__title">
                            <h2>{{ $lastWatched->title ?? '' }}</h2>
                        </div>
                        <div class="mp-width-100 description">
                            {!! strip_tags((substr(($lastActivity->episodeRel->description ?? ''), 0 , 400)), '<b>') !!}...
                        </div>
{{--                        <div class="mp-width-100 tags">--}}
{{--                            <button class="btn-dark-grey">{{ __('Moda') }}</button>--}}
{{--                            <button class="btn-dark-grey">{{ __('Društvo') }}</button>--}}
{{--                            <button class="btn-dark-grey">{{ __('Sestre') }}</button>--}}
{{--                        </div>--}}
                        <div class="mp-width-100 details">
                            <div class="details__inner">
                                <p>{{ EpisodeHelper::getNumberOfChapters($lastActivity->episodeRel->totalChapters()) }}</p>
                                <span>|</span>
                                <p>{{ $lastActivity->episodeRel->getCreationYear() }}</p>
                                <span>|</span>
                                <div class="icon_btn">
                                    <i class="fi fi-bs-clock"></i>
                                    <p>{{ $lastActivity->episodeRel->totalDuration() }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mp-width-100 more-info">
                            <a href="{{ route('public.episodes.preview', ['slug' => $lastActivity->episodeRel->slug]) }}">
                                {{ __('Nazad na video') }}
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
