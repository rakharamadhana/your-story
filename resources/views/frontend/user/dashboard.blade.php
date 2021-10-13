@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Dashboard')
                    </x-slot>

                    <x-slot name="body">
                        @lang('You are logged in!')
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->

            <div class="col-md-12 mt-3">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Menu')
                    </x-slot>

                    <x-slot name="body">
                        <ul>
                            <li><a href="{{ route('frontend.user.cases') }}">@lang('Cases')</a></li>
                            <li><a href="{{ route('frontend.user.dashboard') }}">@lang('Design A Story')</a></li>                            
                        </ul>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
