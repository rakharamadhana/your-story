@extends('frontend.layouts.app')

@section('title', 'Rate')

@section('background', 'bg-case-2')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">@lang('Rate')</span>

        <div class="mt-5">
            <h3>Name: {{ $story->name_en }}</h3>
            @if($storyType == 1)
                @include('frontend.user.feedback.partials.individual')
            @elseif($storyType == 2)
                @include('frontend.user.feedback.partials.peer')
            @else
                <h3>No Data</h3>
            @endif
        </div>
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
