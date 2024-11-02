<div class="add__review__wrapper">
    <div class="add__review">
        <div class="ar__header">
            <img src="{{ asset('files/images/default/icons/cross-small.svg') }}" alt="">
        </div>
        <div class="ar__heading">
            <h2 class="ar__header_value">{{ __('Odaberite željenu ocjenu!?') }}</h2>
            <p class="ar__heading_desc"> {{ __('Srednja žalost, Bogu plakati') }} </p>
        </div>
        <div class="stars__wrapper">
            @for($i=1; $i<=5; $i++)
                <div class="star review-star" star-index="{{ $i }}">
                    <img src="{{ asset('files/images/default/icons/star-yellow.svg') }}" alt="">
                    <div class="first-half review-star-child" index="left"></div>
                    <div class="second-half review-star-child" index="right"></div>
                </div>
            @endfor
        </div>

        <div class="text__form">
            {{ html()->textarea('review-note')->class('form-control form-control-sm review-note')->maxlength('400')->placeholder(__('Recite nam Vaše osobno iskustvo gledajući ovu epizodu. Da li je bilo dobro za Vas?'))}}
            {{ html()->hidden('review-episode-id')->class('form-control review-episode-id')->value($episode->id) }}

            <button class="btn-primary save-review-note">
                {{ __('Sačuvajte') }}
            </button>
        </div>
    </div>
</div>
