@extends('frontend.layouts.app')

@section('title', $story->{'name_'.app()->getLocale()}.' - Basic Information')

@section('background', 'bg-story-1')

@section('content')
    <div class="container py-4 mt-lg-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">{{ $story->{'name_'.app()->getLocale()} }}</span>
                <div class="sel-card mb-3">
                    <div class="card-body my-4">
                        <div class="mb-3">
                            <form action="{{ route('frontend.user.story.basic.storeDescription',  ['storyId' => $story->id]) }}" method="post">
                                @csrf
                                <div class="mt-3 mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">@lang('Please integrate time, place, character, and conflict into a complete story')</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="5">@isset($story){{ $story->description }}@endisset</textarea>
                                </div>

                                <div class="d-grid gap-2 d-md-block float-md-right">
                                    <button class="btn btn-success submit" type="submit" >@lang('Finish')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--col-md-10-->

            <div class="col-md-4">
                <span class="sel-sub-header h5" style="background-color: #2e5bbf;">@lang('Basic Information')</span>
                <div class="sel-card mb-3 w3-animate-right">
                    <div class="card-body my-4">
                        <a href="{{ route('frontend.user.story.basic', ['storyId' => $story->id]) }}" class="btn btn-info float-right"><i class="fas fa-edit"></i>@lang('Edit')</a>
                        <h5 class="mt-4">@lang('Time')</h5>
                        <p class="card-text scrollable">{{ $story->time }}</p>
                        <h5>@lang('Place')</h5>
                        <p class="card-text scrollable">{{ $story->place }}</p>
                        <h5>@lang('Characters')</h5>
                        <p class="card-text scrollable">{{ $story->characters }}</p>
                        <h5>@lang('Conflict')</h5>
                        <p class="card-text scrollable">{{ $story->conflict }}</p>
                    </div>

                </div>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection

@section('footer-scripts')

@endsection
