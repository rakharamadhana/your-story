@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        {{ $case->name}}
                    </x-slot>

                    <x-slot name="body">
                        {{ $case->description}}
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-right">
                <a class="btn btn-block btn-success float-right" href="{{ route('frontend.user.case.task1', $case->id) }}">@lang('Task 1')</a>
            </div>
            <div class="col-md-12 text-right mt-3">
                <a class="btn btn-block btn-primary float-right" href="{{ route('frontend.user.case.task2', $case->id) }}">@lang('Task 2')</a>
            </div>
        </div>
    </div>
@endsection
