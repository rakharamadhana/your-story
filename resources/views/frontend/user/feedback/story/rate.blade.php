@extends('frontend.layouts.app')

@section('title', 'Rate')

@section('background', 'bg-case-2')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">@lang('Review Stories')</span>

        <div class="mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-5 text-right">
                    <a type="button" class="btn btn-primary w3-animate-top" href="{{ route('frontend.user.feedback.story.preview', ['storyId' => $story->id]) }}">
                        @lang('Preview')
                    </a>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="sel-card mb-3">
                        <div class="card-body my-4">
                            <form action="{{ route('frontend.user.feedback.story.rate.store',  ['storyId' => $story->id]) }}" method="post">
                                @csrf
                                <div class="mb-3 scrollable task" style="display: block">
                                    <div class="mt-3 mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">@lang('The sound effects of the story soundtrack are clear and in line with the story presentation')</label>
                                        <ul class="likert">
                                            <li>
                                                <label>
                                                    <input type="radio" name="q1" value="1" @if($storyReview->q1 == 1) checked @endif />
                                                    @lang('Strongly disagree')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q1" value="2" @if($storyReview->q1 == 2) checked @endif />
                                                    @lang('Disagree')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q1" value="3" @if($storyReview->q1 == 3) checked @endif />
                                                    @lang('Neutral')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q1" value="4" @if($storyReview->q1 == 4) checked @endif />
                                                    @lang('Agree')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q1" value="5" @if($storyReview->q1 == 5) checked @endif />
                                                    @lang('Strongly agree')
                                                </label>
                                            </li>
                                        </ul>
                                        <br>
                                    </div>

                                    <div class="mt-3 mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">@lang('I can understand the story')</label>
                                        <ul class="likert">
                                            <li>
                                                <label>
                                                    <input type="radio" name="q2" value="1" @if($storyReview->q2 == 1) checked @endif/>
                                                    @lang('Strongly disagree')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q2" value="2" @if($storyReview->q2 == 2) checked @endif/>
                                                    @lang('Disagree')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q2" value="3" @if($storyReview->q2 == 3) checked @endif/>
                                                    @lang('Neutral')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q2" value="4" @if($storyReview->q2 == 4) checked @endif/>
                                                    @lang('Agree')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q2" value="5" @if($storyReview->q2 == 5) checked @endif/>
                                                    @lang('Strongly agree')
                                                </label>
                                            </li>
                                        </ul>
                                        <br>
                                    </div>

                                    <div class="mt-3 mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">@lang('The logic of the story is presented in order, with a good sequence')</label>
                                        <ul class="likert">
                                            <li>
                                                <label>
                                                    <input type="radio" name="q3" value="1" @if($storyReview->q3 == 1) checked @endif/>
                                                    @lang('Strongly disagree')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q3" value="2" @if($storyReview->q3 == 2) checked @endif/>
                                                    @lang('Disagree')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q3" value="3" @if($storyReview->q3 == 3) checked @endif/>
                                                    @lang('Neutral')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q3" value="4" @if($storyReview->q3 == 4) checked @endif/>
                                                    @lang('Agree')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q3" value="5" @if($storyReview->q3 == 5) checked @endif/>
                                                    @lang('Strongly agree')
                                                </label>
                                            </li>
                                        </ul>
                                        <br>
                                    </div>

                                    <div class="mt-3 mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">@lang('The drawing and script design of the story helps to improve the exhibition effect (without too many easily distracting elements)')</label>
                                        <ul class="likert">
                                            <li>
                                                <label>
                                                    <input type="radio" name="q4" value="1" @if($storyReview->q4 == 1) checked @endif/>
                                                    @lang('Strongly disagree')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q4" value="2" @if($storyReview->q4 == 2) checked @endif/>
                                                    @lang('Disagree')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q4" value="3" @if($storyReview->q4 == 3) checked @endif/>
                                                    @lang('Neutral')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q4" value="4" @if($storyReview->q4 == 4) checked @endif/>
                                                    @lang('Agree')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q4" value="5" @if($storyReview->q4 == 5) checked @endif/>
                                                    @lang('Strongly agree')
                                                </label>
                                            </li>
                                        </ul>
                                        <br>
                                    </div>

                                    <div class="mt-3 mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">@lang('Organizing the story presents well')</label>
                                        <ul class="likert">
                                            <li>
                                                <label>
                                                    <input type="radio" name="q5" value="1" @if($storyReview->q5 == 1) checked @endif/>
                                                    @lang('Strongly disagree')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q5" value="2" @if($storyReview->q5 == 2) checked @endif/>
                                                    @lang('Disagree')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q5" value="3" @if($storyReview->q5 == 3) checked @endif/>
                                                    @lang('Neutral')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q5" value="4" @if($storyReview->q5 == 4) checked @endif/>
                                                    @lang('Agree')
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="q5" value="5" @if($storyReview->q5 == 5) checked @endif/>
                                                    @lang('Strongly agree')
                                                </label>
                                            </li>
                                        </ul>
                                        <br>
                                    </div>

                                    <div class="mt-3 mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">@lang('What was your favorite point in your classmate story?')</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="q6" rows="4">@isset($storyReview){{ $storyReview->q6 }}@endisset</textarea>
                                    </div>

                                    <div class="mt-3 mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">@lang('What would you like to know more about or think could be improved from your classmates stories?')</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="q7" rows="4">@isset($storyReview){{ $storyReview->q7 }}@endisset</textarea>
                                    </div>
                                </div>

                                <div class="d-grid gap-2 d-md-block float-md-right">
                                    <a class="btn btn-secondary prev-btn" onclick="showPrev()" style="display:none">@lang('Back')</a>
                                    <button class="btn btn-success submit" type="submit" style="display:block">@lang('Finish')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--col-md-10-->
            </div><!--row-->
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
