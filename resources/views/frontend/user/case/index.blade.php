@extends('frontend.layouts.app')

@section('title', $case->{'name_'.app()->getLocale()})

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-3">
                    <h5 class="card-header">{{ $case->{'name_'.app()->getLocale()} }}</h5>
                    <div class="card-body">
                        <p class="card-text scrollable">{{ $case->{'description_'.app()->getLocale()} }}</p>
                    </div>
                </div>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->

    <div class="container">
        <div class="row justify-content-center">
            @foreach($tasks as $task)
            <div class="col-md-12 text-right mb-3">
                <a class="btn btn-block btn-secondary float-right" href="{{ route('frontend.user.case.task', ['caseId' => $case->id, 'id' => $task->id]) }}">{{ $task->{'name_'.app()->getLocale()} }}</a>
            </div>
            @endforeach
        </div>
    </div>
@endsection
