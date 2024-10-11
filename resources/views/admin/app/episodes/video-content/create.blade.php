@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-tv"></i> @endsection
@section('c-title') {{ __('Video sadržaj') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.admin.episodes') }}">{{ __('Pregled svih epizoda') }}</a> /
    <a href="{{ route('system.admin.episodes.preview', ['slug' => $episode->slug ]) }}">{{ $episode->title }}</a> /
    @if(!isset($video))
        <a href="#">{{ __('Unos') }}</a>
    @else
        <a href="#">{{ __('Title') }}</a>
    @endif
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.episodes.preview', ['slug' => $episode->slug ]) }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>
    @isset($preview)
        <a href="{{ route('system.admin.episodes.video-content.edit', ['id' => $video->id ]) }}">
            <button class="pm-btn btn pm-btn-edit">
                <i class="fas fa-edit"></i>
            </button>
        </a>
        <a href="{{ route('system.admin.episodes.video-content.delete', ['id' => $video->id ]) }}">
            <button class="pm-btn btn pm-btn-trash">
                <i class="fas fa-trash"></i>
            </button>
        </a>
    @endisset
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="@if(isset($preview)) col-md-9 @else col-md-12 @endif">
                <form action="@if(isset($edit)) {{ route('system.admin.episodes.video-content.update') }} @else {{ route('system.admin.episodes.video-content.save') }} @endif" method="POST" id="js-form">
                    {{ html()->hidden('episode_id')->class('form-control')->value($episode->id) }}
                    @isset($edit)
                        {{ html()->hidden('id')->class('form-control')->value($video->id) }}
                    @endisset
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Naslov videa'))->for('title')->class('bold') }}
                                {{ html()->text('title')->class('form-control form-control-sm')->required()->value((isset($video) ? $video->title : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Kategorija'))->for('category')->class('bold') }}
                                {{ html()->select('category', $category, isset($video) ? $video->category : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Kratki opis'))->for('description')->class('bold') }}
                                {{ html()->textarea('description')->class('form-control form-control-sm mt-2 textarea-120 summernote')->value(isset($video) ? $video->description : '')->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('ID Biblioteke'))->for('library_id')->class('bold') }}
                                {{ html()->text('library_id')->class('form-control form-control-sm')->required()->id('library_id')->value((isset($video) ? $video->library_id : '61480'))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('ID videa'))->for('video_id')->class('bold') }}
                                {{ html()->text('video_id')->class('form-control form-control-sm')->required()->id('video_id')->value((isset($video) ? $video->video_id : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    @isset($preview)
                        <hr>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('Trajanje'))->for('duration')->class('bold') }}
                                    {{ html()->text('duration')->class('form-control form-control-sm')->value((isset($video) ? $video->duration : ''))->required()->id("duration ")->isReadonly(isset($preview)) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('Trajanje u sekundama'))->for('duration_sec')->class('bold') }}
                                    {{ html()->text('duration_sec')->class('form-control form-control-sm')->value((isset($video) ? $video->duration_sec : ''))->required()->id("duration_sec")->isReadonly(isset($preview)) }}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ html()->label(__('Prosječno vrijeme gledanja'))->for('average_watch_time')->class('bold') }}
                                    {{ html()->text('average_watch_time')->class('form-control form-control-sm')->value((isset($video) ? $video->average_watch_time : '') . 's')->required()->id("duration ")->isReadonly(isset($preview)) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ html()->label(__('Ukupno vrijeme gledanja'))->for('total_watch_time')->class('bold') }}
                                    {{ html()->text('total_watch_time')->class('form-control form-control-sm')->value((isset($video) ? $video->total_watch_time : '') . 's')->required()->id("duration_sec")->isReadonly(isset($preview)) }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ html()->label(__('Ukupan broj pregleda'))->for('views')->class('bold') }}
                                    {{ html()->text('views')->class('form-control form-control-sm')->value((isset($video) ? $video->views : ''))->required()->id("duration ")->isReadonly(isset($preview)) }}
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

            @isset($preview)
                @include('admin.app.episodes.snippets.right-menu')
            @endisset
        </div>
    </div>
@endsection
