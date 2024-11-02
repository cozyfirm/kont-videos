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
                    <li><a href="{{ route('public.presenters') }}">{{ __('Predavači') }}</a></li>
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
                    <button class="btn-secondary leave-review">
                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                            <path fill="#FFFFFF" d="m8,12c3.309,0,6-2.691,6-6S11.309,0,8,0,2,2.691,2,6s2.691,6,6,6Zm0-10c2.206,0,4,1.794,4,4s-1.794,4-4,4-4-1.794-4-4,1.794-4,4-4Zm-3,12h5v2h-5c-1.654,0-3,1.346-3,3v5H0v-5c0-2.757,2.243-5,5-5Zm19,3l-3.054,2.083,1.271,3.982-.818.571-3.382-2.338-3.331,2.338-.787-.593,1.181-4.022-3.079-2.016v-1.006h4.2l1.285-4.363h1.059l1.283,4.363h4.174v1Z"/>
                        </svg>

                        <p class="leave-review-content">@if($episode->hasReview()) {{ __('Uredite ocjenu') }} @else {{ __('Ostavite ocjenu') }} @endif</p>
                    </button>
                @else
                    @if(Auth()->user()->hasActivity())
                        <a href="{{ route('public.my-profile.progress') }}">
                            <button class="btn-secondary"> <i class="fi fi-br-video-duration"></i> {{ __('Moj progres') }}</button>
                        </a>
                    @endif
                @endisset
                <a href="{{ route('public.my-profile') }}" title="{{ __('Moj profil') }}">
                    <button class="btn-primary">{{ Auth()->user()->name }}</button>
                </a>
                <a href="{{ route('auth.logout') }}" title="{{ __('Odjavi se') }}">
                    <button class="btn-primary btn-tertiary-color"><i class="fi fi-bs-sign-out-alt"></i></button>
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
                <li><a href="{{ route('public.presenters') }}">{{ __('Predavači') }}</a></li>
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
