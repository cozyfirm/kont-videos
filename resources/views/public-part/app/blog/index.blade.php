@extends('public-part.layout.layout')

@section('public-content')
    <div class="blog__wrapper">
        <div class="blog__inner_w">
            <div class="blog__content">
                <div class="blog__data">
                    <div class="posts__wrapper" category="{{ $category }}">
                        @foreach($posts as $post)
                            <div class="single_new single__post" post-id="{{ $post->id }}">
                                <div class="image__wrapper">
                                    <img src="{{ asset($post->smallImgRel->getFile()) }}" alt="">
                                </div>
                                <div class="text__wrapper">
                                    <div class="text__content">
                                        <h2> {{ $post->title ?? '' }} </h2>
                                        <p> {{ $post->short_desc ?? '' }} </p>
                                    </div>

                                    <div class="hashtags">
                                        @foreach($post->getAllTags() as $tag)
                                            <div class="hashtag">
                                                {{ $tag->tag ?? '' }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <a href="{{ route('public.blog.preview', ['slug' => $post->slug ]) }}"> </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="load__more_wrapper">
                        <div class="load_more_btn blog__load_more"> <p>{{ __('UČITAJ JOŠ') }}</p> </div>
                    </div>
                </div>
                @include('public-part.app.blog.includes.categories')
            </div>
        </div>
    </div>
@endsection
