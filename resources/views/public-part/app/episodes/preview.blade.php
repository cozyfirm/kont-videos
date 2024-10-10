@extends('public-part.layout.layout')

@section('public-content')
    <div class="video__player">
        <div class="player__wrapper">

        </div>
        <div class="episodes__wrapper">
            <div class="ew__header">
                <h3>{{ __('Kaftan studio') }}</h3>
                <i class="fas fa-times toggle-player"></i>
            </div>
            <div class="ew__body">
                @for($i=0; $i<6; $i++)
                    <div class="se__wrapper">
                        <div class="se__w__no">
                            <div class="checkbox_w @if($i%2 == 0) checked @endif">
                                <img src="{{ asset('files/images/default/icons/check.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="se__w__data">
                            <div class="header__">
                                <p> {{ $i + 1 }}. Check our first KONT video </p>
                                <img class="toggle_short_description" src="{{ asset('files/images/default/icons/arrow_down_b.svg') }}" alt="">
                            </div>
                            <div class="short__description">
                                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book </p>
                            </div>
                            <div class="rest__of_data">
                                <div class="duration_w">
                                    <img src="{{ asset('files/images/default/icons/video.svg') }}" alt="">
                                    <span>12 min</span>
                                </div>
                                <div class="play_w">
                                    <span>Play</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="ew__footer">
                <button class="btn-secondary">
                    <img src="{{ asset('files/images/default/icons/topic.svg') }}" alt="">
                    {{ __('Više o temi') }}
                </button>
                <button class="btn-secondary">
                    <img src="{{ asset('files/images/default/icons/presenter.svg') }}" alt="">
                    {{ __('O predavaču') }}
                </button>
            </div>
        </div>

        <div class="right_arrow toggle-player">
            <img src="{{ asset('files/images/default/icons/arrow_left.svg') }}" alt="">
            <p>{{ __('Pregled sadržaja') }}</p>
        </div>
    </div>

    <div class="other__specs">
        <div class="inner__w">
            <div class="inner__header">
                <div class="inner__tab" ref-tag="overview__wrapper">
                    <p> {{ __('Više informacija') }} </p>
                </div>
{{--                <div class="inner__tab">--}}
{{--                    <p> {{ __('O temi') }} </p>--}}
{{--                </div>--}}
                <div class="inner__tab" ref-tag="presenter">
                    <p> {{ __('O predavaču') }} </p>
                </div>
                <div class="inner__tab" ref-tag="overview__wrapper">
                    <p> {{ __('Zabilješke') }} </p>
                </div>
                <div class="inner__tab" ref-tag="overview__wrapper">
                    <p> {{ __('Recenzije') }} </p>
                </div>
                <div class="inner__tab active" ref-tag="rest_of_episodes">
                    <p> {{ __('Ostale epizode') }} </p>
                </div>
            </div>

            <div class="inner__body">
                <div class="inner__element overview__wrapper">
                    <h1> Kaftan studio </h1>
                    <div class="numbers__w">
                        <div class="number">
                            <div class="number__header">
                                <h4> 4.2 </h4>
                                <img src="{{ asset('files/images/default/icons/green_star.svg') }}" alt="">
                            </div>
                            <p> 156 recenzija </p>
                        </div>
                        <div class="number">
                            <div class="number__header">
                                <h4> 1789 </h4>
                            </div>
                            <p> {{ __('Pregleda') }} </p>
                        </div>
                        <div class="number">
                            <div class="number__header">
                                <h4> 1h i 30m </h4>
                            </div>
                            <p> {{ __('Ukupno') }} </p>
                        </div>
                    </div>

                    <div class="o-row">
                        <img src="{{ asset('files/images/default/icons/exclamation.svg') }}" alt="">
                        <p>{{ __('Zadnji put ažurirano') }} Maj 2024 {{ __('godine') }} </p>
                    </div>

                    <div class="o-row">
                        <img src="{{ asset('files/images/default/icons/globe.svg') }}" alt="">
                        <p>{{ __('Bosanski jezik') }} </p>
                    </div>

                    <div class="description">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                        <br>

                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                    </div>
                </div>

                <div class="inner__element presenter">
                    <div class="img__wrapper">
                        <img src="{{ asset('files/images/episodes/Kaftan.jpg') }}" class="episode-img">
                        <a href="#">
                            <h2> Emina Hodžić Adilović </h2>
                        </a>
                    </div>
                    <div class="text__wrapper">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo dolor sequi odit pariatur temporibus, odio rerum harum deserunt unde laudantium, molestias dolorem necessitatibus ad. Accusantium vitae et molestiae molestias neque, voluptatem magnam!
                            <br><br>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod quo, autem quae, ipsum incidunt minus praesentium magnam facere veritatis neque provident nulla. Similique, optio itaque. Ullam porro, beatae ut esse, fuga aliquam, maiores velit laboriosam libero sit culpa consequuntur corrupti incidunt illum voluptas ipsum itaque neque quia a earum consequatur atque aspernatur quisquam harum? Ab blanditiis a nemo enim eum labore quis ex dolorem.
                            <br><br>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo dolor sequi odit pariatur temporibus, odio rerum harum deserunt unde laudantium, molestias dolorem necessitatibus ad. Accusantium vitae et molestiae molestias neque, voluptatem magnam!
                        </p>
                    </div>
                </div>

                <div class="inner__element rest_of_episodes active">
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
            </div>
        </div>
    </div>
@endsection
