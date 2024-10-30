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
                <div class="inner__tab" ref-tag="reviews">
                    <p> {{ __('Recenzije') }} </p>
                    <img src="{{ asset('files/images/default/icons/review-white.svg') }}" alt="">
                </div>
                <div class="inner__tab" ref-tag="rest_of_episodes">
                    <p> {{ __('Ostale epizode') }} </p>
                    <img src="{{ asset('files/images/default/icons/screen-play-white.svg') }}" alt="">
                </div>
            </div>

            <div class="inner__body">
                <div class="inner__element overview__wrapper" id="more-about">
                    <h1> {{ $episode->title ?? '' }} </h1>
                    <div class="numbers__w">
                        <div class="number">
                            <div class="number__header">
                                <h4> 4.2 </h4>
                                <img src="{{ asset('files/images/default/icons/star-yellow.svg') }}" alt="">
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
                        <p>{{ __('Zadnji put ažurirano') }} {{ $episode->lastUpdated() }} {{ __('godine') }} </p>
                    </div>

                    <div class="o-row">
                        <img src="{{ asset('files/images/default/icons/globe.svg') }}" alt="">
                        <p>{{ $episode->languageRel->name ?? '' }} </p>
                    </div>

                    <div class="description">
                        {!! nl2br($episode->description ?? '') !!}
                    </div>
                </div>

                <div class="inner__element presenter " id="presenter-wrapper">
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

                <div class="inner__element my__notes active">
                    <div class="add__note___wrapper">
                        <!-- ToDo:: On change video, replace this video ID -->
                        <div class="add__new_note" video-id="{{ $video->id }}" episode-id="{{ $episode->id }}">
                            <div class="add__new__note_text">
                                <p>{{ __('Dodaj novu zabilješku u ') }} </p>
                                <p class="note__time"> 03:12 </p>
                            </div>
                            <div class="add__new__note_icon">
                                <svg id="Layer_1" height="32"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m16 16a1 1 0 0 1 -1 1h-2v2a1 1 0 0 1 -2 0v-2h-2a1 1 0 0 1 0-2h2v-2a1 1 0 0 1 2 0v2h2a1 1 0 0 1 1 1zm6-5.515v8.515a5.006 5.006 0 0 1 -5 5h-10a5.006 5.006 0 0 1 -5-5v-14a5.006 5.006 0 0 1 5-5h4.515a6.958 6.958 0 0 1 4.95 2.05l3.484 3.486a6.951 6.951 0 0 1 2.051 4.949zm-6.949-7.021a5.01 5.01 0 0 0 -1.051-.78v4.316a1 1 0 0 0 1 1h4.316a4.983 4.983 0 0 0 -.781-1.05zm4.949 7.021c0-.165-.032-.323-.047-.485h-4.953a3 3 0 0 1 -3-3v-4.953c-.162-.015-.321-.047-.485-.047h-4.515a3 3 0 0 0 -3 3v14a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="note__textarea">
                            {{ html()->textarea('new_note')->class('form-control form-control-sm')->id('new_note')->placeholder('Nova zabilješka..')->maxlength('240') }}

                            <div class="save__btn">
                                <button class="btn-primary save-new-note">
                                    {{ __('Sačuvajte') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="all__notes">
                        @foreach($episode->userNotesRel as $note)
                            <div class="single__note" note-id="{{ $note->id }}">
                                <div class="note__header">
                                    <div class="time__badge">
                                        <p>{{ $note->time ?? '' }}</p>
                                    </div>
                                    <div class="icons__wrapper">
                                        <div class="icon__wrapper edit__note__trigger" title="{{ __('Uredi zabilješku') }}">
                                            <i class="fi fi-bs-edit"></i>
                                        </div>
                                        <div class="icon__wrapper delete__note__trigger" title="{{ __('Obriši zabilješku') }}">
                                            <i class="fi fi-bs-trash"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="note__body">
                                    <h2> {{ $note->videoRel->title ?? '' }} </h2>
                                    <p class="note__body__value"> {{ $note->note ?? '' }} </p>
                                </div>
                                <div class="note__footer">
                                    <p> {{ $note->createdAtDate() }} </p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="inner__element reviews ">
                    <div class="reviews__global">
                        <div class="rg__wrapper rg__wrapper__small">
                            <p class="description">{{ __('Ukupno ocjena') }}</p>
                            <div class="heading__wrapper">
                                <h1>{{ $episode->totalReviews() }}</h1>
                            </div>
                            <p class="additional">{{ __('Ocjene od korisnika kont.ba') }}</p>
                        </div>
                        <div class="line__between"><div class="fill"></div></div>
                        <div class="rg__wrapper rg__wrapper__small">
                            <p class="description">{{ __('Prosječna ocjena') }}</p>
                            <div class="heading__wrapper">
                                <h1>{{ $episode->averageRating() }}</h1>
                                <div class="stars__wrapper">
                                    @include('public-part.app.shared.common.stars', ['stars' => $episode->averageRating() ])
                                </div>
                            </div>
                            <p class="additional">{{ __('Zaokružena prosječna ocjena') }}</p>
                        </div>
                        <div class="line__between"><div class="fill"></div></div>
                        <div class="rg__wrapper rg__wrapper__big rg__wrapper__reviews">
                            @foreach($reviewsByNumber as $index => $number)
                                <div class="rate__no">
                                    <div class="stars__no">
                                        <img src="{{ asset('files/images/default/icons/star-yellow.svg') }}" alt="">
                                        <p>{{ $index }}</p>
                                    </div>
                                    <div class="rate__line" line-width="{{ $number['percentage'] }}"> </div>
                                    <p>{{ $number['total'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="single__reviews">
                        @foreach($episode->approvedReviewsRel as $review)
                            <div class="single__review">
                                <div class="user__info">
                                    <div class="ui__img_w">
                                        @if(isset($review->userRel->photo_uri))
                                            <img src="{{ asset('files/images/public-part/users/' . ($review->userRel->photo_uri)) }}" alt="">
                                        @else
                                            <h2>{{ $review->userRel->getInitials() }}</h2>
                                        @endif
                                    </div>
                                    <div class="ui__info">
                                        <h2>{{ $review->userRel->name ?? '' }}</h2>
                                        <p>{{ __('Ukupno ocjena: ') }} {{ $review->userRel->totalReviews() }}</p>
                                    </div>
                                </div>
                                <div class="review__info">
                                    <div class="stars__and__date">
                                        <div class="stars">
                                            @include('public-part.app.shared.common.stars', ['stars' => $review->stars])
                                        </div>
                                        <div class="date">
                                            <p>{{ $review->createdAt() }}h</p>
                                        </div>
                                    </div>

                                    <div class="note">
                                        <p>{!! nl2br($review->note ?? '') !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="inner__element rest_of_episodes ">
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
