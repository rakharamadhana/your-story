@lang("Which one of the following best describes the protagonist's emotion?")
<form action="{{ route('frontend.user.case.task.store',  ['caseId' => $case->id, 'id' => $task->id]) }}" method="post">
    @csrf
    <div class="scrollable">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="emo_1" id="angry" value="1" @isset($student_answer) {{ $student_answer->emo_1 == '1' ? 'checked' : '' }} @endisset>
            <label class="form-check-label" for="angry">
                <img src="{{ URL::asset('img/emoticon/Angry.png') }}" class="rounded mx-auto d-block img-fluid" style="width: 150px;" alt="" title="@lang('Angry')">
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="emo_1" id="wronged" value="2" @isset($student_answer) {{ $student_answer->emo_1 == '2' ? 'checked' : '' }} @endisset>
            <label class="form-check-label" for="wronged">
                <img src="{{ URL::asset('img/emoticon/Wronged.png') }}" class="rounded mx-auto d-block img-fluid" style="width: 150px;" alt="" title="@lang('Wronged')">
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="emo_1" id="anxious" value="3" @isset($student_answer) {{ $student_answer->emo_1 == '3' ? 'checked' : '' }} @endisset>
            <label class="form-check-label" for="anxious">
                <img src="{{ URL::asset('img/emoticon/Anxious.png') }}" class="rounded mx-auto d-block img-fluid" style="width: 150px;" alt="" title="@lang('Anxious')">
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="emo_1" id="helpless" value="4" @isset($student_answer) {{ $student_answer->emo_1 == '4' ? 'checked' : '' }} @endisset>
            <label class="form-check-label" for="helpless">
                <img src="{{ URL::asset('img/emoticon/Helpless.png') }}" class="rounded mx-auto d-block img-fluid" style="width: 150px;" alt="" title="@lang('Helpless')">
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="emo_1" id="other" value="5" @isset($student_answer) {{ $student_answer->emo_1 == '5' ? 'checked' : '' }} @endisset>
            <label class="form-check-label" for="other">
                <img src="{{ URL::asset('img/emoticon/Other.png') }}" class="rounded mx-auto d-block img-fluid" style="width: 150px;" alt="" title="@lang('Other')">
            </label>
        </div>
    </div>
    <div class="mt-3 mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">@lang('May I ask where you can see it?')</label>
        <textarea name="emo_2" class="form-control" id="exampleFormControlTextarea1" rows="3" required>@isset($student_answer){{ $student_answer->emo_2 }}@endisset</textarea>
    </div>

    <div class="d-grid gap-2 d-md-block float-md-right">
        <a href="{{ route('frontend.user.case', $case->id) }}" class="btn btn-secondary" type="button">@lang('Back')</a>
        <button class="btn btn-success" type="submit">@lang('Finish')</button>
    </div>
</form>
