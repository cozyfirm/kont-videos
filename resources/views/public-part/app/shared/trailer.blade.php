<div class="trailer__wrapper">
    <div class="inner__wrapper">
        <div class="pp__video__wrapper">
            <div class="iframe__header">
                <div class="ih__text">
                    <h5 id="pp__presenter">Ivana Koraljić</h5>
                    <h1 id="pp__trailer_title">ZAROBLJENA DRŽAva</h1>
                </div>
                <div class="ih_exit">
                    <div class="ih__exit__btn">
                        <img src="{{ asset('files/images/default/icons/cross-small-white.svg') }}" alt="">
                    </div>
                </div>
            </div>
            <!-- ?autoplay=false&loop=false&muted=false&preload=true&responsive=true --> https://iframe.mediadelivery.net/embed/61480/0e947078-2670-44b3-a90f-5b7735fe0a88
            <iframe id="pp__iframe" src="" loading="lazy" allow="accelerometer;gyroscope;encrypted-media;picture-in-picture;"></iframe>
        </div>
        <div class="pp__video__info">
            <div class="text__elem">
                <p id="pp__no_chapters">4 cjeline</p>
            </div>
            <div class="text__elem">
                <p id="pp__duration">Trajanje: 52 min</p>
            </div>
            <div class="stars">
                @include('public-part.app.shared.common.stars', ['stars' => 4 ])
            </div>
        </div>

        <div class="pp__more_info">
            <h1>Kaftan Studio</h1>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, ipsum mollitia. Temporibus suscipit quam ea non aut, ad rerum perspiciatis earum dolores pariatur quisquam magnam repudiandae dolorum dignissimos, minus incidunt.
            </p>
        </div>

        <div class="pp__chapters">
            @for($i=0; $i<5; $i++)
                <div class="single__chapter">
                    <div class="no__part">
                        <h1>{{ $i+1 }}</h1>
                    </div>
                    <div class="img__part">
                        <img src="https://vz-49b3acb4-335.b-cdn.net/0e947078-2670-44b3-a90f-5b7735fe0a88/thumbnail_72d7d7d8.jpg" alt="">
                    </div>
                    <div class="text__part">
                        <div class="text__part__header">
                            <h4>Chapter One</h4>
                            <p>12min</p>
                        </div>
                        <div class="text__part__body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere quaerat doloremque repellat iure obcaecati, amet dicta.</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
