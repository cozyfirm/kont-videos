<div class="questionnaire__wrapper">
    <div class="questionnaire__inner">
        @for($j=1; $j<=5; $j++)
            <div class="question__wrapper" question-id="{{ $j }}">
                <div class="question">
                    <p>Koliko ste zadovoljni izborom predavača/predavačice za ovu temu?</p>
                </div>
                <div class="answer__wrapper">
                    @if($j == 5)
                        <div class="textarea__wrapper">
                            {{ html()->textarea('question')->class('form-control form-control-sm textarea-120')->required()->placeholder(__('Vaš odgovor...')) }}
                        </div>
                    @else
                        <div class="aw__stars__wrapper stars-5">
                            @for($i=1; $i<=5; $i++)
                                <div class="svg__wrapper questionnaire-star-wrapper" star-index="{{ $i }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path class="questionnaire-star star-{{ $i }}" d="M19.467,23.316,12,17.828,4.533,23.316,7.4,14.453-.063,9H9.151L12,.122,14.849,9h9.213L16.6,14.453ZM12,15.346l3.658,2.689-1.4-4.344L17.937,11H13.39L12,6.669,10.61,11H6.062l3.683,2.691-1.4,4.344Z"/>
                                    </svg>
                                </div>
                            @endfor
                        </div>
                        <div class="description__wrapper">
                            <p>(1 - Uopšte nisam zadovoljan/a, 5 - Potpuno sam zadovoljan/a)</p>
                        </div>
                    @endif
                </div>
            </div>
        @endfor

        <div class="submit__it">
            <button class="btn-tertiary">{{ __('Pošalji') }}</button>
        </div>
    </div>
</div>
