@foreach($episode->chapterVideoRel->chaptersRel as $chapter)
    <div class="se__wrapper" video-id="{{ $chapter->id }}">
        <div class="se__w__no">
            <div class="checkbox_w mark-video-as-watched" video-id="{{ $chapter->id }}">
                <img src="{{ asset('files/images/default/icons/check.svg') }}" alt="">
            </div>
        </div>
        <div class="se__w__data">
            <div class="header__">
                <p> {{ $counter ++ }}. {{ $chapter->title ?? '' }} </p>
                <img class="toggle_short_description" src="{{ asset('files/images/default/icons/arrow_down_b.svg') }}" alt="">
            </div>
            <div class="short__description">
                {!! nl2br($chapter->description ?? '') !!}
            </div>
            <div class="rest__of_data">
                <div class="duration_w">
                    <img src="{{ asset('files/images/default/icons/video.svg') }}" alt="">
                    <span> 1m12s</span>
                </div>
                <div class="play_w" video-id="{{ $chapter->id }}">
                    <span>{{ __('Play') }}</span>
                </div>
            </div>
        </div>
    </div>
@endforeach
