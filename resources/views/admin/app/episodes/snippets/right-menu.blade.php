<div class="col-md-3 border-left">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-0 m-0" title="#">
                <div class="card-body pb-1 d-flex justify-content-between">
                    <h5 class="p-0 m-0"> {{ __('Ostale informacije') }} </h5>
                    <i class="fas fa-info mt-1 mr-1"></i>
                </div>

                <div class="card-body pt-0 pb-0">
                    <hr>
                </div>

                <a href="{{ route('system.admin.episodes.questionnaire.answers-per-episode', ['episode_id' => $episode->id ]) }}">
                    <div class="card-body pt-0 pb-0 d-flex justify-content-between">
                        <p class="p-0 ml-0"> {{ __('Questionnaires') }} </p>
                        <p>({{ $episode->questionnaireRel->count() }})</p>
                    </div>
                </a>
            </div>

            @if($episode->type == 0)
                <div class="card p-0 mt-3" title="#">
                    <a href="{{ route('system.admin.episodes.video-content.add', ['slug' => $episode->slug ]) }}">
                        <div class="card-body d-flex justify-content-between">
                            <h6 class="p-0 m-0"> {{ __('Video sadržaj') }} </h6>
                            <i class="fas fa-plus mt-1 mr-1"></i>
                        </div>
                    </a>
                    @if($episode->allVideoContentRel->count())
                        <div class="card-body d-flex justify-content-between m-0">
                            <ul class="m-0 pl-3">
                                @php $counter = 1; @endphp
                                @foreach($episode->allVideoContentRel as $video)
                                    <li><a href="{{ route('system.admin.episodes.video-content.preview', ['id' => $video->id ]) }}">{{ $counter++ }}. {{ $video->title }} </a> </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            @else
                <div class="card p-0 mt-3" title="#">
                    <a href="{{ route('system.admin.episodes.video-content.add', ['slug' => $episode->slug ]) }}">
                        <div class="card-body d-flex justify-content-between">
                            <h6 class="p-0 m-0"> {{ __('Video sadržaj') }} </h6>
                        </div>
                    </a>

                    <div class="card-body d-flex justify-content-between m-0">
                        <ul class="m-0 pl-3">
                            <li><a href="{{ route('system.admin.episodes.chapters-video-content.set', ['slug' => $episode->slug, 'type' => 'trailer' ]) }}"> {{ __('Trailer') }} </a> </li>
                            <li><a href="{{ route('system.admin.episodes.chapters-video-content.set', ['slug' => $episode->slug, 'type' => 'video' ]) }}"> {{ __('Video sa chapterima') }} </a> </li>
                        </ul>
                    </div>
                </div>

                @if(isset($episode->chapterVideoRel))
                    <div class="card p-0 mt-3" title="#">
                        <a href="{{ route('system.admin.episodes.chapters-video-content.chapters.create', ['video_id' => $episode->chapterVideoRel->id ]) }}">
                            <div class="card-body d-flex justify-content-between">
                                <h6 class="p-0 m-0"> {{ __('Pregled chaptera') }} </h6>
                                <i class="fas fa-plus mt-1 mr-1"></i>
                            </div>
                        </a>

                        @if($episode->chapterVideoRel->chaptersRel->count())
                            <div class="card-body d-flex justify-content-between m-0">
                                <ul class="m-0 pl-3">
                                    @php $counter = 1; @endphp
                                    @foreach($episode->chapterVideoRel->chaptersRel as $chapter)
                                        <li><a href="{{ route('system.admin.episodes.chapters-video-content.chapters.preview', ['id' => $chapter->id ]) }}">{{ $counter++ }}. {{ $chapter->title }} </a> </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
