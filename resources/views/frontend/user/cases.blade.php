@extends('frontend.layouts.app')

@section('title', __('Cases'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Cases')
                    </x-slot>

                    <x-slot name="body">
                        <ul>
                            @foreach($cases as $case)
                            <li><a href="{{ route('frontend.user.case', $case->id) }}">{{$case->name}}</a></li>
                            @endforeach

                        </ul>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
