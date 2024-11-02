@extends('public-part.layout.layout')

@section('public-content')
    <div class="presenters__wrapper">
        @include('public-part.app.presenters.includes.all-presenters')
    </div>
@endsection
