@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-tv"></i> @endsection
@section('c-title') @isset($create) {{ __('Unos chaptera') }} @else {{ $chapter->title ?? '' }} @endisset @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.admin.episodes') }}">{{ __('Pregled svih epizoda') }}</a> /
    <a href="{{ route('system.admin.episodes.preview', ['slug' => $episode->slug ]) }}">{{ $episode->title }}</a> /
    <a href="#">{{ __('Video') }}</a> /
    <a href="#">@isset($create) {{ __('Unos chaptera') }} @else {{ $chapter->title ?? '' }} @endisset </a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.episodes.preview', ['slug' => $episode->slug ]) }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>
    @if(isset($preview))
        <a href="{{ route('system.admin.episodes.chapters-video-content.chapters.edit', ['id' => $chapter->id ]) }}">
            <button class="pm-btn btn pm-btn-edit">
                <i class="fas fa-edit"></i>
            </button>
        </a>
        <a href="{{ route('system.admin.episodes.chapters-video-content.chapters.delete', ['id' => $chapter->id ]) }}">
            <button class="pm-btn btn pm-btn-trash">
                <i class="fas fa-trash"></i>
            </button>
        </a>
    @endif
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="col-md-9">
                <form action="@if(isset($edit)) {{ route('system.admin.episodes.chapters-video-content.chapters.update') }} @else {{ route('system.admin.episodes.chapters-video-content.chapters.save') }} @endif" method="POST" id="js-form">
                    {{ html()->hidden('video_id')->class('form-control')->value($chapterVideo->id) }}

                    @isset($chapter)
                        {{ html()->hidden('id')->class('form-control')->value($chapter->id) }}
                    @endisset

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Naslov chaptera'))->for('title')->class('bold') }}
                                {{ html()->text('title')->class('form-control form-control-sm')->required()->value((isset($chapter) ? $chapter->title : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ html()->label(__('Početak (sati)'))->for('hour')->class('bold') }}
                                {{ html()->select('hour', ['0' => '0', '1' => '1', '2' => '2'], isset($chapter) ? $chapter->hour : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ html()->label(__('Početak (minuta)'))->for('min')->class('bold') }}
                                {{ html()->select('min', $time, isset($chapter) ? $chapter->min : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{ html()->label(__('Početak (sekundi)'))->for('sec')->class('bold') }}
                                {{ html()->select('sec', $time, isset($chapter) ? $chapter->sec : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Kratki opis'))->for('description')->class('bold') }}
                                {{ html()->textarea('description')->class('form-control form-control-sm mt-2 textarea-120 summernote')->value(isset($chapter) ? $chapter->description : '')->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    @if(!isset($preview))
                        <div class="row mt-4">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark btn-sm"> @isset($create) {{ __('SAČUVAJTE') }} @else {{ __('AŽURIRAJTE') }}@endisset </button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>

            @include('admin.app.episodes.snippets.right-menu')
        </div>
    </div>
@endsection
