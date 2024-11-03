@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-file"></i> @endsection
@section('c-title') {{ $page->title }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.admin.other.pages') }}">{{ __('Single pages') }}</a> /
    <a href="#">{{ $page->title }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.other.pages') }}">
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
                <form action="{{ route('system.admin.other.pages.update') }}" method="POST" id="js-form">
                    @if(isset($edit))
                        {{ html()->hidden('id')->class('form-control')->value($page->id) }}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Naslov'))->for('title')->class('bold') }}
                                {{ html()->text('title')->class('form-control form-control-sm')->required()->value((isset($page) ? $page->title : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Detaljan opis'))->for('description')->class('bold') }}
                                {{ html()->textarea('description')->class('form-control form-control-sm mt-2 textarea-240 summernote')->value(isset($page) ? $page->description : '')->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Video url'))->for('yt_link')->class('bold') }}
                                {{ html()->text('yt_link')->class('form-control form-control-sm')->value((isset($page) ? $page->yt_link : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark btn-sm"> {{ __('Sačuvajte izmjene') }} </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-3 border-left">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-0 m-0" title="#">
                            <div class="card-body d-flex justify-content-between">
                                <h5 class="p-0 m-0"> {{ __('Ostale informacije') }} </h5>
                                <i class="fas fa-info mt-1 mr-1"></i>
                            </div>
                        </div>

                        <form action="{{ route('system.admin.other.pages.update-photo') }}" method="POST" id="update-profile-image" enctype="multipart/form-data">
                            @csrf
                            {{ html()->hidden('page_id')->class('form-control')->value($page->id) }}
                            <div class="card p-0 m-0 mt-3" title="{{ __('Nova fotografija za program') }}">
                                <div class="card-body d-flex justify-content-between">
                                    <label for="photo_uri" >
                                        <p class="m-0">{{ __('Ažurirajte fotografiju') }}</p>
                                    </label>
                                    <i class="fas fa-image mt-1"></i>
                                </div>
                                <input name="photo_uri" class="form-control form-control-lg d-none" id="photo_uri" type="file">
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
