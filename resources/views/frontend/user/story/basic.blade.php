@extends('frontend.layouts.app')

@section('title', 'Design A Story')

@section('background', 'bg-story-1')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">{{ $story->{'name_'.app()->getLocale()} }}</span>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="sel-card mb-3">
                    <div class="card-body my-4">
                        <form action="{{ route('frontend.user.story.basic.store',  ['storyId' => $story->id]) }}" method="post">
                            @csrf
                            <div class="mb-3 task" style="display: block">
                                <div class="mt-3 mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">@lang('When did the story take place?')</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="time" rows="4">@isset($story){{ $story->time }}@endisset</textarea>
                                </div>

                                <div class="mt-3 mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">@lang('Where does the story take place?')</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="place" rows="4">@isset($story){{ $story->place }}@endisset</textarea>
                                </div>
                            </div>

                            <div class="mb-3 task">
                                <div class="mt-3 mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">@lang('What are the characters in the story?')</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="characters" rows="4">@isset($story){{ $story->characters }}@endisset</textarea>
                                </div>

                                <div class="mt-3 mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">@lang('What is the conflict in the story?')</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="conflict" rows="4">@isset($story){{ $story->conflict }}@endisset</textarea>
                                </div>
                            </div>

                            <div class="d-grid gap-2 d-md-block float-md-right">
                                <a class="btn btn-secondary prev-btn" onclick="showPrev()" style="display:none">@lang('Back')</a>
                                <a class="btn btn-info next-btn" onclick="showNext()">@lang('Next')</a>
                                <button class="btn btn-success submit" type="submit" style="display:none">@lang('Finish')</button>
                            </div>
                        </form>
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
                showPrevBtn();
            }else if(visibleDiv === 0){
                hideSubmit();
                hidePrevBtn();
                showNextBtn();
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
