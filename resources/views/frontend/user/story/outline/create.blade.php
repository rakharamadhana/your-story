@extends('frontend.layouts.app')

@section('title', $story->{'name_'.app()->getLocale()}.' - Story Outline')

@section('background', 'bg-story-1')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">{{ $story->{'name_'.app()->getLocale()} }}</span>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="sel-card mb-3 w3-animate-right">
                    <div class="card-body my-4">
                        <ol>
                            <li class="text-info"><p class="mt-4">@lang('No commentary will be given, only an attempt to state [Observations]')</p></li>
                            <p class="card-text">@lang('I observed to...?')</p>
                            <li class="text-info"><p>@lang('Tell us how you [Perceives] the story')</p></li>
                            <p class="card-text">@lang('I feel...?')</p>
                            <li class="text-info"><p>@lang('Be direct about what you really [Needs]')</p></li>
                            <p class="card-text">@lang('I want...?')</p>
                            <li class="text-info"><p>@lang('Remind explicit [Requests]')</p></li>
                            <p class="card-text">@lang('What can I do?')</p>
                        </ol>
                    </div>

                </div>
            </div><!--col-md-10-->

            <div class="col-md-8">
                <div class="sel-card mb-3">
                    <div class="card-body my-4">
                        <div class="mb-3">
                            <form action="{{ route('frontend.user.story.outline.store',  ['storyId' => $story->id]) }}" method="post">
                                @csrf
                                <div class="mt-3 mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">@lang('Based on the story you have created, please present your observations, feelings, needs, and requests in a series of columns')</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="nvc_outline" rows="5">@isset($story){{ $story->nvc_outline }}@endisset</textarea>
                                </div>

                                <div class="d-grid gap-2 d-md-block float-md-right">
                                    <button class="btn btn-success submit" type="submit" >@lang('Finish')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection

@section('footer-scripts')

@endsection
