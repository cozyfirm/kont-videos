<section class="news">
    <div class="inner__wrapper">
        <div class="inner__header">
            <h1>{{ __('Vijesti') }}</h1>
        </div>

        <div class="news__wrapper">
            <div class="posts__wrapper margin_bottom_none">
                @foreach($posts as $post)
                    <div class="single_new single__white" post-id="{{ $post->id }}">
                        <div class="image__wrapper">
                            <img src="{{ asset($post->smallImgRel->getFile()) }}" alt="">
                        </div>
                        <div class="text__wrapper">
                            <div class="text__content">
                                <h2> {{ $post->title ?? '' }} </h2>
                                <p> {{ $post->short_desc ?? '' }} </p>
                            </div>

                            <div class="hashtags">
                                <div class="hashtag"> INTERVIEW </div>
                                <div class="hashtag"> LONGREAD </div>
                            </div>
                        </div>

                        <a href="{{ route('public.blog.preview', ['slug' => $post->slug ]) }}"> </a>
                    </div>
                @endforeach
            </div>

{{--            @foreach($posts as $post)--}}
{{--                <div class="single__new">--}}
{{--                    <div class="new__header">--}}
{{--                        <img src="{{ asset($post->smallImgRel->getFile()) }}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="content">--}}
{{--                        <div class="body">--}}
{{--                            <h2> {{ $post->title ?? '' }} </h2>--}}
{{--                            <p> {{ $post->short_desc ?? '' }} </p>--}}
{{--                        </div>--}}
{{--                        <div class="footer"><span class="mark">intreview</span><span class="mark">longread</span></div>--}}
{{--                    </div>--}}
{{--                    <a href="{{ route('public.blog.preview', ['slug' => $post->slug ]) }}"> </a>--}}
{{--                </div>--}}
{{--            @endforeach--}}
        </div>
    </div>
</section>
