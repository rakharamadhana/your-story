@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Case 1')
                    </x-slot>

                    <x-slot name="body">
                        Text here
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->

            <div class="col-md-4">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Task 1')
                    </x-slot>

                    <x-slot name="body">
                        Text here
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
