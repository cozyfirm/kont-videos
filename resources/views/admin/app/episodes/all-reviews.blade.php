@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-tv"></i> @endsection
@section('c-title') {{ __('Epizode') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.admin.episodes') }}">{{ __('Pregled svih epizoda') }}</a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.admin.episodes') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    <a href="{{ route('system.admin.episodes.create') }}">
        <button class="pm-btn btn pm-btn-success">
            <i class="fas fa-plus"></i>
            <span>{{ __('Unos nove') }}</span>
        </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        @include('admin.layout.snippets.filters.filter-header', ['var' => $reviews])
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
            @foreach($reviews as $review)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $review->episodeRel->title ?? ''}} </td>
                    <td> {{ $review->userRel->name ?? ''}} </td>
                    <td> {{ $review->stars ?? ''}} </td>
                    <td> {{ $review->note ?? ''}} </td>
                    <td> {{ $review->statusRel->name ?? '' }} </td>

                    <td>
                        {{ html()->select('review_status', ['0' => 'Na čekanju', '1' => 'Objavljena' , '2' => 'Odbijena'], $review->status )->class('form-control form-control-sm mt-1 approve-review')->attribute('review-id', $review->id) }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.layout.snippets.filters.pagination', ['var' => $reviews])
    </div>
@endsection
