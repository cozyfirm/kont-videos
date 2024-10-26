@extends('public-part.layout.layout')

@section('public-content')
    <!-- Include menu -->
    {{--@include('public-part.app.my-profile.snippets.inner-menu')--}}

    <div class="main__profile__wrapper white__wrapper">
        <div class="profile__wrapper profile__wrapper_wrap">
            <div class="last__watched">
                <div class="episode__image">
                    <img src="{{ asset($lastWatched->imageRel->getFile()) }}" class="episode-img">
                </div>
                <div class="episode__details">
                    <div class="text__wrapper">
                        <div class="width-100 episode__title">
                            <h1>{{ $lastWatched->title }}</h1>
                        </div>
                        <div class="width-100">
                            <button class="btn-primary">{{ __('ZADNJE GLEDANO') }}</button>
                        </div>
                        <div class="width-100 video__title">
                            <h2>{{ __('Društveno odgovorna moda') }}</h2>
                        </div>
                        <div class="width-100 description">
                            {!! substr(strip_tags($lastWatched->description), 0 , 300) !!} ...
                        </div>
{{--                        <div class="width-100 tags">--}}
{{--                            <button class="btn-dark-grey">{{ __('Moda') }}</button>--}}
{{--                            <button class="btn-dark-grey">{{ __('Društvo') }}</button>--}}
{{--                            <button class="btn-dark-grey">{{ __('Sestre') }}</button>--}}
{{--                        </div>--}}
                        <div class="width-100 details">
                            <div class="details__inner">
                                <p>4 chapters</p>
                                <span>|</span>
                                <p>2024</p>
                                <span>|</span>
                                <div class="icon_btn">
                                    <i class="fi fi-bs-clock"></i>
                                    <p>55 min</p>
                                </div>
                            </div>
                        </div>
                        <div class="width-100 more-info">
                            <a href="#">
                                {{ __('Više informacija') }}
                                <i class="fi fi-br-arrow-small-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my__learnings__line">

            <div class="my__learnings">
                @for($i=0; $i<8; $i++)
                    <div class="learning_wrapper">
                        <div class="image__wrapper">
                            <img src="{{ asset('files/images/public-part/blog/6ddf8fb6d2326e2914e8a1001efec2d8.jpg') }}" alt="">
                        </div>

                        <div class="text__wrapper">
                            <div class="text__content">
                                <h2>
                                    Hello there
                                    @if($i%2 == 0)
                                        , are you fine?
                                    @endif
                                </h2>
                            </div>

                            <div class="progress">
                                <p>Well hello there</p>

                                <div class="progress_line"><div class="real__progress"></div></div>

                                <div class="statistics">
                                    <h2>74%</h2>
                                    <div class="stars">
                                        <div class="svg__wrapper">
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                                                <path d="M19.467,23.316,12,17.828,4.533,23.316,7.4,14.453-.063,9H9.151L12,.122,14.849,9h9.213L16.6,14.453Z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                                                <path d="M19.467,23.316,12,17.828,4.533,23.316,7.4,14.453-.063,9H9.151L12,.122,14.849,9h9.213L16.6,14.453Z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                                                <path d="M19.467,23.316,12,17.828,4.533,23.316,7.4,14.453-.063,9H9.151L12,.122,14.849,9h9.213L16.6,14.453Z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                                                <path d="m19.448,23.309l-7.467-5.488-7.467,5.488,2.864-8.863L-.082,8.992h9.214L11.981.114l2.849,8.878h9.214l-7.46,5.453,2.864,8.863Zm-7.467-7.971l3.658,2.689-1.403-4.344,3.683-2.691h-4.548l-1.39-4.331v8.677Z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" >
                                                <g id="_01_align_center" data-name="01 align center"><path d="M19.467,23.316,12,17.828,4.533,23.316,7.4,14.453-.063,9H9.151L12,.122,14.849,9h9.213L16.6,14.453ZM12,15.346l3.658,2.689-1.4-4.344L17.937,11H13.39L12,6.669,10.61,11H6.062l3.683,2.691-1.4,4.344Z"/></g>
                                            </svg>
                                        </div>
                                        <p>{{ __('Moja ocjena') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="#"> </a>
                    </div>
                @endfor
            </div>

            <div class="load__more">
                <button class="btn-secondary">
                    {{ __('Učitajte još') }}
                </button>
            </div>
        </div>
    </div>
@endsection
