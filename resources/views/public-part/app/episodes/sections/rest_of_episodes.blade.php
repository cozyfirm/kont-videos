<div class="inner__element rest_of_episodes">
    <div class="ie_roe__wrapper">
        @foreach($otherEpisodes as $episode)
            <div class="single__episode">
                <img src="{{ asset($episode->imageRel->getFile()) }}" class="episode-img">
                @if (!$browser->isMobile())
                    <video class="episode-hover-video" loop muted preload src="{{ asset($episode->videoRel->getFile()) }}"></video>
                @endif

                <div class="card__content">
                    <h1>{{ $episode->title ?? '' }}</h1>
                    <p>{{ $episode->presenterRel->name ?? '' }}</p>
                    <div class="card-btns">
                        <a href="{{ route('public.episodes.preview', ['slug' => $episode->slug]) }}">
                            <button class="btn-primary"><i class="fi fi-bs-play-circle"></i>Video</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="all__episodes">
        <a href="{{ route('public.episodes') }}">
            <button class="btn-secondary">
                {{ __('Sve epizode') }}
                <i class="fi fi-br-arrow-small-right"></i>
            </button>
        </a>
    </div>
</div>
