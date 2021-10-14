@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@push('after-styles')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@endpush

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

            <div id="task2-1" class="col-md-4">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Task 2-1')
                    </x-slot>

                    <x-slot name="body">
                        Question 2-1
                        <div class="d-grid gap-2 mb-3">
                            <button class="btn btn-warning btn-block" type="button">Option 1</button>
                            <button class="btn btn-info btn-block" type="button">Option 2</button>
                            <button class="btn btn-danger btn-block" type="button">Option 3</button>
                            <button class="btn btn-success btn-block" type="button">Option 4</button>
                        </div>
                        <div class="d-grid gap-2 d-md-block float-md-right">
                            <a href="{{ route('frontend.user.case', $case->id) }}" class="btn btn-secondary" type="button">Back</a>
                            <button onclick="showStuff('task2-2', 'task2-1')" class="btn btn-success " type="button">Next</button>
                        </div>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->

            <div id="task2-2" class="col-md-4" style="display: none;">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Task 2-2')
                    </x-slot>

                    <x-slot name="body">
                        Question 2-2
                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Text Area...?</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                        </div>
                        <div class="d-grid gap-2 d-md-block float-md-right">
                            <button onclick="showStuff('task2-1', 'task2-2')" class="btn btn-secondary " type="button">Back</button>
                            <a href="{{ route('frontend.user.case', $case->id) }}" class="btn btn-success " type="button">Submit</a>
                        </div>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection

@section('footer-scripts')
    <script type="text/javascript">
        function showStuff(id1,id2) {
            var x = document.getElementById(id1);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
            var y = document.getElementById(id2);
            if (y.style.display === "none") {
                y.style.display = "block";
            } else {
                y.style.display = "none";
            }
        }
    </script>
@endsection
