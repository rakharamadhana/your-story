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
                        <a href="{{ route('frontend.user.case.task', ['caseId' => $case->id, 'id' => $task->id]) }}" class="btn btn-info float-right"><i class="fas fa-edit"></i>@lang('Edit')</a>
                        <h3>@lang('Observe the situation')</h3>
                        <p class="card-text scrollable">{{ $student_answer->nvc_1 }}</p>
                        <h3>@lang('Perceives the message')</h3>
                        <p class="card-text scrollable">{{ $student_answer->nvc_2 }}</p>
                        <h3>@lang('Communicate his needs')</h3>
                        <p class="card-text scrollable">{{ $student_answer->nvc_3 }}</p>
                        <h3>@lang('Makes request')</h3>
                        <p class="card-text scrollable">{{ $student_answer->nvc_4 }}</p>
                    </div>
                </div>
            </div><!--col-md-10-->

            <span class="sel-sub-header h5" style="background-color: #88df6c;">{{ $task->name_en }}</span>
            <div class="col-md-4">
                <div class="sel-card mb-3 w3-animate-right">
                    <div class="card-body my-4">
                        <div class="mb-3">
                            <form action="{{ route('frontend.user.case.task.storeEnding',  ['caseId' => $case->id, 'id' => $task->id]) }}" method="post">
                                @csrf
                                <div class="mt-3 mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">@lang('Predict how the scenario should evolve to reach a happy ending')</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="nvc_end" rows="5">@isset($student_answer){{ $student_answer->nvc_end }}@endisset</textarea>
                                </div>

                                <div class="d-grid gap-2 d-md-block float-md-right">
                                    <button class="btn btn-success submit" type="submit" >@lang('Submit')</button>
                                </div>
                            </form>
                        </div>
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