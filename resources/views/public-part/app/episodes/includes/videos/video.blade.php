@foreach($episode->videoContentRel as $content)
    <div class="se__wrapper @if($video->id == $content->id) current @endif" video-id="{{ $content->id }}">
        <div class="se__w__no">
            <div class="checkbox_w @if($content->activityRel->finished ?? 0) checked @endif mark-video-as-watched" video-id="{{ $content->id }}">
                <img src="{{ asset('files/images/default/icons/check.svg') }}" alt="">
            </div>
        </div>
        <div class="se__w__data">
            <div class="header__">
                <p> {{ $counter ++ }}. {{ $content->title ?? '' }} </p>
                <img class="toggle_short_description" src="{{ asset('files/images/default/icons/arrow_down_b.svg') }}" alt="">
            </div>
            <div class="short__description">
                {!! nl2br($content->description ?? '') !!}
            </div>
            <div class="rest__of_data">
                <div class="duration_w">
                    <img src="{{ asset('files/images/default/icons/video.svg') }}" alt="">
                    <span>{{ $content->getDuration() }}</span>
                </div>
                <div class="play_w" video-id="{{ $content->id }}">
                    <span>{{ __('Play') }}</span>
                </div>
            </div>
        </div>
    </div>
@endforeach
