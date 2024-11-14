@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-question"></i> @endsection
@section('c-title') {{ __('FAQ') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.admin.episodes.questionnaire') }}">{{ __('Ankete') }}</a>
@endsection

@section('c-buttons')
    <a href="{{ route('system.admin.episodes.questionnaire') }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>

    @if(isset($preview))
        <a href="{{ route('system.admin.episodes.questionnaire.edit', ['id' => $question->id ]) }}">
            <button class="pm-btn btn pm-btn-edit">
                <i class="fas fa-edit"></i>
            </button>
        </a>
        <a href="{{ route('system.admin.episodes.questionnaire.delete', ['id' => $question->id ]) }}">
            <button class="pm-btn btn pm-btn-trash">
                <i class="fas fa-trash"></i>
            </button>
        </a>
    @endif
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="col-md-12">
                <form action="@if(isset($edit)) {{ route('system.admin.episodes.questionnaire.update') }} @else {{ route('system.admin.episodes.questionnaire.save') }} @endif" method="POST" id="js-form">
                    @if(isset($edit))
                        {{ html()->hidden('id')->class('form-control')->value($question->id) }}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Pitanje'))->for('question')->class('bold') }}
                                {{ html()->textarea('question', $question->question ?? '' )->class('form-control form-control-sm textarea-60')->required()->value((isset($question) ? $question->question : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Kratki opis'))->for('description')->class('bold') }}
                                {{ html()->text('description', $question->description ?? '' )->class('form-control form-control-sm')->required()->value((isset($question) ? $question->description : ''))->isReadonly(isset($preview)) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ html()->label(__('Vrsta'))->for('type')->class('bold') }}
                                {{ html()->select('type', ['option' => 'Options', 'text' => 'Text'], isset($question) ? $question->type : '')->class('form-control form-control-sm mt-1')->required()->disabled(isset($preview)) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
