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
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum blanditiis, repudiandae consequatur fugiat tempora debitis placeat.
                    </p>
                </div>
            </div>
        </div>
        <div class="social">
            <a href="#"><i class="fi fi-brands-twitter-alt-circle"></i></a>
            <a href="#"> <i class="fi fi-brands-facebook"></i></a>
            <a href="#"><i class="fi fi-brands-instagram"></i></a>
            <a href="#"><i class="fi fi-brands-tik-tok"> </i></a>
            <a href="#"><i class="fi fi-brands-youtube"></i></a>
        </div>
        <div class="copy">
            <p>
                {{ date('Y') }} - Crafted by <a href="https://fondacijaekipa.ba">{{ __('fondacijaekipa.ba') }}</a> & <a href="https://cozyfirm.com">{{ __('Cozy Firm') }}</a>
            </p>
        </div>
    </div>
</footer>
