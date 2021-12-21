@extends('frontend.layouts.app')

@section('title', $story->{'name_'.app()->getLocale()}.' - Drawing')

@section('background', 'bg-case-2')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">@lang('Draw Yourself')</span>
        <div class="col-md-12 mt-5 text-right">
            <a type="button" class="btn btn-primary w3-animate-top" href="{{ route('frontend.user.story.drawing', ['storyId' => $story->id]) }}">
                @lang('Drawing')
            </a>
        </div>
        <div id="draw"></div>
    </div><!--container-->

@endsection
