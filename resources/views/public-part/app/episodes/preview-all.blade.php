@extends('public-part.layout.layout')

@section('public-content')
    @include('public-part.app.shared.trailer')
    @include('public-part.app.shared.episodes')

    @include('public-part.app.shared.accordion')
@endsection
