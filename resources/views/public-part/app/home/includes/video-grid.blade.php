<section class="home-one" id="trailer-overlay">
    <div class="container-home-one" id="demo-modal">
        <div class="cards-container">
            <div class="cardHomeOne" id="trailer-overlay">
                <img src="{{ asset('files/images/episodes/Kaftan.jpg') }}" class="card-img">
                <video loop muted preload src=" {{ asset('files/images/episodes/novi.mp4')}}"></video>
                <div class="cardContent">
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
            <div class="cardHomeOne">
                <img src="{{ asset('files/images/episodes/RoberBaric01.JPG') }}" class="card-img">
                <video loop muted preload src=" {{ asset('files/images/episodes/novi.mp4')}}"></video>
                <div class="cardContent">
                    <h1>Asimetrično Ratovanje</h1>
                    <p>Robert Barić</p>
                    <div class="card-btns">
                        <button type="submit" class="btn-primary modaloppener"><i class="fi fi-bs-play-circle"></i>Trailer</button>
                        <form action="#" method="get">
                            <button class="btn-primary"><i class="fi fi-bs-play-circle"></i>Video</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="cardHomeOne">
                <img src="{{ asset('files/images/episodes/Leibach.jpg') }}" class="card-img">
                <video loop muted preload src=" {{ asset('files/images/episodes/novi.mp4')}}"></video>
                <div class="cardContent">
                    <h1>Umjetnost i totalitarizmi</h1>
                    <p>Ivan Novak - Leibach</p>
                    <div class="card-btns">
                        <button type="submit" class="btn-primary modaloppener"><i class="fi fi-bs-play-circle"></i>Trailer</button>
                        <form action="#" method="get">
                            <button class="btn-primary"><i class="fi fi-bs-play-circle"></i>Video</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="cardHomeOne">
                <img src="{{ asset('files/images/episodes/TamaraSkroza.JPG') }}" class="card-img">
                <video loop muted preload src=" {{ asset('files/images/episodes/novi.mp4')}}"></video>
                <div class="cardContent">
                    <h1>Novinarska etika</h1>
                    <p>Tamara Skroza</p>
                    <div class="card-btns">
                        <button type="submit" class="btn-primary modaloppener"><i class="fi fi-bs-play-circle"></i>Trailer</button>
                        <form action="#" method="get">
                            <button class="btn-primary"><i class="fi fi-bs-play-circle"></i>Video</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="cardHomeOne">
                <img src="{{ asset('files/images/episodes/Una Gunjak.jpeg') }}" class="card-img">
                <video loop muted preload src=" {{ asset('files/images/episodes/novi.mp4')}}"></video>
                <div class="cardContent">
                    <h1>Umjetnost filmske režije</h1>
                    <p>Una Gunjak</p>
                    <div class="card-btns">
                        <button type="submit" class="btn-primary modaloppener"><i class="fi fi-bs-play-circle"></i>Trailer</button>
                        <form action="#" method="get">
                            <button class="btn-primary"><i class="fi fi-bs-play-circle"></i>Video</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="cardHomeOne">
                <img src="{{ asset('files/images/episodes/IvanaKorajlic03.JPG') }}" class="card-img">
                <video loop muted preload src=" {{ asset('files/images/episodes/novi.mp4')}}"></video>
                <div class="cardContent">
                    <h1>Zarobljena država</h1>
                    <p>Ivana Korajlić</p>
                    <div class="card-btns">
                        <button type="submit" class="btn-primary modaloppener"><i class="fi fi-bs-play-circle"></i>Trailer</button>
                        <form action="#" method="get">
                            <button class="btn-primary"><i class="fi fi-bs-play-circle"></i>Video</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="more-episodes">
            <button class="btn-secondary">Sve epizode<i class="fi fi-br-arrow-small-right"></i></button>
        </div>
    </div>

    <div class="wraper" id="open-modal">
        <div class="content-container">
            <div class="wraper-body">
                <video loop muted preload controls poster="{{ asset('files/images/episodes/Kaftan.jpg') }}"
                       src=" {{ asset('files/images/episodes/novi.mp4')}}"></video>
                <div class="contentoverlay">
                    <div class="title">
                        <p>Ivana Korajlić</p>
                        <H1>Zarobljena državaaa</H1>
                    </div>
                    <div class="modal-close" id="modal_close"><span><i class="fi fi-br-circle-xmark"></i></span></div>
                </div>
            </div>
            <div class="wraper-footer">
                <div class="header-info">
                    <span>4 cjeline</span>
                    <span>Trajanje: 52 min</span>
                    <div class="stars">
                        <i class="fi fi-br-star"></i>
                        <i class="fi fi-br-star"></i>
                        <i class="fi fi-br-star"></i>
                        <i class="fi fi-br-star"></i>
                        <i class="fi fi-br-star"></i>
                    </div>
                </div>
                <div class="description">
                    <h1>Kaftan Studio</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt, ipsum mollitia. Temporibus
                        suscipit quam ea non aut, ad rerum perspiciatis earum dolores pariatur quisquam magnam
                        repudiandae dolorum dignissimos, minus incidunt.</p>
                </div>
                <div class="chapter-list">
                    <div class="chapter-el">
                        <div class="no">
                            <h1>1</h1>
                        </div>
                        <div class="slika">
                            <img src="{{ asset('files/images/episodes/Kaftan.jpg') }}" alt="">
                        </div>
                        <div class="body">
                            <div class="info">
                                <h2>Chapter 1</h2>
                                <p>12 min</p>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere quaerat doloremque
                                repellat iure obcaecati, amet dicta.</p>
                        </div>
                    </div>
                    <div class="chapter-el">
                        <div class="no">
                            <h1>2</h1>
                        </div>
                        <div class="slika">
                            <img src="{{ asset('files/images/episodes/Kaftan.jpg') }}" alt="">
                        </div>
                        <div class="body">
                            <div class="info">
                                <h2>Chapter 2</h2>
                                <p>12 min</p>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere quaerat doloremque
                                repellat iure obcaecati, amet dicta.</p>
                        </div>
                    </div>
                    <div class="chapter-el">
                        <div class="no">
                            <h1>3</h1>
                        </div>
                        <div class="slika">
                            <img src="{{ asset('files/images/episodes/Kaftan.jpg') }}" alt="">
                        </div>
                        <div class="body">
                            <div class="info">
                                <h2>Chapter 3</h2>
                                <p>12 min</p>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere quaerat doloremque
                                repellat iure obcaecati, amet dicta.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
