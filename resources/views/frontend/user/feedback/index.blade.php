@extends('frontend.layouts.app')

@section('title', 'Feedback')

@section('background', 'bg-case-2')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">@lang('Review')</span>
        <div class="row mt-lg-5 mt-md-5 mt-sm-5">
        @if($groupCount > 0)
            <div class="col-6 zoom">
                <a href="{{ route('frontend.user.feedback.review', ['type' => $groupCount > 0 ? 2 : 1 ]) }}">
                    <img src="{{ URL::asset('img/feedback-group.png') }}" class="w3-animate-zoom rounded mx-auto d-block img-fluid" alt="" style="max-height: 300px">
                    <p class="h3 text-center" style="color: #24423E;">@lang('Peer Feedback')</p>
                </a>
            </div><!--col-md-10-->
        @else
            <div class="col-6 zoom">
                <a href="{{ route('frontend.user.feedback.review', ['type' => $groupCount > 0 ? 2 : 1 ]) }}">
                    <img src="{{ URL::asset('img/feedback-individual.png') }}" class="w3-animate-zoom rounded mx-auto d-block img-fluid" alt="" style="max-height: 300px">
                    <p class="h3 text-center" style="color: #BC7B00;">@lang('Self Reflection')</p>
                </a>
            </div><!--col-md-10-->
        @endif
            <div class="col-6 zoom">
                <a href="{{ route('frontend.user.feedback.story') }}">
                    <img src="{{ URL::asset('img/feedback-story.png') }}" class="w3-animate-zoom rounded mx-auto d-block img-fluid" alt="" style="max-height: 300px">
                    <p class="h3 text-center" style="color: #00BC4D;">@lang('Review Stories')</p>
                </a>
            </div><!--col-md-10-->
        </div>
{{--        <div class="horizontal-slide mt-5">--}}
{{--            @foreach($stories as $story)--}}
{{--                <a href="{{ route('frontend.user.feedback.rate', ['storyId' => $story->id, 'storyType' => $groupCount > 0 ? 2 : 1 ]) }}" class="col-md-3">--}}
{{--                    <div class="sel-card-story mb-3">--}}
{{--                        <div class="card-body my-4">--}}
{{--                            <p class="card-text scrollable mt-4">{{ $story->{'name_'.app()->getLocale()} }}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            @endforeach--}}
{{--        </div>--}}
    </div><!--container-->
@endsection
