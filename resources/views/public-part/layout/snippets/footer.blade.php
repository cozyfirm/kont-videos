<footer>
    <div class="wrapper-footer">
        <div class="footer-row">
            <div class="footer-element">
                <h2>{{ __('Uslovi korištenja') }}</h2>
                <ul>
                    <li>
                        <a href="https://fondacijaekipa.ba/">{{ __('Fondacija Ekipa') }}</a>
                        <a href="{{ route('public.page.impressum') }}">{{ __('Impessum') }}</a>
                        <a href="{{ route('public.page.terms') }}">{{ __('Pravila korištenja') }}</a>
                        <a href="{{ route('public.page.privacy') }}">{{ __('Politika privatnosti') }}</a>
                    </li>
                </ul>
            </div>
            <div class="footer-element">
                <h2>{{ __('Program') }}</h2>
                <ul>
                    <li>
                        <a href="{{ route('public.blog') }}">{{ __('Teme') }}</a>
                        <a href="{{ route('public.presenters') }}">{{ __('Predavači') }}</a>
                        <a href="{{ route('public.episodes') }}">{{ __('Epizode') }}</a>
                    </li>
                </ul>
            </div>
            <div class="footer-element">
                <h2>{{ __('Kontakt') }}</h2>
                <ul>
                    <li>
                        <a href="{{ route('public.page.about-us') }}">{{ __('O nama') }}</a>
                        <a href="{{ route('public.contact') }}">{{ __('Kontaktirajte nas') }}</a>
                        <a href="{{ route('auth') }}">{{ __('Prijavi se') }}</a>
                        <a href="{{ route('auth.create-account') }}">{{ __('Registruj se') }}</a>
                    </li>
                </ul>
            </div>
            <div class="footer-element branding-brit">
                <div class="brit-logo">
                    <img src="{{ asset('files/images/embassy.svg')}}" alt="">
                    <p> {{ __('KONT Masterclass predavanja finansirana su u sklopu projekta koji podržava Vlada Ujedinjenog Kraljevstva kroz UK International Development. Izneseni stavovi ne predstavljaju nužno službene politike Ujedinjenog Kraljevstva.') }} </p>
                </div>
            </div>
        </div>
        <div class="social">
            <a href="https://x.com/KONTMasterclass"><i class="fi fi-brands-twitter-alt-circle"></i></a>
            <a href="https://www.facebook.com/people/KONT-Masterclass/61569370957608/"> <i class="fi fi-brands-facebook"></i></a>
            <a href="https://www.instagram.com/kont.masterclass/?igsh=bjd1NGFjZGkzOGMw&utm_source=qr#"><i class="fi fi-brands-instagram"></i></a>
            <a href="https://www.tiktok.com/@kont.masterclass?_t=8rkRtVDhgJT&_r=1"><i class="fi fi-brands-tik-tok"> </i></a>
            <a href="https://www.youtube.com/@KONT_Masterclass/videos"><i class="fi fi-brands-youtube"></i></a>
        </div>
        <div class="copy">
            <p>
                {{ date('Y') }} - Crafted by <a href="https://fondacijaekipa.ba">{{ __('fondacijaekipa.ba') }}</a> & <a href="https://cozyfirm.com">{{ __('Cozy Firm') }}</a>
            </p>
        </div>
    </div>
</footer>
