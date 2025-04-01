@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-bell"></i> @endsection
@section('c-title') {{ __('Notifications queue') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.admin.episodes.notifications.preview-queue') }}">{{ __('Notifications queue') }}</a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.admin.episodes') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    <a href="{{ route('system.admin.episodes.notifications.preview-queue') }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('system.admin.episodes.notifications.save-message') }}" method="POST" id="js-form">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Naslov email-a'))->for('title')->class('bold') }}
                                {{ html()->text('title')->class('form-control form-control-sm')->required()->maxlength('150')}}
                            </div>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Kratki opis'))->for('body')->class('bold') }}
                                {{ html()->textarea('body')->class('form-control form-control-sm mt-2 textarea-120 summernote') }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
