<section class="news">
    <div class="inner__wrapper">
        <div class="inner__header">
            <h1>{{ __('Vijesti') }}</h1>
        </div>

        <div class="news__wrapper">
            @for($i=0; $i<4; $i++)
                <div class="single__new">
                    <div class="new__header">
                        @if($i== 2)
                            <img src="{{ asset('files/images/episodes/IvanaKorajlic03.jpg') }}" alt="">
                        @else
                            <img src="{{ asset('files/images/episodes/Kaftan.jpg') }}" alt="">
                        @endif
                    </div>
                    <div class="content">
                        <div class="body">
                            <h2>Lorem ipsum dolor sit!! </h2>
                            @if($i== 2)
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium dolores inventore magni
                                    iure. Magni deserunt sapiente possimus expedita officia soluta maxime officiis pariatur,
                                    porro
                                    nam aliquam atque rerum esse consequatur!
                                </p>
                            @else
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ea inventore dicta dolore
                                    temporibus nostrum iure nesciunt corrupti aspernatur aliquid.
                                </p>
                            @endif
                        </div>
                        <div class="footer"><span class="mark">intreview</span><span class="mark">longread</span></div>
                    </div>
                    <a href="#"></a>
                </div>
            @endfor
        </div>
    </div>
</section>
