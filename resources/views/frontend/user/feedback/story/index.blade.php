@extends('frontend.layouts.app')

@section('title', 'Review A Story')

@section('background', 'bg-case-2')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">@lang('Review A Story')</span>
        <div class="horizontal-slide mt-5">
            @foreach($stories as $story)
                <a href="{{ route('frontend.user.feedback.story.rate', ['storyId' => $story->id]) }}" class="col-md-3">
                    <div class="sel-card-story mb-3">
                        <div class="card-body my-4">
                            <p class="card-text scrollable mt-4">{{ $story->{'name_'.app()->getLocale()} }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div><!--container-->
@endsection
