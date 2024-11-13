@extends('public-part.layout.layout')

@section('js-scripts') @vite(['resources/js/dedicated/episode.js']) @endsection

@section('public-content')
    <!-- Review options -->
    @include('public-part.app.episodes.includes.add-review')
    <!-- Notes -->
    @include('public-part.app.episodes.includes.edit-note')
    <!-- Questionnaire -->
    @include('public-part.app.episodes.includes.questionnaire')

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
                <h3>{{ $episode->title ?? '' }}</h3>
                <i class="fas fa-times toggle-player"></i>
            </div>
            <div class="ew__body" id="ew__body_wrapper">
                @php $counter = 1; @endphp
                @foreach($episode->videoContentRel as $content)
                    <div class="se__wrapper @if($video->id == $content->id) current @endif" video-id="{{ $content->id }}">
                        <div class="se__w__no">
                            <div class="checkbox_w @if($content->activityRel->finished ?? 0) checked @endif mark-video-as-watched" video-id="{{ $content->id }}">
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
                <div class="inner__tab @if(!$episode->totalReviews()) d-none @endif" ref-tag="reviews">
                    <p> {{ __('Recenzije') }} </p>
                    <img src="{{ asset('files/images/default/icons/review-white.svg') }}" alt="">
                </div>
                <div class="inner__tab" ref-tag="rest_of_episodes">
                    <p> {{ __('Ostale epizode') }} </p>
                    <img src="{{ asset('files/images/default/icons/screen-play-white.svg') }}" alt="">
                </div>
                <div class="inner__tab leave-review">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                        <path fill="#FFFFFF" d="m8,12c3.309,0,6-2.691,6-6S11.309,0,8,0,2,2.691,2,6s2.691,6,6,6Zm0-10c2.206,0,4,1.794,4,4s-1.794,4-4,4-4-1.794-4-4,1.794-4,4-4Zm-3,12h5v2h-5c-1.654,0-3,1.346-3,3v5H0v-5c0-2.757,2.243-5,5-5Zm19,3l-3.054,2.083,1.271,3.982-.818.571-3.382-2.338-3.331,2.338-.787-.593,1.181-4.022-3.079-2.016v-1.006h4.2l1.285-4.363h1.059l1.283,4.363h4.174v1Z"/>
                    </svg>
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
                @include('public-part.app.episodes.sections.reviews')

                <!-- Rest of episodes -->
                @include('public-part.app.episodes.sections.rest_of_episodes')
            </div>
        </div>
    </div>
@endsection
