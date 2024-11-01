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
