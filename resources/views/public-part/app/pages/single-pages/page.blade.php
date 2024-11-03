@extends('public-part.layout.layout')

@section('public-content')
    <!-- Import episode trailer -->
    @include('public-part.app.shared.trailer')

    <div class="single_pages__wrapper">
        <div class="single__pages__inner">
            <div class="single__pages__content">
                <div class="single__pages__data">
                    @isset($page->fileRel)
                        <div class="spp__image__w">
                            <img src="{{ asset($page->fileRel->getFile()) }}" class="episode-img">
                        </div>
                    @endisset
                    <div class="spp__text">
                        {!! nl2br($page->description ?? '') !!}
                    </div>

                    @if(isset($page->yt_link) and !empty($page->yt_link))
                        <div class="page__video">
                            <iframe class="yt__iframe" src="{{ $page->yt_link }}" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
                        </div>
                    @endif
                </div>
                @include('public-part.app.blog.includes.categories')
            </div>
        </div>
    </div>
@endsection
