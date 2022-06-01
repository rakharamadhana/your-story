<form action="{{ route('frontend.user.case.task.store',  ['caseId' => $case->id, 'id' => $task->id]) }}" method="post">
    @csrf
    <div class="mb-3 task" style="display: block">
        @lang("Describe how the protagonist")...
        <button class="btn btn-block btn-primary" type="button">@lang('Observe the situation')</button>
        <button class="btn btn-block btn-info" type="button">@lang('Perceives the message')</button>
        <button class="btn btn-block btn-warning" type="button">@lang('Communicate his needs')</button>
        <button class="btn btn-block btn-danger" type="button">@lang('Makes request')</button>
    </div>

    <div class="mb-3 task">
        <div class="mt-3 mb-3">
            <span class="sel-sub-header h5" style="background-color: #88df6c;">@lang('Observation')</span>
            <label for="exampleFormControlTextarea1" class="form-label">@lang('Please share what you think the protagonist has observed from the highlighted sentence (Observation)')</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="nvc_1" rows="4">@isset($student_answer){{ $student_answer->nvc_1 }}@endisset</textarea>
        </div>
    </div>

    <div class="mb-3 task">
        <div class="mt-3 mb-3">
            <span class="sel-sub-header h5" style="background-color: #88df6c;">@lang('Perceives')</span>
            <label for="exampleFormControlTextarea1" class="form-label">@lang('Please share what you think the protagonist has observed from the highlighted sentence (Perceives)')</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="nvc_2" rows="4">@isset($student_answer){{ $student_answer->nvc_2 }}@endisset</textarea>
        </div>
    </div>

    <div class="mb-3 task">
        <div class="mt-3 mb-3">
            <span class="sel-sub-header h5" style="background-color: #88df6c;">@lang('Needs')</span>
            <label for="exampleFormControlTextarea1" class="form-label">@lang('Please share what you think the protagonist has observed from the highlighted sentence (Needs)')</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="nvc_3" rows="4">@isset($student_answer){{ $student_answer->nvc_3 }}@endisset</textarea>
        </div>
    </div>

    <div class="mb-3 task">
        <div class="mt-3 mb-3">
            <span class="sel-sub-header h5" style="background-color: #88df6c;">@lang('Request')</span>
            <label for="exampleFormControlTextarea1" class="form-label">@lang('Please share what you think the protagonist has observed from the highlighted sentence (Request)')</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="nvc_4" rows="4">@isset($student_answer){{ $student_answer->nvc_4 }}@endisset</textarea>
        </div>
    </div>

    <div class="d-grid gap-2 d-md-block float-md-right">
        <a class="btn btn-secondary prev-btn" onclick="showPrev()" style="display:none">@lang('Back')</a>
        <a class="btn btn-info next-btn" onclick="showNext()">@lang('Next')</a>
        <button class="btn btn-success submit" type="submit" style="display:none">@lang('Finish')</button>
    </div>
</form>
