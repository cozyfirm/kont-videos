<div class="container-menu" id="container-menu">
    <div class="menu">
        <div class="logo">
            <a href="{{ route('public.home') }}" class="Logo"><img src="{{ asset('files/images/logo.svg') }}"></a>
        </div>
        <div class="list">
            <ul>
                @isset($previewEpisode)
                    <li class="episode-title">
                        <a href="{{ route('public.episodes') }}" title="{{ __('Epizoda') }}">{{ $episode->title ?? '' }}</a>
                        <i class="fi fi-br-angle-small-right"></i>
                        <a class="menu-video-title" title="{{ __('Video') }}">{{ $video->title ?? '' }}</a>
                    </li>
                @else
                    <li><a href="{{ route('public.episodes') }}">{{ __('Epizode') }}</a></li>
                    <li><a href="#">Predavači</a></li>
                    {{--                <li><a href="#">Teme</a></li>--}}
                    <li><a href="{{ route('public.blog') }}">{{ __('Teme') }}</a></li>
                    <li><a href="#">O nama</a></li>
                    <li><a href="{{ route('public.contact') }}">{{ __('Kontakt') }}</a></li>
                @endisset
            </ul>
        </div>
        <div class="action-btn">
            @if(Auth()->check())
                @isset($previewEpisode)
                    <a href="{{ route('public.my-profile.progress') }}">
                        <button target class="btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                                <path fill="#FFFFFF" d="M19.467,23.316,12,17.828,4.533,23.316,7.4,14.453-.063,9H9.151L12,.122,14.849,9h9.213L16.6,14.453Z"/>
                            </svg>
                            <p>{{ __('Ostavite ocjenu') }}</p>
                        </button>
                    </a>
                @else
                    <a href="{{ route('public.my-profile.progress') }}">
                        <button target class="btn-secondary"> <i class="fi fi-br-video-duration"></i> {{ __('Moj progres') }}</button>
                    </a>
                @endisset
                <a href="{{ route('public.my-profile') }}" title="{{ __('Moj profil') }}">
                    <button class="btn-primary">{{ Auth()->user()->name }}</button>
                </a>
                <a href="{{ route('auth.logout') }}" title="{{ __('Odjavi se') }}">
                    <button target class="btn-primary btn-tertiary-color"><i class="fi fi-bs-sign-out-alt"></i></button>
                </a>
            @else
                <a href="{{ route('auth') }}">
                    <button target class="btn-secondary"><i class="fi fi-bs-sign-in-alt"></i>{{ __('Prijavi se') }}</button>
                </a>
                <a href="{{ route('auth.create-account') }}">
                    <button class="btn-primary">{{ __('Registruj se') }}</button>
                </a>
            @endif
        </div>

        <div class="toggle" id="toggle">
            <div class="one"></div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
    </div>
    <div class="mobile-menu" id="mobile-menu">
        <div class="list">
            <ul>
                <li><a href="{{ route('public.episodes') }}">{{ __('Epizode') }}</a></li>
                <li><a href="#">Predavači</a></li>
{{--                <li><a href="#">Teme</a></li>--}}
                <li><a href="#">{{ __('Teme') }}</a></li>
                <li><a href="#">O nama</a></li>
                <li><a href="{{ route('public.contact') }}">{{ __('Kontakt') }}</a></li>
            </ul>
        </div>
        <div class="action-btn">
            @if(Auth()->check())
                <a href="{{ route('auth') }}">
                    <button target class="btn-secondary"><i class="fi fi-bs-sign-in-alt"></i>{{ __('Odjavi se') }}</button>
                </a>
                <a href="{{ route('auth.create-account') }}">
                    <button class="btn-primary">{{ Auth()->user()->name }}</button>
                </a>
            @else
                <a href="{{ route('auth') }}">
                    <button target class="btn-secondary"><i class="fi fi-bs-sign-in-alt"></i>Log in</button>
                </a>
                <a href="{{ route('auth.create-account') }}">
                    <button class="btn-primary">{{ __('Registruj se') }}</button>
                </a>
            @endif
        </div>
    </div>
</div>
