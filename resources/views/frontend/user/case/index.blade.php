@extends('frontend.layouts.app')

@section('title', $case->{'name_'.app()->getLocale()})

@section('background', 'bg-case-1')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">{{ $case->{'name_'.app()->getLocale()} }}</span>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="sel-card mb-3 w3-animate-right">
                    <div class="card-body my-4">
                        <p class="card-text scrollable mt-4">{{ $case->{'description_'.app()->getLocale()} }}</p>
                    </div>
                </div>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->

    <div class="container">
        <div class="row justify-content-center">
            @foreach($tasks as $task)
            <div class="col-md-3 mb-3">
                <a class="btn btn-lg btn-block shadow w3-animate-zoom" style="color: #113d21; background-color: #50eae1;" href="{{ route('frontend.user.case.task', ['caseId' => $case->id, 'id' => $task->id]) }}">{{ $task->{'name_'.app()->getLocale()} }}</a>
            </div>
            @endforeach
        </div>
    </div>
@endsection
