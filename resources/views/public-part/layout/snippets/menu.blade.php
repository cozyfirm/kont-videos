<div class="container-menu" id="container-menu">
    <div class="menu">
        <div class="logo">
            <a href="{{ route('public.home') }}" class="Logo"><img src="{{ asset('files/images/logo.svg') }}"></a>
        </div>
        <div class="list">
            <ul>
                <li><a href="{{ route('public.episodes') }}">Epizode</a></li>
                <li><a href="#">Predavači</a></li>
                <li><a href="#">Teme</a></li>
                <li><a href="#">Vijesti</a></li>
                <li><a href="#">O nama</a></li>
                <li><a href="#">Kontakt</a></li>
            </ul>
        </div>
        <div class="action-btn">
            <form action="#" method="get">
                <button target class="btn-secondary"><i class="fi fi-bs-sign-in-alt"></i>Log in</button>
            </form>
            <form action="#" method="get">
                <button class="btn-primary">Registruj se</button>
            </form>
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
                <li><a href="#">Epizode</a></li>
                <li><a href="#">Predavači</a></li>
                <li><a href="#">Teme</a></li>
                <li><a href="#">Vijesti</a></li>
                <li><a href="#">O nama</a></li>
                <li><a href="#">Kontakt</a></li>
            </ul>
        </div>
        <div class="action-btn">
            <button class="btn-secondary"><i class="fi fi-br-sign-in-alt"></i>Log in</button>
            <button class="btn-primary">Registruj se</button>
        </div>
    </div>
</div>
