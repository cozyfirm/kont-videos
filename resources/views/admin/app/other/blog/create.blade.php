@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-blog"></i> @endsection
@section('c-title') @isset($create) {{ __('Novi post') }} @else {{ $post->title }} @endisset @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.admin.blog') }}">{{ __('Blog') }}</a>
    @isset($create)
        / <a href="#">{{ __('Novi post') }}</a>
    @else
        / <a href="#">{{ $post->title }}</a>
    @endisset
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
        <a href="{{ route('system.admin.blog.delete', ['id' => $post->id ]) }}">
            <button class="pm-btn btn pm-btn-trash">
                <i class="fas fa-trash"></i>
            </button>
        </a>
    @endif
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="@isset($preview) col-md-9 @else col-md-12 @endisset">
                <form action="@if(isset($edit)) {{ route('system.admin.blog.update') }} @else {{ route('system.admin.blog.save') }} @endif" method="POST" id="js-form">
                    @if(isset($edit))
                        {{ html()->hidden('id')->class('form-control')->value($post->id) }}
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Naslov'))->for('title')->class('bold') }}
                                {{ html()->text('title', $post->title ?? '' )->class('form-control form-control-sm')->required()->value((isset($post) ? $post->title : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Kategorija'))->for('category')->class('bold') }}
                                {{ html()->select('category', $categories, isset($post) ? $post->category : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('YouTube video'))->for('video')->class('bold') }}
                                {{ html()->text('video', $post->video ?? '' )->class('form-control form-control-sm')->required()->value((isset($post) ? $post->video : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Da li je post objavljen?'))->for('published')->class('bold') }}
                                {{ html()->select('published', ['0' => 'Ne', '1' => 'Da'], isset($post) ? $post->published : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Kratki opis'))->for('short_desc')->class('bold') }}
                                {{ html()->text('short_desc', $post->short_desc ?? '' )->class('form-control form-control-sm')->required()->value((isset($post) ? $post->short_desc : ''))->isReadonly(isset($preview))->maxlength('250') }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Detaljan opis'))->for('description')->class('bold') }}
                                {{ html()->textarea('description')->class('form-control form-control-sm mt-2 textarea-240 summernote')->value(isset($post) ? $post->description : '')->isReadonly(isset($preview)) }}
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
            @isset($preview)
                @include('admin.app.other.blog.snippets.right-menu')
            @endisset
        </div>
    </div>
@endsection
