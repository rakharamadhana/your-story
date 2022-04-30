@extends('frontend.layouts.app')

@section('title',"Modify ".$story->{'name_'.app()->getLocale()} )

@section('background', 'bg-case-2')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">{{ $story->{'name_'.app()->getLocale()} }}</span>
        <div class="row">
            <div class="col-md-4 mt-lg-5 mt-md-5 mt-sm-5 zoom">
                <a href="{{ route('frontend.user.story.basic', ['storyId' => $story->id]) }}">
                    <img src="{{ URL::asset('img/story-basic.png') }}" class="w3-animate-zoom rounded mx-auto d-block img-fluid" alt="">
                    <p class="h3 text-center" style="color: #8d4600;">@lang('Basic Information')</p>
                </a>
            </div><!--col-md-10-->
            <div class="col-md-4 mt-lg-5 mt-md-5 mt-sm-5 zoom">
                <a href="{{ route('frontend.user.story.outline', ['storyId' => $story->id]) }}">
                    <img src="{{ URL::asset('img/story-outline.png') }}" class="w3-animate-zoom rounded mx-auto d-block img-fluid" alt="">
                    <p class="h3 text-center" style="color: #001d8d;">@lang('Outline')</p>
                </a>
            </div><!--col-md-10-->
            <div class="col-md-4 mt-lg-5 mt-md-5 mt-sm-5 zoom">
                <a href="{{ route('frontend.user.story.drawing', ['storyId' => $story->id]) }}">
                    <img src="{{ URL::asset('img/story-drawing.png') }}" class="w3-animate-zoom rounded mx-auto d-block img-fluid" alt="">
                    <p class="h3 text-center" style="color: #8d002a;">@lang('Drawing')</p>
                </a>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection

@section('before-scripts')

@endsection
