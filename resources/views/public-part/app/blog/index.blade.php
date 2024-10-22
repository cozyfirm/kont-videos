@extends('public-part.layout.layout')

@section('public-content')
    <div class="blog__wrapper">
        <div class="blog__inner_w">
            @for($i=0; $i<7; $i++)
                <div class="single_new">
                    <div class="image__wrapper">
                        <img src="{{ asset('files/images/public-part/blog/6ddf8fb6d2326e2914e8a1001efec2d8.jpg') }}" alt="">
                    </div>
                    <div class="text__wrapper">
                        <div class="text__content">
                            <h2>
                                Hello there
                                @if($i%2 == 0)
                                    , are you fine?
                                @endif
                            </h2>
                            <p>
                                If we use object-fit: contain; the image keeps its aspect ratio, but is resized to fit within the given dimension:
                                @if($i%2 == 0)
                                    If we use object-fit: contain; the image keeps its aspect ratio, but is resized to fit within the given dimension:
                                @endif
                            </p>
                        </div>

                        <div class="hashtags">
                            <div class="hashtag"> INTERVIEW </div>
                            <div class="hashtag"> LONGREAD </div>
                        </div>
                    </div>

                    <a href="{{ route('public.blog.preview') }}"> </a>
                </div>
            @endfor

            <div class="load__more_wrapper">
                <div class="load_more_btn blog__load_more"> <p>{{ __('UČITAJ JOŠ') }}</p> </div>
            </div>
        </div>
    </div>
@endsection
