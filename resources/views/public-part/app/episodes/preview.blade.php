@extends('public-part.layout.layout')

@section('public-content')
    <!-- Review options -->
    @include('public-part.app.episodes.includes.add-review')
    <!-- Notes -->
    @include('public-part.app.episodes.includes.edit-note')

    <div class="video__player">
        <div class="player__wrapper">
{{--            <iframe id="active-video" current-time="{{ $video->activityRel->time ?? 0 }}" finished="{{ $video->finished }}" video-id="{{ $video->id }}" episode-id="{{ $episode->id }}" src="https://iframe.mediadelivery.net/embed/{{ $video->library_id }}/{{ $video->video_id }}?autoplay=false&loop=false&muted=false&preload=true&responsive=true" loading="lazy" allow="accelerometer;gyroscope;autoplay;encrypted-media;picture-in-picture;" allowfullscreen="true"></iframe>--}}

            <div class="next__video d-none">
                <div class="next__video__btn">
                    <div class="up__next">
                        <p>{{ __('Sljedeće') }}</p>
                        <h1 id="shadow-video-title"> 2. Izbori 2024 - Part four </h1>
                    </div>
                    <div class="progress-circle p0">
                        <span> <img src="{{ asset('files/images/default/icons/play.svg') }}" alt=""> </span>
                        <div class="left-half-clipper">
                            <div class="first50-bar"></div>
                            <div class="value-bar"></div>
                        </div>
                    </div>
                    <div class="cancel_id">
                        <p>{{ __('Odustani') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="episodes__wrapper">
            <div class="ew__header">
                <h3>{{ __('Kaftan studio') }}</h3>
                <i class="fas fa-times toggle-player"></i>
            </div>
            <div class="ew__body">
                @php $counter = 1; @endphp
                @foreach($episode->videoContentRel as $content)
                    <div class="se__wrapper @if($video->id == $content->id) current @endif" video-id="{{ $content->id }}">
                        <div class="se__w__no">
                            <div class="checkbox_w @if($content->activityRel->finished ?? 0) checked @endif">
                                <img src="{{ asset('files/images/default/icons/check.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="se__w__data">
                            <div class="header__">
                                <p> {{ $counter ++ }}. {{ $content->title ?? '' }} </p>
                                <img class="toggle_short_description" src="{{ asset('files/images/default/icons/arrow_down_b.svg') }}" alt="">
                            </div>
                            <div class="short__description">
                                {!! nl2br($content->description ?? '') !!}
                            </div>
                            <div class="rest__of_data">
                                <div class="duration_w">
                                    <img src="{{ asset('files/images/default/icons/video.svg') }}" alt="">
                                    <span>{{ $content->getDuration() }}</span>
                                </div>
                                <div class="play_w" video-id="{{ $content->id }}">
                                    <span>{{ __('Play') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="ew__footer">
                <a href="#more-about" class="show-more-about">
                    <button class="btn-secondary">
                        <img src="{{ asset('files/images/default/icons/topic.svg') }}" alt="">
                        {{ __('Više o temi') }}
                    </button>
                </a>
                <a href="#presenter-wrapper" class="show-presenter-wrapper">
                    <button class="btn-secondary">
                        <img src="{{ asset('files/images/default/icons/presenter.svg') }}" alt="">
                        {{ __('O predavaču') }}
                    </button>
                </a>
            </div>
        </div>
        <!-- Switch screen mode arrow -->
        <div class="right_arrow toggle-player">
            <img src="{{ asset('files/images/default/icons/arrow_left.svg') }}" alt="">
            <p>{{ __('Pregled sadržaja') }}</p>
        </div>
    </div>

    <div class="other__specs">
        <div class="inner__w">
            <div class="inner__header">
                <div class="inner__tab active" ref-tag="overview__wrapper">
                    <p> {{ __('Više informacija') }} </p>
                    <img src="{{ asset('files/images/default/icons/info-white.svg') }}" alt="">
                </div>
                <div class="inner__tab" ref-tag="presenter">
                    <p> {{ __('O predavaču') }} </p>
                    <img src="{{ asset('files/images/default/icons/chalkboard-user-white.svg') }}" alt="">
                </div>
                <div class="inner__tab" ref-tag="my__notes">
                    <p> {{ __('Zabilješke') }} </p>
                    <img src="{{ asset('files/images/default/icons/memo-pad-white.svg') }}" alt="">
                </div>
                @if($episode->totalReviews())
                    <div class="inner__tab" ref-tag="reviews">
                        <p> {{ __('Recenzije') }} </p>
                        <img src="{{ asset('files/images/default/icons/review-white.svg') }}" alt="">
                    </div>
                @endif
                <div class="inner__tab" ref-tag="rest_of_episodes">
                    <p> {{ __('Ostale epizode') }} </p>
                    <img src="{{ asset('files/images/default/icons/screen-play-white.svg') }}" alt="">
                </div>
            </div>

            <div class="inner__body">
                <!-- More info -->
                @include('public-part.app.episodes.sections.overview__wrapper')

                <!-- Presenter info -->
                @include('public-part.app.episodes.sections.presenter')

                <!-- My notes -->
                @include('public-part.app.episodes.sections.my__notes')

                <!-- Reviews -->
                @if($episode->totalReviews())
                    @include('public-part.app.episodes.sections.reviews')
                @endif

                <!-- Rest of episodes -->
                @include('public-part.app.episodes.sections.rest_of_episodes')
            </div>
        </div>
    </div>
@endsection
