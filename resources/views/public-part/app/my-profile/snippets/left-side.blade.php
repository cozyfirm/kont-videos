<div class="profile__wrapper_left @if(isset($myProfile)) my_profile @endif">
    <div class="p__w_l_img_w">
        <form action="{{ route('public.my-profile.update-image') }}" method="POST" id="update-profile-image" enctype="multipart/form-data">
            @csrf

            @if(isset(Auth()->user()->photo_uri))
                <img src="{{ asset('files/images/public-part/users/' . (Auth()->user()->photo_uri)) }}" alt="">
            @else
                <img src="{{ asset('files/images/public-part/users/silhouette.png') }}" alt="">
            @endif

            <label for="photo_uri" class="edit-your-photo">
                <i class="fas fa-edit"></i>
                <p>{{ __('Uredite') }}</p>
            </label>
            <input name="photo_uri" class="form-control form-control-lg d-none" id="photo_uri" type="file">
        </form>
    </div>

    <div class="p__w_l_links_w">
        <h2>{{ __('Statistički podaci') }}</h2>

        <div class="text__wrapper" title="{{ __('Broj epizoda koje ste gledali') }}">
            <p>{{ __('Pregledano epizoda: ') }} {{ Auth()->user()->episodesWatched() }}</p>
        </div>
        <div class="text__wrapper" title="{{ __('Vremena gledano') }}">
            <p> {{ Auth()->user()->totalWatchTime() }} </p>
        </div>
        <div class="text__wrapper" title="{{ __('Ukupan broj recenzija') }}">
            <p> @if(Auth()->user()->totalReviews()) {{ Auth()->user()->totalReviewsByWord() }} @else {{ __('Nema recenzija') }} @endif </p>
        </div>

        <p class="note">{{ __('Statistički podaci koji se odnose na Vašu angažovanost na www.kont.ba') }}</p>

        <hr>

        <div class="text__wrapper text__wrapper_flex" title="{{ __('Broj epizoda koje ste gledali') }}">
            <label class="noselect" for="user-notifications">{{ __('Email obavijesti ') }}</label>
            <input type="checkbox" name="user-notifications" id="user-notifications" class="user-notifications form-check-label" @if(Auth()->user()->notifications) checked @endif>
        </div>

        <hr>

        <a href="{{ route('public.my-profile.change-password') }}" class="change-psw-link">
            <div class="change-password-btn">
                <p class="text-white">{{ __('Izmijenite šifru') }}</p>
            </div>
        </a>

        <hr>

        <div class="remove-profile-btn">
            <p class="text-white">{{ __('Obrišite profil') }}</p>
        </div>
    </div>
</div>
