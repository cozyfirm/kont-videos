@extends('public-part.layout.layout')

@section('public-content')
    <div class="video__player">
        <div class="player__wrapper">

        </div>
        <div class="episodes__wrapper">
            <div class="ew__header">
                <h3>{{ __('Kaftan studio') }}</h3>
                <i class="fas fa-times toggle-player"></i>
            </div>
            <div class="ew__body">
                @for($i=0; $i<6; $i++)
                    <div class="se__wrapper">
                        <div class="se__w__no">
                            <div class="checkbox_w @if($i%2 == 0) checked @endif">
                                <img src="{{ asset('files/images/default/icons/check.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="se__w__data">
                            <div class="header__">
                                <p> {{ $i + 1 }}. Check our first KONT video </p>
                                <img class="toggle_short_description" src="{{ asset('files/images/default/icons/arrow_down_b.svg') }}" alt="">
                            </div>
                            <div class="short__description">
                                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book </p>
                            </div>
                            <div class="rest__of_data">
                                <div class="duration_w">
                                    <img src="{{ asset('files/images/default/icons/video.svg') }}" alt="">
                                    <span>12 min</span>
                                </div>
                                <div class="play_w">
                                    <span>Play</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="ew__footer">
                <button class="btn-secondary">
                    <img src="{{ asset('files/images/default/icons/topic.svg') }}" alt="">
                    {{ __('Više o temi') }}
                </button>
                <button class="btn-secondary">
                    <img src="{{ asset('files/images/default/icons/presenter.svg') }}" alt="">
                    {{ __('O predavaču') }}
                </button>
            </div>
        </div>

        <div class="right_arrow toggle-player">
            <img src="{{ asset('files/images/default/icons/arrow_left.svg') }}" alt="">
            <p>{{ __('Pregled sadržaja') }}</p>
        </div>
    </div>
@endsection
