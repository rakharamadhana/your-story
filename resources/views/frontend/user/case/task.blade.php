@extends('frontend.layouts.app')

@section('title', $case->{'name_'.app()->getLocale()}." - ".$task->{'name_'.app()->getLocale()})

@section('background', 'bg-case-1')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3" style="background-color: #88df6c;">{{ $case->{'name_'.app()->getLocale()} }}</span>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="sel-card mb-3">
                    <div class="card-body my-4">
                        @if($task->type == 'EMO')
                            <p class="card-text scrollable mt-4" id="inputText">{{ $case->{'description_'.app()->getLocale()} }}</p>
                        @elseif($task->type == 'NVC')
                            <p class="card-text scrollable mt-4 task-description" id="inputText"  style="display: block">{{ $case->{'description_'.app()->getLocale()} }}</p>
                        @else
                            Question Not Found!
                        @endif
                        <p class="card-text mt-4 task-description" id="inputText">{{ $case->{'observes_'.app()->getLocale()} }}</p>
                        <p class="card-text mt-4 task-description" id="inputText">{{ $case->{'perceives_'.app()->getLocale()} }}</p>
                        <p class="card-text mt-4 task-description" id="inputText">{{ $case->{'needs_'.app()->getLocale()} }}</p>
                        <p class="card-text mt-4 task-description" id="inputText">{{ $case->{'request_'.app()->getLocale()} }}</p>
                    </div>
                </div>
            </div><!--col-md-10-->

            <span class="sel-sub-header h5" style="background-color: #88df6c;">{{ $task->{'name_'.app()->getLocale()} }}</span>
            <div class="col-md-4">
                <div class="sel-card mb-3 w3-animate-right">
                    <div class="card-body my-4">
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
        function customMark(text) {
            let inputText = document.getElementById("inputText");
            let innerHTML = inputText.innerHTML;
            let index = innerHTML.indexOf(text);
            if (index >= 0) {
                innerHTML = innerHTML.substring(0,index) + "<span class='highlight'>" + innerHTML.substring(index,index+text.length) + "</span>" + innerHTML.substring(index + text.length);
                inputText.innerHTML = innerHTML;
            }
        }

        let visibleDiv = 0;
        function showDiv() {
            $(".task-description").fadeOut('fast').promise().done(function(){
                $(".task-description:eq("+ visibleDiv + ")").fadeIn('fast');
            })
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
