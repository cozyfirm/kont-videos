<div class="inner__element overview__wrapper active" id="more-about">
    <h1> {{ $episode->title ?? '' }} </h1>
    <div class="numbers__w">
        @if($episode->totalReviews())
            <div class="number">
                <div class="number__header">
                    <h4> {{ $episode->averageRating() }} </h4>
                    <img src="{{ asset('files/images/default/icons/star-yellow.svg') }}" alt="">
                </div>
                <p> {{ $episode->totalReviews() }} {{ __('recenzije/a') }} </p>
            </div>
        @endif
        <div class="number">
            <div class="number__header">
                <h4 class="episode-total-views">
                    @if($episode->type == 0)
                        <!-- Episode with videos -->
                        {{ $episode->videoContentRel->count() }}
                    @else
                        <!-- Episode with chapters -->
                        {{ $episode->chapterVideoRel->count() }}
                    @endif
                </h4>
            </div>
            <p> {{ __('Cjelina') }} </p>
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

{{--    <div class="o-row">--}}
{{--        <img src="{{ asset('files/images/default/icons/globe.svg') }}" alt="">--}}
{{--        <p>{{ $episode->languageRel->name ?? '' }} </p>--}}
{{--    </div>--}}

    <div class="description">
        {!! nl2br($episode->description ?? '') !!}
    </div>
</div>
