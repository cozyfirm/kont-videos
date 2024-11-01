<div class="inner__element presenter" id="presenter-wrapper">
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
