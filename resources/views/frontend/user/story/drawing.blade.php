@extends('frontend.layouts.app')

@section('title', $story->{'name_'.app()->getLocale()}.' - Drawing')

@section('background', 'bg-case-2')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">@lang('Design A Story')</span>
        <div class="col-md-12 mt-5 text-right">
            <a type="button" class="btn btn-primary w3-animate-top" href="{{ route('frontend.user.story.drawing.draw', ['storyId' => $story->id]) }}">
                @lang('Draw Yourself')
            </a>
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
