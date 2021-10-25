@lang("Which one of the following best describes the protagonist's emotion?")
<form action="{{ route('frontend.user.case', $case->id) }}">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="emotion" id="flexRadioDefault1" checked>
        <label class="form-check-label" for="flexRadioDefault1">
            <i class="fas fa-angry"></i> @lang('Angry')
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="emotion" id="flexRadioDefault2">
        <label class="form-check-label" for="flexRadioDefault2">
            <i class="fas fa-surprise"></i> @lang('Wronged')
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="emotion" id="flexRadioDefault3">
        <label class="form-check-label" for="flexRadioDefault3">
            <i class="fas fa-tired"></i> @lang('Anxious')
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="emotion" id="flexRadioDefault4">
        <label class="form-check-label" for="flexRadioDefault4">
            <i class="fas fa-sad-tear"></i> @lang('Helpless')
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="emotion" id="flexRadioDefault5">
        <label class="form-check-label" for="flexRadioDefault5">
            <i class="fas fa-meh-blank"></i> @lang('Other')
        </label>
    </div>

    <div class="mt-3 mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">@lang('Because')...?</label>
        <textarea name="explanation" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

    <div class="d-grid gap-2 d-md-block float-md-right">
        <a href="{{ route('frontend.user.case', $case->id) }}" class="btn btn-secondary" type="button">@lang('Back')</a>
        <button class="btn btn-success" type="submit">@lang('Submit')</button>
    </div>
</form>
