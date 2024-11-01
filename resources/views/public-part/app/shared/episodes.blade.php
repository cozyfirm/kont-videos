<section class="episodes">
    <div class="inner__wrapper @isset($all_episodes) all-episodes @endisset">
        @foreach($episodes as $episode)
            <div class="single__episode @isset($all_episodes) se__small @endisset">
                <img src="{{ asset($episode->imageRel->getFile()) }}" class="episode-img">
                @if (!$browser->isMobile())
                    <video class="episode-hover-video" loop muted preload src="{{ asset($episode->videoRel->getFile()) }}"></video>
                @endif

                <div class="card__content">
                    <h1> {{ $episode->title ?? '' }} </h1>
                    <p>{{ $episode->presenterRel->name ?? '' }}</p>
                    <div class="card-btns">
                        <button type="submit" class="btn-primary modaloppener"><i class="fi fi-bs-play-circle"></i>Trailer</button>
                        <a href="{{ route('public.episodes.preview', ['slug' => $episode->slug]) }}">
                            <button class="btn-primary"><i class="fi fi-bs-play-circle"></i>Video</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

        @if(!isset($all_episodes))
            <div class="all__episodes">
                <a href="{{ route('public.episodes') }}">
                    <button class="btn-secondary">
                        {{ __('Sve epizode') }}
                        <i class="fi fi-br-arrow-small-right"></i>
                    </button>
                </a>
            </div>
        @else
            <!-- ToDo:: Add in new release -->
{{--            <div class="load__more">--}}
{{--                <a href="{{ route('public.episodes') }}">--}}
{{--                    <button class="btn-secondary">--}}
{{--                        {{ __('Učitajte još') }}--}}
{{--                    </button>--}}
{{--                </a>--}}
{{--            </div>--}}
        @endif
    </div>
</section>
