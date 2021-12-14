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
                <a href="{{ route('frontend.user.story', ['storyId' => $case->id]) }}" class="col-md-3">
                    <div class="sel-card-story mb-3">
                        <div class="card-body my-4">
                            <p class="card-text scrollable mt-4">{{ $case->name_en }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div><!--container-->
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
