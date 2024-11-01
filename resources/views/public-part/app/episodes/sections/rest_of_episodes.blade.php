<div class="inner__element rest_of_episodes ">
    @for($i=0; $i<4; $i++)
        <div class="single__episode">
            <img src="{{ asset('files/images/episodes/Kaftan.jpg') }}" class="episode-img">
            <video loop muted preload src=" {{ asset('files/images/episodes/novi.mp4')}}"></video>

            <div class="card__content">
                <h1>Kaftan moda</h1>
                <p>Sanja Delić</p>
                <div class="card-btns">
                    <form action="#" method="get">
                        <button class="btn-primary"><i class="fi fi-bs-play-circle"></i>Video</button>
                    </form>
                </div>
            </div>
        </div>
    @endfor
</div>
