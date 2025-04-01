@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-bell"></i> @endsection
@section('c-title') {{ __('Notifications queue') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.admin.episodes.notifications.preview-queue') }}">{{ __('Notifications queue') }}</a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.admin.episodes') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    <a href="{{ route('system.admin.episodes.notifications.new-message') }}">
        <button class="pm-btn btn pm-btn-success">
            <i class="fas fa-plus"></i>
            <span>{{ __('Nova poruka') }}</span>
        </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @include('admin.layout.snippets.filters.filter-header', ['var' => $queue])
        <table class="table table-bordered" id="filtering">
            <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                @include('admin.layout.snippets.filters.filters_header')
                <th width="120p" class="akcije text-center">{{__('Procentualno')}}</th>
                <th width="120p" class="akcije text-center">{{__('Preostalo sati')}}</th>
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($queue as $q)
                <tr>
                    <td class="text-center">{{ $i++}}. </td>
                    @if($q->type == 'new_episode')
                        <td> {{ $q->episodeRel->title ?? ''}} </td>
                    @else
                        <td> {{ $q->messageRel->title ?? ''}} </td>
                    @endif
                    <td> {{ $q->sent ?? ''}} </td>
                    <td> {{ $q->total ?? ''}} </td>
                    <td> {{ (int)(($q->sent / $q->total) * 100) }}% </td>
                    <td>{{ $q->leftHours() }}</td>

                    <td class="text-center">
                        <a href="{{ route('system.admin.episodes.notifications.delete-queue', ['id' => $q->id ]) }}" title="{{ __('Više informacija') }}">
                            <button class="btn btn-dark btn-xs">{{ __('Obrišite') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.layout.snippets.filters.pagination', ['var' => $queue])
    </div>
@endsection
