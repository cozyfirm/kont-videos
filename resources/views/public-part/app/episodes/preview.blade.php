@extends('public-part.layout.layout')

@section('public-content')
    <section class="videoplayer">
        <div class="cotent">
            <div class="videocontainer">
                <div class="videodiv" id="videoID">
                    <video loop muted preload controls src=" {{ asset('img/hero/single.mp4')}}"></video>
                    <div class="marker off" id="marker">
                        <i class="fi fi-rr-arrow-small-left"></i>
                        <p>Sadržaj</p>
                    </div>
                </div>
            </div>



            <div class="sidebar" id="sidebar">
                <div class="sidbar-el">


                    <div class="title-bar" id="close-sidbar"><i class="fi fi-rs-circle-xmark"></i></div>

                    <button class="course-accordion">Dio 1: Kako moda i zašto?</button>
                    <!-- This div holds the content to be displayed-->
                    <div class="course-panel">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt aspernatur animi sit repellat
                            accusamus
                        </p>
                        <div class="action">
                            <button class="btn-primary">Play</button>
                        </div>
                    </div>
                    <button class="course-accordion">Dio 2: Moje kolekcije</button>
                    <!-- This div holds the content to be displayed-->
                    <div class="course-panel">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt aspernatur animi sit repellat
                            accusamus
                        </p>
                        <div class="action">
                            <button class="btn-primary">Play</button>
                        </div>
                    </div>
                    <button class="course-accordion">Dio 3: Kuda dalje</button>
                    <!-- This div holds the content to be displayed-->
                    <div class="course-panel">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt aspernatur animi sit repellat
                            accusamus
                        </p>
                        <div class="action">
                            <button class="btn-primary">Play</button>
                        </div>
                    </div>
                    <button class="course-accordion">Dio 4: Zaključak</button>
                    <!-- This div holds the content to be displayed-->
                    <div class="course-panel">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt aspernatur animi sit repellat
                            accusamus
                        </p>
                        <div class="action">
                            <button class="btn-primary">Play</button>
                        </div>
                    </div>
                    <div class="sidbar-el">
                        <!-- <div class="chapter"></div>
                    <div class="chapter-title"></div>
                    <div class="progressbar"></div> -->

                    </div>
                </div>
                <div class="actions">
                    <form action="#" method="get">
                        <button class="btn-secondary"><i class="fi fi-rs-clipboard-list-check"></i>Više o temi</button>
                    </form>
                    <form action="#" method="get">
                        <button class="btn-secondary"><i class="fi fi-rs-chalkboard-user"></i>O predavaču</button>
                    </form>
                </div>

            </div>
        </div>

    </section>

    <section class="interactions">
        <div class="interactionheader">

            <button class="btn-secondary tablinks" id="btn-1" data-tab-id="panel-1">O predavaču</button>
            <button class=" btn-secondary tablinks" id="btn-2" data-tab-id="panel-2">O temi</button>
            <button class="btn-secondary tablinks" id="btn-3" data-tab-id="panel-3">Zabilješke</button>
            <button class="btn-secondary tablinks" id="btn-4" data-tab-id="panel-4">Obavijesti</button>
            <button class="btn-secondary tablinks" id="btn-5" data-tab-id="panel-5">Ostale epizode</button>


        </div>
        <div class="tabcontent" id="panel-1">
            <div class="o-predavacu">
                <div class="content-left">
                    <img src="{{ asset('img/hero/Kaftan.jpg') }}" alt="">
                    <h2>Emina Hodžić Adilović</h2>
                </div>
                <div class="content-right">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo dolor sequi odit pariatur
                        temporibus,
                        odio rerum harum deserunt unde laudantium, molestias dolorem necessitatibus ad. Accusantium vitae et
                        molestiae molestias neque, voluptatem magnam!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod quo, autem quae, ipsum incidunt minus
                        praesentium magnam facere veritatis neque provident nulla. Similique, optio itaque. Ullam porro,
                        beatae
                        ut esse, fuga aliquam, maiores velit laboriosam libero sit culpa consequuntur corrupti incidunt
                        illum
                        voluptas ipsum itaque neque quia a earum consequatur atque aspernatur quisquam harum? Ab blanditiis
                        a
                        nemo enim eum labore quis ex dolorem.</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo dolor sequi odit pariatur
                        temporibus,
                        odio rerum harum deserunt unde laudantium, molestias dolorem necessitatibus ad. Accusantium vitae et
                        molestiae molestias neque, voluptatem magnam!</p>


                </div>
            </div>
        </div>
        <div class="o-temi tabcontent" id="panel-2">
            <div class="o-temi">
                <div class="content-left">
                    <img src="{{ asset('img/hero/Kaftan01.JPG') }}" alt="">
                    <h2>Modao kao društveni odgovor u vrijeme pandemije</h2>
                </div>
                <div class="content-right">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo dolor sequi odit pariatur
                        temporibus,
                        odio rerum harum deserunt unde laudantium, molestias dolorem necessitatibus ad. Accusantium vitae et
                        molestiae molestias neque, voluptatem magnam!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod quo, autem quae, ipsum incidunt minus
                        praesentium magnam facere veritatis neque provident nulla. Similique, optio itaque. Ullam porro,
                        beatae
                        ut esse, fuga aliquam, maiores velit laboriosam libero sit culpa consequuntur corrupti incidunt
                        illum
                        voluptas ipsum itaque neque quia a earum consequatur atque aspernatur quisquam harum? Ab blanditiis
                        a
                        nemo enim eum labore quis ex dolorem.</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo dolor sequi odit pariatur
                        temporibus,
                        odio rerum harum deserunt unde laudantium, molestias dolorem necessitatibus ad. Accusantium vitae et
                        molestiae molestias neque, voluptatem magnam!</p>


                </div>
            </div>
        </div>
        <div class="zabiljeske tabcontent" id="panel-3">

            @include('public-part.app.shared.wyswyg')

        </div>
        <div class="obavijesti tabcontent" id="panel-4">
            <div class="obavijesti">
                <div class="el">
                    <img src="{{ asset('img/hero/Kaftan01.JPG') }}" alt="">
                    <h2>Naslov</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt non vitae exercitationem omnis
                        quisquam, rem dolor?</p>
                    <a href="#"></a>
                </div>
                <div class="el">
                    <img src="{{ asset('img/hero/Kaftan01.JPG') }}" alt="">
                    <h2>Naslov</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt non vitae exercitationem omnis
                        quisquam, rem dolor?</p>
                    <a href="#"></a>
                </div>
                <div class="el">
                    <img src="{{ asset('img/hero/Kaftan01.JPG') }}" alt="">
                    <h2>Naslov</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt non vitae exercitationem omnis
                        quisquam, rem dolor?</p>
                    <a href="#"></a>
                </div>
            </div>

        </div>
        <div class="ostale-epizode tabcontent" id="panel-5">
            @include('public-part.app.episodes.includes.new-episodes')
        </div>
    </section>
@endsection
