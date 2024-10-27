@extends('public-part.layout.layout')

@section('public-content')
    <div class="hero-video">
        <video autoplay loop muted preload src="{{ asset('files/videos/main-vdeo.mp4')}}"></video>

        <div class="hero-bunner">
            <div class="hero-bunner-content">
                <div class="hero-bunner-content-left">
                    <h1>KONT Masterclass Lectures</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat exercitationem expedita natus,
                        obcaecati debitis aliquid perspiciatis voluptate ut! Eos facere quidem cupiditate obcaecati,
                        suscipit ullam maiores voluptatem. Ipsa, alias minus.</p>
                    <div class="hero-bunner-left">
                        <div class="hero-action-btns">
                            <div class="textfield-outlined">
                                <input id="input-hero" type="text" placeholder=" ">
                                <label for="input-hero">Vaš e-mail</label>
                            </div>
                            <div class="padding-clas">
                                <form action="#" method="get">
                                    <button class="btn-tertiary">Registruj se</button>
                                </form>

                            </div>
                        </div>
                        <a href="#trailer-overlay"><span class="hero-link-span">Saznaj više &rarr;</a>
                    </div>
                </div>
                <div class="hero-bunner-right">
                    <div class="tablet green">Ekonomija</div>
                    <div class="tablet">Moda</div>
                    <div class="tablet">Film</div>
                    <div class="tablet">Muzika</div>
                    <div class="tablet">Subverzivna umjetnost</div>
                    <div class="tablet">Društvo</div>
                    <div class="tablet">Politika</div>
                    <div class="tablet">Mediji</div>
                    <div class="tablet">Etika u novinarstvu</div>
                    <div class="tablet">Mađunarodni odnosi</div>
                </div>
            </div>
        </div>
    </div>

    @include('public-part.app.shared.episodes')
    @include('public-part.app.shared.news')

    {{--    @include('public-part.app.home.includes.news')--}}

    @include('public-part.app.shared.accordion')

    @include('public-part.app.shared.contact')
@endsection
