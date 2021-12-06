@extends('frontend.layouts.app')

@section('title', 'Design A Story')

@section('background', 'bg-case-2')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">Design A Story</span>
        <div class="col-md-12 mt-5 text-right">
            <a type="button" class="btn btn-primary w3-animate-top" data-toggle="modal" data-target="#newStoryModal">
                New Story
            </a>
        </div>
        <div class="horizontal-slide mt-5">
            @foreach($cases as $case)
                <a href="{{ route('frontend.user.dashboard') }}" class="col-md-3">
                    <div class="sel-card-story mb-3">
                        <div class="card-body my-4">
                            <p class="card-text scrollable mt-4">{{ $case->name_en }}</p>
                            <input type="hidden" name="storyId" id="storyId" value="{{ $case->id }}"/>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div><!--container-->

    <div id="draw"></div>

    <!-- Modal -->
    <div class="modal-transparent modal fade" id="newStoryModal" tabindex="-1" role="dialog" aria-labelledby="#newStoryModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newStoryModalLabel">Design A Story</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>
                <div class="modal-body justify-content-between">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('frontend.user.story') }}">
                                <img src="{{ URL::asset('img/menu-cases.png') }}" class="rounded mx-auto d-block img-fluid" alt="">
                                <p class="h3 text-center" style="color: #8d4600;">@lang('Basic Information')</p>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('frontend.user.story') }}">
                                <img src="{{ URL::asset('img/menu-cases.png') }}" class="rounded mx-auto d-block img-fluid" alt="">
                                <p class="h3 text-center" style="color: #8d4600;">@lang('Outline')</p>
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ route('frontend.user.story') }}">
                                <img src="{{ URL::asset('img/menu-cases.png') }}" class="rounded mx-auto d-block img-fluid" alt="">
                                <p class="h3 text-center" style="color: #8d4600;">@lang('Drawing')</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal-transparent modal fade" id="my_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-header">
                <h3 class="modal-title" id="newStoryModalLabel">Design A Story</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times fa-lg"></i>
                </button>
            </div>
            <div class="modal-body justify-content-between">
                <p>some content</p>
                <input type="text" name="bookId" id="bookId" value=""/>
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
