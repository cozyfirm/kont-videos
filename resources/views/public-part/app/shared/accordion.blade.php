<section class="Accordion accordion-wrapper @isset($all_episodes) accordion-wrapper-dark @endisset" id="Acoordion">
    <div class="accordion-container">
        <div class="faq-heading">
            <h1>FAQ</h1>
            <p>{{ __('Često postavljena pitanja') }}</p>
        </div>

        @foreach($faqs as $faq)
            <!-- the button holds the title of the accordion-->
            <button class="course-accordion">{{ $faq->title ?? '' }}</button>
            <!-- This div holds the content to be displayed-->
            <div class="course-panel">
                <div class="course-panel-text-w">
                    {!! nl2br($faq->description ?? '') !!}
                </div>
            </div>
        @endforeach
    </div>
</section>
