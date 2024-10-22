@extends('public-part.layout.layout')

@section('public-content')
    <!-- Preview image -->
    @include('public-part.app.blog.includes.preview-image')
    <div class="blog__wrapper">
        <div class="blog__inner_w">
            <!-- Cover image -->
            @isset($post->mainImgRel)
                <div class="cover__image">
                    <img src="{{ asset($post->mainImgRel->getFile()) }}" alt="">
                </div>
            @endisset

            <div class="content__wrapper">
                {!! nl2br($post->description) !!}
            </div>

            <div class="single-blog__images">
                @foreach($post->imageRel as $image)
                    <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                    <div class="img__wrapper" attr-id="{{ $image->id }}">
                        <img src="{{ asset($image->fileRel->getFile()) }}">

                        <div class="gallery_shadow">
                            <div class="open_icon_w">
                                <i class="fas fa-expand"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
