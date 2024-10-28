@extends('public-part.layout.layout')

@section('public-content')
    <!-- Review options -->
    @include('public-part.app.episodes.includes.add-review')

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
                <button class="btn-secondary">
                    <img src="{{ asset('files/images/default/icons/topic.svg') }}" alt="">
                    {{ __('Više o temi') }}
                </button>
                <button class="btn-secondary">
                    <img src="{{ asset('files/images/default/icons/presenter.svg') }}" alt="">
                    {{ __('O predavaču') }}
                </button>
            </div>
        </div>

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
                </div>
{{--                <div class="inner__tab">--}}
{{--                    <p> {{ __('O temi') }} </p>--}}
{{--                </div>--}}
                <div class="inner__tab" ref-tag="presenter">
                    <p> {{ __('O predavaču') }} </p>
                </div>
                <div class="inner__tab" ref-tag="overview__wrapper">
                    <p> {{ __('Zabilješke') }} </p>
                </div>
                <div class="inner__tab" ref-tag="overview__wrapper">
                    <p> {{ __('Recenzije') }} </p>
                </div>
                <div class="inner__tab" ref-tag="rest_of_episodes">
                    <p> {{ __('Ostale epizode') }} </p>
                </div>
            </div>

            <div class="inner__body">
                <div class="inner__element overview__wrapper active">
                    <h1> {{ $episode->title ?? '' }} </h1>
                    <div class="numbers__w">
                        <div class="number">
                            <div class="number__header">
                                <h4> 4.2 </h4>
                                <img src="{{ asset('files/images/default/icons/green_star.svg') }}" alt="">
                            </div>
                            <p> 156 recenzija </p>
                        </div>
                        <div class="number">
                            <div class="number__header">
                                <h4> {{ $episode->totalViews() }} </h4>
                            </div>
                            <p> {{ __('Pregleda') }} </p>
                        </div>
                        <div class="number">
                            <div class="number__header">
                                <h4> {{ $episode->totalDuration() }} </h4>
                            </div>
                            <p> {{ __('Ukupno') }} </p>
                        </div>
                    </div>

                    <div class="o-row">
                        <img src="{{ asset('files/images/default/icons/exclamation.svg') }}" alt="">
                        <p>{{ __('Zadnji put ažurirano') }} Maj 2024 {{ __('godine') }} </p>
                    </div>

                    <div class="o-row">
                        <img src="{{ asset('files/images/default/icons/globe.svg') }}" alt="">
                        <p>{{ __('Bosanski jezik') }} </p>
                    </div>

                    <div class="description">
                        {!! nl2br($episode->description ?? '') !!}
                    </div>
                </div>

                <div class="inner__element presenter">
                    <div class="img__wrapper">
                        <img src="{{ asset('files/images/public-part/users/' . ($episode->presenterRel->photoUri())) }}" class="episode-img">
                        <a href="#">
                            <h2> {{ $episode->presenterRel->name ?? '' }} </h2>
                        </a>
                    </div>
                    <div class="text__wrapper">
                        {!! nl2br($episode->presenterRel->about ?? '') !!}
                    </div>
                </div>

                <div class="inner__element rest_of_episodes">
                    @for($i=0; $i<4; $i++)
                        <div class="single__episode">
                            <img src="{{ asset('files/images/episodes/Kaftan.jpg') }}" class="episode-img">
                            <video loop muted preload src=" {{ asset('files/images/episodes/novi.mp4')}}"></video>

                            <div class="card__content">
                                <h1>Kaftan moda</h1>
                                <p>Sanja Delić</p>
                                <div class="card-btns">
                                    <form action="#" method="get">
                                        <button class="btn-primary"><i class="fi fi-bs-play-circle"></i>Video</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
