@foreach($episode->chapterVideoRel->chaptersRel as $chapter)
    <div class="se__wrapper @if($activity->chapter_id == $chapter->id) current @endif" chapter-id="{{ $chapter->id }}">
        <div class="se__w__no">
            <div class="checkbox_w @if($chapter->activityRel->finished ?? 0) checked @endif mark-video-as-watched" chapter-id="{{ $chapter->id }}">
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
                    <span> {{ $chapter->getDuration() }} </span>
                </div>
                <div class="play_btn_w play_chapter" chapter-id="{{ $chapter->id }}" time="{{ $chapter->time }}">
                    <span>{{ __('Play') }}</span>
                </div>
            </div>
        </div>
    </div>
@endforeach
