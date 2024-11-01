<div class="inner__element my__notes active">
    <div class="add__note___wrapper">
        <!-- ToDo:: On change video, replace this video ID -->
        <div class="add__new_note" video-id="{{ $video->id }}" episode-id="{{ $episode->id }}">
            <div class="add__new__note_text">
                <p>{{ __('Dodaj novu zabilješku u ') }} </p>
                <p class="note__time"> 03:12 </p>
            </div>
            <div class="add__new__note_icon">
                <svg id="Layer_1" height="32"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="m16 16a1 1 0 0 1 -1 1h-2v2a1 1 0 0 1 -2 0v-2h-2a1 1 0 0 1 0-2h2v-2a1 1 0 0 1 2 0v2h2a1 1 0 0 1 1 1zm6-5.515v8.515a5.006 5.006 0 0 1 -5 5h-10a5.006 5.006 0 0 1 -5-5v-14a5.006 5.006 0 0 1 5-5h4.515a6.958 6.958 0 0 1 4.95 2.05l3.484 3.486a6.951 6.951 0 0 1 2.051 4.949zm-6.949-7.021a5.01 5.01 0 0 0 -1.051-.78v4.316a1 1 0 0 0 1 1h4.316a4.983 4.983 0 0 0 -.781-1.05zm4.949 7.021c0-.165-.032-.323-.047-.485h-4.953a3 3 0 0 1 -3-3v-4.953c-.162-.015-.321-.047-.485-.047h-4.515a3 3 0 0 0 -3 3v14a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3z"/>
                </svg>
            </div>
        </div>
        <div class="note__textarea">
            {{ html()->textarea('new_note')->class('form-control form-control-sm')->id('new_note')->placeholder('Nova zabilješka..')->maxlength('240') }}

            <div class="save__btn">
                <button class="btn-primary save-new-note">
                    {{ __('Sačuvajte') }}
                </button>
            </div>
        </div>
    </div>

    <div class="all__notes">
        @foreach($episode->userNotesRel as $note)
            <div class="single__note" note-id="{{ $note->id }}">
                <div class="note__header">
                    <div class="time__badge">
                        <p>{{ $note->time ?? '' }}</p>
                    </div>
                    <div class="icons__wrapper">
                        <div class="icon__wrapper edit__note__trigger" title="{{ __('Uredi zabilješku') }}">
                            <i class="fi fi-bs-edit"></i>
                        </div>
                        <div class="icon__wrapper delete__note__trigger" title="{{ __('Obriši zabilješku') }}">
                            <i class="fi fi-bs-trash"></i>
                        </div>
                    </div>
                </div>
                <div class="note__body">
                    <h2> {{ $note->videoRel->title ?? '' }} </h2>
                    <p class="note__body__value"> {{ $note->note ?? '' }} </p>
                </div>
                <div class="note__footer">
                    <p> {{ $note->createdAtDate() }} </p>
                </div>
            </div>
        @endforeach

    </div>
</div>
