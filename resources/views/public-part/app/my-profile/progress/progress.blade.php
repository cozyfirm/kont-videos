@extends('public-part.layout.layout')

@section('public-content')
    <!-- Include menu -->
    @include('public-part.app.my-profile.snippets.inner-menu')

    <div class="main__profile__wrapper white__wrapper">
        <div class="profile__wrapper">
            @include('public-part.app.my-profile.snippets.left-side')

            <div class="profile__wrapper_right">

            </div>
        </div>
    </div>
@endsection
