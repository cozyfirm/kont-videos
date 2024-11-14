@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-tv"></i> @endsection
@section('c-title') {{ $episode->title ?? '' }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> /
    <a href="{{ route('system.admin.episodes') }}">{{ __('Pregled svih epizoda') }}</a> /
    <a href="{{ route('system.admin.episodes.preview', ['slug' => $episode->slug ]) }}">{{ $episode->title }}</a> /
    <a href="{{ route('system.admin.episodes.questionnaire.answers-per-episode', ['episode_id' => $episode->id ]) }}">{{ __('Questionnaires') }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.episodes.preview', ['slug' => $episode->slug ]) }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">

        <div class="row">
            <div class="col-md-12">
                @include('admin.layout.snippets.filters.filter-header', ['var' => $questionnaires])
                <table class="table table-bordered" id="filtering">
                    <thead>
                    <tr>
                        <th scope="col" style="text-align:center;">#</th>
                        @include('admin.layout.snippets.filters.filters_header')
                        <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1; @endphp
                    @foreach($questionnaires as $questionnaire)
                        <tr>
                            <td class="text-center">{{ $i++}}</td>
                            <td> {{ $questionnaire->userRel->name ?? ''}} </td>

                            <td class="text-center">
                                <a href="{{route('system.admin.episodes.questionnaire.answers-per-episode.detailed', ['id' => $questionnaire->id] )}}" title="{{ __('Više informacija') }}">
                                    <button class="btn btn-dark btn-xs">{{ __('Pregled') }}</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @include('admin.layout.snippets.filters.pagination', ['var' => $questionnaires])
            </div>
        </div>
    </div>
@endsection
