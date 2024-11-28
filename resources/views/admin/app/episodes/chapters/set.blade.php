@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-tv"></i> @endsection
@section('c-title') {{ $videoType->name ?? '' }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.admin.episodes') }}">{{ __('Pregled svih epizoda') }}</a> /
    <a href="{{ route('system.admin.episodes.preview', ['slug' => $episode->slug ]) }}">{{ $episode->title }}</a> /
    <a href="#">{{ $videoType->name ?? '' }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.episodes.preview', ['slug' => $episode->slug ]) }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="col-md-9">
                <form action="{{ route('system.admin.episodes.chapters-video-content.update') }}" method="POST" id="js-form">
                    {{ html()->hidden('episode_id')->class('form-control')->value($episode->id) }}
                    {{ html()->hidden('category')->class('form-control')->value($type) }}
                    @isset($videoChapter)
                        {{ html()->hidden('id')->class('form-control')->value($videoChapter->id) }}
                    @endisset

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('ID Biblioteke'))->for('library_id')->class('bold') }}
                                {{ html()->text('library_id')->class('form-control form-control-sm')->required()->id('library_id')->value((isset($videoChapter) ? $videoChapter->library_id : '61480'))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('ID videa'))->for('video_id')->class('bold') }}
                                {{ html()->text('video_id')->class('form-control form-control-sm')->required()->id('video_id')->value((isset($videoChapter) ? $videoChapter->video_id : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    @isset($videoChapter)
                        <hr>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('Trajanje'))->for('duration')->class('bold') }}
                                    {{ html()->text('duration')->class('form-control form-control-sm')->value((isset($videoChapter) ? $videoChapter->duration : ''))->required()->id("duration ")->isReadonly(true) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('Trajanje u sekundama'))->for('duration_sec')->class('bold') }}
                                    {{ html()->text('duration_sec')->class('form-control form-control-sm')->value((isset($videoChapter) ? $videoChapter->duration_sec : ''))->required()->id("duration_sec")->isReadonly(true) }}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ html()->label(__('Prosječno vrijeme gledanja'))->for('average_watch_time')->class('bold') }}
                                    {{ html()->text('average_watch_time')->class('form-control form-control-sm')->value((isset($videoChapter) ? $videoChapter->average_watch_time : '') . 's')->required()->id("duration ")->isReadonly(true) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ html()->label(__('Ukupno vrijeme gledanja'))->for('total_watch_time')->class('bold') }}
                                    {{ html()->text('total_watch_time')->class('form-control form-control-sm')->value((isset($videoChapter) ? $videoChapter->total_watch_time : '') . 's')->required()->id("duration_sec")->isReadonly(true) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ html()->label(__('Ukupan broj pregleda'))->for('views')->class('bold') }}
                                    {{ html()->text('views')->class('form-control form-control-sm')->value((isset($videoChapter) ? $videoChapter->views : ''))->required()->id("duration ")->isReadonly(true) }}
                                </div>
                            </div>
                        </div>
                    @endisset

                    <div class="row mt-4">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                        </div>
                    </div>
                </form>
            </div>

            @include('admin.app.episodes.snippets.right-menu')
        </div>
    </div>
@endsection
