<form action="{{ route('frontend.user.case', $case->id) }}">
    <div class="mb-3 task" style="display: block">
        @lang("Describe how the protagonist")...
        <button class="btn btn-block btn-primary" type="button">@lang('Observe the situation')</button>
        <button class="btn btn-block btn-info" type="button">@lang('Perceives the message')</button>
        <button class="btn btn-block btn-warning" type="button">@lang('Communicate his needs')</button>
        <button class="btn btn-block btn-danger" type="button">@lang('Makes request')</button>
    </div>

    <div class="mb-3 task">
        <div class="mt-3 mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">@lang('Please share what you think the protagonist has observed from the highlighted sentence')</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>

    <div class="mb-3 task">
        <div class="mt-3 mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">@lang('Please share what you think the protagonist has observed from the highlighted sentence')</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>

    <div class="mb-3 task">
        <div class="mt-3 mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">@lang('Please share what you think the protagonist has observed from the highlighted sentence')</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>

    <div class="mb-3 task">
        <div class="mt-3 mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">@lang('Please share what you think the protagonist has observed from the highlighted sentence')</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>

    <div class="mb-3 task">
        <div class="mt-3 mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">@lang('Predict how the scenario should evolve to reach a happy ending')</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>

    <div class="d-grid gap-2 d-md-block float-md-right">
        <a class="btn btn-secondary prev-btn" onclick="showPrev()" style="display:none">@lang('Back')</a>
        <a class="btn btn-info next-btn" onclick="showNext()">@lang('Next')</a>
        <button class="btn btn-success submit" type="submit" style="display:none">@lang('Submit')</button>
    </div>
</form>
