@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>
                    <x-slot name="header">
                        {{ $case->name }}
                    </x-slot>

                    <x-slot name="body">
                        {{ $case->description }}
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->

            <div class="col-md-4">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Task 1')
                    </x-slot>

                    <x-slot name="body">
                        Question 1
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Option 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Option 2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Option 3
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Option 4
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Option 5
                            </label>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Text Area</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="d-grid gap-2 d-md-block float-md-right">
                            <a href="{{ route('frontend.user.case', $case->id) }}" class="btn btn-secondary" type="button">Back</a>
                            <a href="{{ route('frontend.user.case', $case->id) }}" class="btn btn-success" type="button">Submit</a>
                        </div>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
