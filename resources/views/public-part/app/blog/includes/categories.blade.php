<div class="blog__categories">
    <h5>{{ __('KATEGORIJE') }}</h5>

    <!-- Categories values -->

    @foreach($categories as $category)
        <a href="{{route('public.blog.with-categories', ['id' => $category->id])}}">
            <div class="category-row">
                <div class="text-part">
                    <p> {{ $category->name ?? '' }} </p>
                </div>
                <div class="number-of-it"> {{ isset($category->postsRel) ? $category->postsRel->count() : '' }} </div>
            </div>
        </a>
    @endforeach


    <div class="categories-break-line"></div>

    <h5> {{__('POPULARNO')}} </h5>

    <div class="recent-posts">
        @foreach($popular as $post)
            <a href="{{ route('public.blog.preview', ['slug' => $post->slug ]) }}">
                <div class="recent-post">
                    <div class="image-part">
                        <img src="{{ asset($post->smallImgRel->getFile()) }}" alt="">
                    </div>
                    <div class="text-part">
                        <h5> {{ $post->title ?? '' }} </h5>
                        <span> {{ $post->created_at->format('d.M.Y H:i') }} </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="categories-break-line"></div>

    <h5>{{ __('KLJUČNE RIJEČI') }}</h5>
    <div class="tags-wrapper">
        <div class="tag">
            <a href="#">TAGS</a>
        </div>
        <div class="tag">
            <a href="#">KONT</a>
        </div>
        <div class="tag">
            <a href="#">VIDEO</a>
        </div>

{{--        @foreach($popularTags as $tag)--}}
{{--            <div class="tag">--}}
{{--                <a href="{{ route('public-part.blog.tag', ['tag' => str_replace('#', '', $tag->tag ?? '')]) }}">{{ $tag->tag ?? '' }}</a>--}}
{{--            </div>--}}
{{--        @endforeach--}}
    </div>
</div>
