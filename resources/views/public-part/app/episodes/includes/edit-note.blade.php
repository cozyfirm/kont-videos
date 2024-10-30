<div class="edit__note__wrapper d-flexx">
    <div class="edit__note">
        <div class="en__header">
            <div class="time__badge">
                <p class="edit__note_time_badge">03:15</p>
            </div>
            <img src="{{ asset('files/images/default/icons/cross-small.svg') }}" alt="">
        </div>
        <div class="en__heading">
            <h2 class="en__header_value">{{ __('Finish the task on the board') }}</h2>
            <p class="en__heading_desc"> {{ __('Uredi svoju zabilješku') }} </p>
        </div>

        <div class="text__form">
            {{ html()->textarea('edit-note')->class('form-control form-control-sm edit-note')->maxlength('240')->placeholder(__('Uredi zabilješku..'))}}

            <button class="btn-primary edit-note-btn">
                {{ __('Sačuvajte') }}
            </button>
        </div>
    </div>
</div>
