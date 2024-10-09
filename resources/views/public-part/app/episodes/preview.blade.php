@extends('public-part.layout.layout')

@section('public-content')
    <div class="video__player">
        <div class="player__wrapper">

        </div>
        <div class="episodes__wrapper">
            <div class="ew__header">
                <h3>{{ __('Kaftan studio') }}</h3>
                <i class="fas fa-times"></i>
            </div>
            <div class="ew__body">
                eeee
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
    </div>
@endsection
