@extends('public-part.layout.layout')

@section('public-content')
    <!-- Include menu -->
    {{--@include('public-part.app.my-profile.snippets.inner-menu')--}}

    <div class="main__profile__wrapper white__wrapper">
        <div class="profile__wrapper">
            @include('public-part.app.my-profile.snippets.left-side')

            <div class="profile__wrapper_right">
                <div class="pwr__header">
                    <h2>{{ __('Izmijenite vašu korisničku šifru') }}</h2>
                </div>
                <form action="{{ route('public.my-profile.update-password') }}" method="POST" id="js-form" class="mt-20">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Vaša šifra'))->for('password')->class('bold') }}</b>
                                        {{ html()->password('password')->class('form-control form-control-sm mt-1 required')->maxlength(20) }}
                                        <small id="passwordHelp" class="form-text text-muted"> {{ __('Unesite Vašu šifru') }} </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Ponovite unos'))->for('repeat')->class('bold') }}</b>
                                        {{ html()->password('repeat')->class('form-control form-control-sm mt-1 required')->maxlength(20) }}
                                        <small id="repeatHelp" class="form-text text-muted">{{ __('Ponovo unesite Vašu šifru') }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button class="btn">{{ __('Izmijenite šifru') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
