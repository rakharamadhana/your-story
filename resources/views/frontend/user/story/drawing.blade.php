@extends('frontend.layouts.app')

@section('title', $story->{'name_'.app()->getLocale()}.' - Drawing')

@section('background', 'bg-case-2')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">Design A Story</span>
        <div class="row mt-lg-5 mt-md-5 mt-sm-5">
            <div class="col-md-4 mt-lg-5 mt-md-5 mt-sm-5 zoom">
                <a href="{{ route('frontend.user.story.drawing', ['storyId' => $story->id]) }}">
                    <img src="{{ URL::asset('img/menu-design.png') }}" class="w3-animate-zoom rounded mx-auto d-block img-fluid" alt="">
                    <p class="h3 text-center" style="color: #8d002a;">@lang('Drawing')</p>
                </a>
            </div><!--col-md-10-->
        </div><!--row-->
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
