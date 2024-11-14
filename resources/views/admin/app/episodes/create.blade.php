@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-tv"></i> @endsection
@section('c-title') {{ __('Epizode') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.admin.episodes') }}">{{ __('Pregled svih epizoda') }}</a> /
    @if(!isset($episode))
        <a href="#">{{ __('Unos') }}</a>
    @else
        <a href="{{ route('system.admin.episodes.preview', ['slug' => $episode->slug ]) }}">{{ $episode->title }}</a>
    @endif
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.episodes') }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>

    @if(isset($preview))
        <a href="{{ route('system.admin.episodes.edit', ['slug' => $episode->slug ]) }}">
            <button class="pm-btn btn pm-btn-edit">
                <i class="fas fa-edit"></i>
            </button>
        </a>
        <a href="{{ route('system.admin.episodes.delete', ['slug' => $episode->slug ]) }}">
            <button class="pm-btn btn pm-btn-trash">
                <i class="fas fa-trash"></i>
            </button>
        </a>
    @endif
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        @if(session()->has('success'))
            <div class="alert alert-success mt-3">
                {{ session()->get('success') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger mt-3">
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="row">
            <div class="@if(isset($preview)) col-md-9 @else col-md-12 @endif">
                <form action="@if(isset($edit)) {{ route('system.admin.episodes.update') }} @else {{ route('system.admin.episodes.save') }} @endif" method="POST" enctype="multipart/form-data">
                    @if(isset($edit))
                        {{ html()->hidden('id')->class('form-control')->value($episode->id) }}
                    @endif
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Naslov epizode'))->for('title')->class('title') }}
                                {{ html()->text('title')->class('form-control form-control-sm')->required()->value((isset($episode) ? $episode->title : ''))->maxlength('150')->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Predavač'))->for('presenter_id')->class('bold') }}
                                {{ html()->select('presenter_id', $users, isset($episode) ? $episode->presenter_id : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Kratki opis'))->for('short_description')->class('bold') }}
                                {{ html()->text('short_description')->class('form-control form-control-sm')->required()->value((isset($episode) ? $episode->short_description : ''))->maxlength('200')->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Jezik'))->for('language_id')->class('bold') }}
                                {{ html()->select('language_id', $languages, isset($episode) ? $episode->language_id : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Status'))->for('status')->class('bold') }}
                                {{ html()->select('status', $statuses, isset($episode) ? $episode->status : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Detaljan opis'))->for('description')->class('bold') }}
                                {{ html()->textarea('description')->class('form-control form-control-sm mt-2 textarea-240 summernote')->value(isset($episode) ? $episode->description : '')->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    @if(!isset($preview))
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="mb-3">
                                        {{ html()->label(__('Fotografija'))->for('image_id')->class('bold') }}
                                        <input class="form-control" type="file" id="image_id" name="image_id">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="mb-3">
                                        {{ html()->label(__('Video'))->for('video_id')->class('bold') }}
                                        <input class="form-control" type="file" id="video_id" name="video_id">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(!isset($preview))
                        <div class="row mt-4">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>

            @if(isset($preview))
                @include('admin.app.episodes.snippets.right-menu')
            @endif
        </div>
    </div>
@endsection
