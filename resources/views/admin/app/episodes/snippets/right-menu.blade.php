<div class="col-md-3 border-left">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-0 m-0" title="#">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="p-0 m-0"> {{ __('Ostale informacije') }} </h5>
                    <i class="fas fa-info mt-1 mr-1"></i>
                </div>
            </div>

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
        </div>
    </div>
</div>
