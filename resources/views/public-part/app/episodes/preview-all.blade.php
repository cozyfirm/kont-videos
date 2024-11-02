@extends('public-part.layout.layout')

@section('public-content')
    <!-- Import episode trailer -->
    @include('public-part.app.shared.trailer')
    @include('public-part.app.shared.episodes')

    @include('public-part.app.shared.accordion')
@endsection
