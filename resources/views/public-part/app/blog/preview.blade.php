@extends('public-part.layout.layout')

<!-- Meta tags -->
@section('title'){{ $post->title }}@endsection
@section('meta_uri'){{ route('public.blog.preview', ['slug' => $post->slug ]) }}@endsection
@section('meta_title'){{ $post->title }}@endsection
@section('meta_desc'){{ $post->short_desc }}@endsection
@isset($post->mainImgRel) @section('meta_img'){{ asset($post->mainImgRel->getFile()) }}@endsection @endisset

@section('public-content')
    <!-- Preview image -->
    @include('public-part.app.blog.includes.preview-image')

    <div class="blog__wrapper">
        <div class="blog__inner_w">
            <div class="blog__content">
                <div class="blog__data">
                    <div class="blog__post">
                        <!-- Cover image -->
                        @isset($post->mainImgRel)
                            <div class="cover__image">
                                <img src="{{ asset($post->mainImgRel->getFile()) }}" alt="">
                            </div>
                        @endisset

                        <div class="content__wrapper">
                            {!! nl2br($post->description ?? '') !!}
                        </div>

                        @if(isset($post->video) and !empty($post->video))
                            <div class="blog__video">
                                <iframe class="blog__video_iframe" src="{{ $post->video }}" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
                            </div>
                        @endif

                        <div class="tags-wrapper">
                            @foreach($postTags as $tag)
                                <div class="tag">
                                    <a href="{{ route('public-part.blog.tag', ['tag' => str_replace('#', '', $tag->tag ?? '')]) }}">{{ $tag->tag ?? '' }}</a>
                                </div>
                            @endforeach
                        </div>

                        @isset($post->imageRel)
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
                        @endisset
                    </div>
                </div>
                @include('public-part.app.blog.includes.categories')
            </div>
        </div>
    </div>

@endsection
