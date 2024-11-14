@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-tv"></i> @endsection
@section('c-title') {{ $episode->title ?? '' }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.admin.episodes') }}">{{ __('Pregled svih epizoda') }}</a> /
    <a href="{{ route('system.admin.episodes.preview', ['slug' => $episode->slug ]) }}">{{ $episode->title }}</a> /
    <a href="{{ route('system.admin.episodes.questionnaire.answers-per-episode', ['episode_id' => $episode->id ]) }}">{{ __('Questionnaires') }}</a> /
    <a href="#">{{ $questAnswer->userRel->name ?? '' }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.episodes.questionnaire.answers-per-episode', ['episode_id' => $episode->id ]) }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-0 border-0 ">

        <div class="row">
            <div class="col-md-9">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" width="60px" class="text-center">{{ __('#') }}</th>
                        <th scope="col">{{ __('Pitanje') }}</th>
                        <th scope="col">{{ __('Odgovor') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $counter = 1 @endphp
                    @foreach($answers as $answer)
                        <tr>
                            <th scope="row" class="text-center">{{ $counter++ }}.</th>
                            <td>{{ $answer->questionRel->question ?? '' }}</td>
                            <td>{{ $answer->answer ?? '' }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            @include('admin.app.episodes.snippets.right-menu')
        </div>
    </div>
@endsection
