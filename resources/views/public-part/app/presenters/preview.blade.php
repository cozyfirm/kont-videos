@extends('public-part.layout.layout')

<!-- Meta tags -->
@section('title'){{ $presenter->title }}@endsection
@section('meta_uri'){{ route('public.presenters.preview', ['username' => $presenter->username ]) }}@endsection
@section('meta_title'){{ $presenter->name }}@endsection
@section('meta_desc'){{ $presenter->about }}@endsection
@isset($presenter->photo_uri) @section('meta_img'){{ asset('files/images/public-part/users/' . ($presenter->photoUri())) }}@endsection @endisset

@section('public-content')
    <!-- Import episode trailer -->
    @include('public-part.app.shared.trailer')

    <div class="presenters__wrapper">
        <div class="sp__inner_w">
            <div class="sp__content">
                <div class="sp__data">
                    @if(isset($presenter->cover_photo_uri))
                        <div class="cover__image">
                            <img src="{{ asset('files/images/public-part/users/' . ($presenter->coverPhotoUri())) }}" class="{{ $presenter->name ?? '' }}">
                        </div>
                    @endif

                    <div class="text__info">
                        {!! nl2br($presenter->about ?? '') !!}
                    </div>

                    <div class="episode__info">
                        <div class="ei__rest">
                            <div class="ei_r_data">
                                @if($presenter->episodeRel->isNew() and $presenter->episodeRel->status == 1)
                                    <div class="full-width d-center">
                                        <button class="btn-tertiary">{{ __('NOVO') }}</button>
                                    </div>
                                @endif
                                @if($presenter->episodeRel->status == 3)
                                    <div class="full-width d-center">
                                        <button class="btn-tertiary">{{ __('USKORO') }}</button>
                                    </div>
                                @endif
                                <div class="full-width d-center">
                                    <h1>{{ $presenter->episodeRel->title ?? '' }}</h1>
                                </div>
                                <div class="full-width d-center">
                                    <h2>{{ $presenter->episodeRel->short_description ?? '' }}</h2>
                                </div>
                                <div class="full-width d-center">
                                    <div class="btns__wrapper">
                                        <button class="play-btn @if($presenter->episodeRel->status == 1) go-to @endif" custom-uri="{{ route('public.episodes.preview', ['slug' => $presenter->episodeRel->slug]) }}">
                                            <i class="fi fi-br-play"></i>
                                            {{ __('PLAY') }}
                                        </button>
                                        <button class="watch-trailer show__trailer" episode-id="{{ $presenter->episodeRel->id }}">
                                            {{ __('Pregledaj trailer') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="tags__wrapper">
                                    @foreach($presenter->episodeRel->getAllTags() as $tag)
                                        <button> {{ $tag->tag ?? '' }} </button>
                                    @endforeach
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
