@extends('frontend.layouts.app')

@section('title', $case->name." - ".$task->name)

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <h5 class="card-header">{{ $case->name }}</h5>
                    <div class="card-body">
                        <p class="card-text scrollable">{{ $case->description}}</p>
                    </div>
                </div>
            </div><!--col-md-10-->

            <div class="col-md-4">
                <div class="card mb-3">
                    <h5 class="card-header">{{ $task->name }} - {{ $task->type }}</h5>

                    <div class="card-body">
                        @if($task->type == 'MC')
                            Question
                            <div id="MC">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Option 1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Option 2
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        Option 3
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                                    <label class="form-check-label" for="flexRadioDefault4">
                                        Option 4
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5">
                                    <label class="form-check-label" for="flexRadioDefault5">
                                        Option 5
                                    </label>
                                </div>
                            </div>
                        @elseif($task->type == 'ES')
                            Question
                            <div id="ES">
                                <div class="mt-3 mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Text Area</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                        @endif
                        <div class="d-grid gap-2 d-md-block float-md-right">
                            <a href="{{ route('frontend.user.case', $case->id) }}" class="btn btn-secondary" type="button">Back</a>
                            <a href="{{ route('frontend.user.case', $case->id) }}" class="btn btn-success" type="button">Submit</a>
                        </div>
                    </div>
                </div>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
