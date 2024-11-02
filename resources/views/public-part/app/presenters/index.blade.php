@extends('public-part.layout.layout')

@section('public-content')
    <div class="presenters__wrapper">
        <div class="inner__wrapper pt-32">
            @foreach($presenters as $presenter)
                <div class="presenter__wrapper go-to" custom-uri="{{ route('public.presenters.preview', ['username' => $presenter->username ]) }}">
                    <img src="{{ asset('files/images/public-part/users/' . ($presenter->photoUri())) }}" class="{{ $presenter->name ?? '' }}">
                    <div class="presenter__info">
                        <h1>{{ $presenter->name ?? ''}}</h1>
                    </div>
                    <div class="hover__wrapper">
                        <div class="hover__header">
                            <h2> {{ $presenter->episodeRel->title ?? ''  }} </h2>
                        </div>
                        <div class="hover__footer">
                            <div class="hover__btn">
                                <p> {{ $presenter->episodeRel->getCreationYear() }} </p>
                                <span>|</span>
                                <div class="icon_btn">
                                    <i class="fi fi-bs-clock"></i>
                                    <p> {{ $presenter->episodeRel->totalDuration() }} </p>
                                </div>
                            </div>
                            @if($presenter->episodeRel->totalReviews())
                                <div class="presenters__stars__wrapper">
                                    @include('public-part.app.shared.common.stars-white', ['stars' => $presenter->episodeRel->averageRating() ])
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
