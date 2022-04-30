@extends('frontend.layouts.app')

@section('title', $story->{'name_'.app()->getLocale()}.' - Drawing')

@section('background', 'bg-case-2')

@section('content')
    <div class="container py-4">
        <div class="col-md-12 text-right">
            <a type="button" class="btn btn-primary w3-animate-top" onclick="return confirm('Your work will be deleted, are you sure to go back?')" href="{{ route('frontend.user.story.drawing', ['storyId' => $story->id]) }}">
                @lang('Back to Drawing')
            </a>
        </div>
        <div id="draw"></div>
    </div><!--container-->

@endsection
