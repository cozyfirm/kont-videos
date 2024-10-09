<section class="episodes">
    <div class="inner__wrapper">
        @for($i=0; $i<6; $i++)
            <div class="single__episode">
                <img src="{{ asset('files/images/episodes/Kaftan.jpg') }}" class="episode-img">
                <video loop muted preload src=" {{ asset('files/images/episodes/novi.mp4')}}"></video>

                <div class="card__content">
                    <h1>Kaftan moda</h1>
                    <p>Sanja Delić</p>
                    <div class="card-btns">
                        <button type="submit" class="btn-primary modaloppener"><i class="fi fi-bs-play-circle"></i>Trailer</button>
                        <form action="#" method="get">
                            <button class="btn-primary"><i class="fi fi-bs-play-circle"></i>Video</button>
                        </form>
                    </div>
                </div>
            </div>
        @endfor

        <div class="all__episodes">
            <button class="btn-secondary">
                {{ __('Sve epizode') }}
                <i class="fi fi-br-arrow-small-right"></i>
            </button>
        </div>
    </div>
</section>
