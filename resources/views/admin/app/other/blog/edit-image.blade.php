@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-wind"></i> @endsection
@section('c-title') {{ __('Blog') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.admin.blog') }}">{{ __('Blog') }}</a> /
    <a href="#">{{ __('Post') }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.blog') }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>

    @if(isset($preview))
        <a href="{{ route('system.admin.blog.edit', ['id' => $post->id ]) }}">
            <button class="pm-btn btn pm-btn-edit">
                <i class="fas fa-edit"></i>
            </button>
        </a>
    @endif
    @if(isset($edit))
        <a href="{{ route('system.admin.blog.delete', ['id' => $post->id ]) }}">
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
            <div class="col-md-9">
                <form action="{{ route('system.admin.blog.update-image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ html()->hidden('id')->class('form-control')->value($post->id) }}
                    {{ html()->hidden('what')->class('form-control')->value($what) }}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Odaberite fotografiju'))->for('file')->class('bold') }}
                                <input name="file" class="form-control form-control-sm mt-3" id="file" type="file">
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

            @include('admin.app.other.blog.snippets.right-menu')
        </div>
    </div>
@endsection
