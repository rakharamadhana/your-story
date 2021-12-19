@extends('frontend.layouts.app')

@section('title', 'Design A Story')

@section('background', 'bg-case-2')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">@lang('Design A Story')</span>
        <div class="col-md-12 mt-5 text-right">
            <a type="button" class="btn btn-primary w3-animate-top" data-toggle="modal" data-target="#createStoryModal">
                @lang('New Story')
            </a>
        </div>
        <div class="horizontal-slide mt-5">
            @foreach($stories as $story)
                <a href="{{ route('frontend.user.story', ['storyId' => $story->id]) }}" class="col-md-3">
                    <div class="sel-card-story mb-3">
                        <div class="card-body my-4">
                            <p class="card-text scrollable mt-4">{{ $story->{'name_'.app()->getLocale()} }}</p>
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

                                    <input type="text" name="title" class="form-control" placeholder="{{ __('Enter Title') }}" value="{{ old('title') }}" maxlength="100" required />
                                </div>

                                <div class="d-grid gap-2 d-md-block float-md-right">
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

@section('before-scripts')
    <script type="text/javascript">
        //triggered when modal is about to be shown
        $('#my_modal').on('show.bs.modal', function(e) {

            //get data-id attribute of the clicked element
            let bookId = $(e.relatedTarget).data('book-id');

            //populate the textbox
            $(e.currentTarget).find('input[name="bookId"]').val(bookId);
        });
    </script>
@endsection
