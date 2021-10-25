@extends('frontend.layouts.app')

@section('title', $case->{'name_'.app()->getLocale()}." - ".$task->{'name_'.app()->getLocale()})

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <h5 class="card-header">{{ $case->{'name_'.app()->getLocale()} }}</h5>
                    <div class="card-body">
                        <p class="card-text scrollable">{{ $case->{'description_'.app()->getLocale()} }}</p>
                    </div>
                </div>
            </div><!--col-md-10-->

            <div class="col-md-4">
                <div class="card mb-3">
                    <h5 class="card-header">{{ $task->name_en }}</h5>

                    <div class="card-body">
                        @if($task->type == 'EMO')
                            @include('frontend.user.case.partials.emo')
                        @elseif($task->type == 'NVC')
                            @include('frontend.user.case.partials.nvc')
                        @else
                            Question Not Found!
                        @endif
                    </div>
                </div>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection

@section('footer-scripts')
    <script>
        let visibleDiv = 0;
        function showDiv() {
            $(".task").fadeOut('fast').promise().done(function(){
                $(".task:eq("+ visibleDiv + ")").fadeIn('fast');
            })
            if(visibleDiv === $(".task").length-1) {
                showSubmit();
                hideNextBtn()
            }else if(visibleDiv === 0){
                hideSubmit();
                hidePrevBtn();
            }else{
                hideSubmit();
                showNextBtn();
                showPrevBtn();
            }
        }

        function showNext() {
            if(visibleDiv === $(".task").length-1) {
                visibleDiv = 0;
            }
            else {
                visibleDiv ++;
            }
            showDiv();
        }

        function showPrev() {
            if(visibleDiv === 0) {
                visibleDiv = $(".task").length-1;
            }
            else {
                visibleDiv --;
            }
            showDiv();
        }

        function showSubmit() {
            $(".submit").fadeIn('fast');
        }

        function showNextBtn() {
            $(".next-btn").fadeIn('fast');
        }

        function showPrevBtn() {
            $(".prev-btn").fadeIn('fast');
        }

        function hideSubmit() {
            $(".submit").fadeOut('fast');
        }

        function hideNextBtn() {
            $(".next-btn").fadeOut('fast');
        }

        function hidePrevBtn() {
            $(".prev-btn").fadeOut('fast');
        }
    </script>
@endsection
