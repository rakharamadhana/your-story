@extends('frontend.layouts.app')

@section('title', 'Design A Story')

@section('background', 'bg-case-2')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">@lang('Design A Story')</span>
        <div class="col-md-12 mt-3 text-right">
            <a type="button" class="btn btn-primary w3-animate-top" data-toggle="modal" data-target="#createStoryModal">
                @lang('New Story')
            </a>
        </div>
        <div class="horizontal-slide mt-5">
            @foreach($stories as $story)
                <a href="{{ route('frontend.user.story', ['storyId' => $story->id]) }}" class="col-md-3">
                    <div class="sel-card-story mb-3">
                        <div class="card-body my-4">
                            {{ $story->{'name_'.app()->getLocale()} }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div><!--container-->

    <!-- Modal -->
    <div class="modal-transparent modal fade" id="createStoryModal" tabindex="-1" role="dialog" aria-labelledby="casesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="casesModalLabel">@lang('Create A Story')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('frontend.user.story.store') }}" method="post">
                                @csrf
                                <div class="mt-3 mb-3">
                                    <label for="title" class="form-label">@lang('Title')</label>

                                    <input type="text" name="title" class="form-control" placeholder="@lang('Enter Title')" value="{{ old('title') }}" maxlength="32" required />
                                </div>

                                @if($groupCount > 0)
                                    <input name="group_id" class="form-control" type="number" placeholder="group" aria-label="Disabled input example" value="{{ $studentGroup[0]->group->id }}" hidden>

                                    <label for="group_name" class="form-label">@lang('Group Name')</label>
                                    <input name="group_name" class="form-control" type="text" placeholder="group" aria-label="Disabled input example" value="{{ $studentGroup[0]->group->name }}" disabled>
                                @endif


                                <div class="mt-3 d-grid gap-2 d-md-block float-md-right">
                                    <button class="btn btn-success submit" type="submit" >@lang('Finish')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
