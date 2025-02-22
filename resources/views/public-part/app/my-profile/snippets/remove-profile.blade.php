<div class="remove__profile__wrapper">
    <div class="remove__profile">
        <div class="rp__header close-remove-profile">
            <img src="{{ asset('files/images/default/icons/cross-small.svg') }}" alt="">
        </div>
        <div class="rp__heading">
            <h2 class="ar__header_value">{{ __('Da li ste sigurni da želite obrisati vaš profil?') }}</h2>
            <p>{{ __('Svi podaci, uključujući vaš progres, recenzije, bilješke će biti obrisan') }}</p>
        </div>

        <div class="buttons__wrapper">
            <button class="btn btn-secondary close-remove-profile">{{ __('Odustani') }}</button>
            <button class="btn btn-tertiary remove-user-profile">{{ __('Obriši profil') }}</button>
        </div>
    </div>
</div>
