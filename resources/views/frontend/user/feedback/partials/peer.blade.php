<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="sel-card mb-3">
            <div class="card-body my-4">
                <h3>@lang('Review')</h3>
                <form action="{{ route('frontend.user.feedback.store',  ['type' => 2]) }}" method="post">
                    @csrf
                    <div class="mb-3 scrollable task" style="display: block">
                        <h5>@lang('Group review')</h5>
                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think your group are having a good time working together')</label>
                            <ul class="likert">
                                <li>
                                    <label>
                                        <input type="radio" name="q1" value="1" @if($studentReview[0]->q1 == 1) checked @endif />
                                        @lang('Strongly disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q1" value="2" @if($studentReview[0]->q1 == 2) checked @endif />
                                        @lang('Disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q1" value="3" @if($studentReview[0]->q1 == 3) checked @endif />
                                        @lang('Neutral')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q1" value="4" @if($studentReview[0]->q1 == 4) checked @endif />
                                        @lang('Agree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q1" value="5" @if($studentReview[0]->q1 == 5) checked @endif />
                                        @lang('Strongly agree')
                                    </label>
                                </li>
                            </ul>
                            <br>
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think your group have a clear division of work in cooperation process')</label>
                            <ul class="likert">
                                <li>
                                    <label>
                                        <input type="radio" name="q2" value="1" @if($studentReview[0]->q2 == 1) checked @endif/>
                                        @lang('Strongly disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2" value="2" @if($studentReview[0]->q2 == 2) checked @endif/>
                                        @lang('Disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2" value="3" @if($studentReview[0]->q2 == 3) checked @endif/>
                                        @lang('Neutral')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2" value="4" @if($studentReview[0]->q2 == 4) checked @endif/>
                                        @lang('Agree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2" value="5" @if($studentReview[0]->q2 == 5) checked @endif/>
                                        @lang('Strongly agree')
                                    </label>
                                </li>
                            </ul>
                            <br>
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think your group have communicate clearly in the process of working together')</label>
                            <ul class="likert">
                                <li>
                                    <label>
                                        <input type="radio" name="q3" value="1" @if($studentReview[0]->q3 == 1) checked @endif/>
                                        @lang('Strongly disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q3" value="2" @if($studentReview[0]->q3 == 2) checked @endif/>
                                        @lang('Disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q3" value="3" @if($studentReview[0]->q3 == 3) checked @endif/>
                                        @lang('Neutral')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q3" value="4" @if($studentReview[0]->q3 == 4) checked @endif/>
                                        @lang('Agree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q3" value="5" @if($studentReview[0]->q3 == 5) checked @endif/>
                                        @lang('Strongly agree')
                                    </label>
                                </li>
                            </ul>
                            <br>
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think you guys are all responsible in the process of working together')</label>
                            <ul class="likert">
                                <li>
                                    <label>
                                        <input type="radio" name="q4" value="1" @if($studentReview[0]->q4 == 1) checked @endif/>
                                        @lang('Strongly disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q4" value="2" @if($studentReview[0]->q4 == 2) checked @endif/>
                                        @lang('Disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q4" value="3" @if($studentReview[0]->q4 == 3) checked @endif/>
                                        @lang('Neutral')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q4" value="4" @if($studentReview[0]->q4 == 4) checked @endif/>
                                        @lang('Agree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q4" value="5" @if($studentReview[0]->q4 == 5) checked @endif/>
                                        @lang('Strongly agree')
                                    </label>
                                </li>
                            </ul>
                            <br>
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think your group all put a lot of effort on making stories')</label>
                            <ul class="likert">
                                <li>
                                    <label>
                                        <input type="radio" name="q5" value="1" @if($studentReview[0]->q5 == 1) checked @endif/>
                                        @lang('Strongly disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q5" value="2" @if($studentReview[0]->q5 == 2) checked @endif/>
                                        @lang('Disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q5" value="3" @if($studentReview[0]->q5 == 3) checked @endif/>
                                        @lang('Neutral')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q5" value="4" @if($studentReview[0]->q5 == 4) checked @endif/>
                                        @lang('Agree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q5" value="5" @if($studentReview[0]->q5 == 5) checked @endif/>
                                        @lang('Strongly agree')
                                    </label>
                                </li>
                            </ul>
                            <br>
                        </div>
                    </div>

                    <div class="mb-3 scrollable task">
                        <h5>@lang('Self Reflection')</h5>
                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think you have a good time working with your team members')</label>
                            <ul class="likert">
                                <li>
                                    <label>
                                        <input type="radio" name="q2-1" value="1" @if($studentReview[1]->q1 == 1) checked @endif />
                                        @lang('Strongly disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-1" value="2" @if($studentReview[1]->q1 == 2) checked @endif />
                                        @lang('Disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-1" value="3" @if($studentReview[1]->q1 == 3) checked @endif />
                                        @lang('Neutral')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-1" value="4" @if($studentReview[1]->q1 == 4) checked @endif />
                                        @lang('Agree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-1" value="5" @if($studentReview[1]->q1 == 5) checked @endif />
                                        @lang('Strongly agree')
                                    </label>
                                </li>
                            </ul>
                            <br>
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think you have a clear division of labor with team members')</label>
                            <ul class="likert">
                                <li>
                                    <label>
                                        <input type="radio" name="q2-2" value="1" @if($studentReview[1]->q2 == 1) checked @endif/>
                                        @lang('Strongly disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-2" value="2" @if($studentReview[1]->q2 == 2) checked @endif/>
                                        @lang('Disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-2" value="3" @if($studentReview[1]->q2 == 3) checked @endif/>
                                        @lang('Neutral')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-2" value="4" @if($studentReview[1]->q2 == 4) checked @endif/>
                                        @lang('Agree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-2" value="5" @if($studentReview[1]->q2 == 5) checked @endif/>
                                        @lang('Strongly agree')
                                    </label>
                                </li>
                            </ul>
                            <br>
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think you can articulate your ideas to your team members')</label>
                            <ul class="likert">
                                <li>
                                    <label>
                                        <input type="radio" name="q2-3" value="1" @if($studentReview[1]->q3 == 1) checked @endif/>
                                        @lang('Strongly disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-3" value="2" @if($studentReview[1]->q3 == 2) checked @endif/>
                                        @lang('Disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-3" value="3" @if($studentReview[1]->q3 == 3) checked @endif/>
                                        @lang('Neutral')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-3" value="4" @if($studentReview[1]->q3 == 4) checked @endif/>
                                        @lang('Agree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-3" value="5" @if($studentReview[1]->q3 == 5) checked @endif/>
                                        @lang('Strongly agree')
                                    </label>
                                </li>
                            </ul>
                            <br>
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think you are very responsible with your team')</label>
                            <ul class="likert">
                                <li>
                                    <label>
                                        <input type="radio" name="q2-4" value="1" @if($studentReview[1]->q4 == 1) checked @endif/>
                                        @lang('Strongly disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-4" value="2" @if($studentReview[1]->q4 == 2) checked @endif/>
                                        @lang('Disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-4" value="3" @if($studentReview[1]->q4 == 3) checked @endif/>
                                        @lang('Neutral')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-4" value="4" @if($studentReview[1]->q4 == 4) checked @endif/>
                                        @lang('Agree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-4" value="5" @if($studentReview[1]->q4 == 5) checked @endif/>
                                        @lang('Strongly agree')
                                    </label>
                                </li>
                            </ul>
                            <br>
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think you put a lot of effort on making the story')</label>
                            <ul class="likert">
                                <li>
                                    <label>
                                        <input type="radio" name="q2-5" value="1" @if($studentReview[1]->q5 == 1) checked @endif/>
                                        @lang('Strongly disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-5" value="2" @if($studentReview[1]->q5 == 2) checked @endif/>
                                        @lang('Disagree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-5" value="3" @if($studentReview[1]->q5 == 3) checked @endif/>
                                        @lang('Neutral')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-5" value="4" @if($studentReview[1]->q5 == 4) checked @endif/>
                                        @lang('Agree')
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="q2-5" value="5" @if($studentReview[1]->q5 == 5) checked @endif/>
                                        @lang('Strongly agree')
                                    </label>
                                </li>
                            </ul>
                            <br>
                        </div>
                    </div>

                    <div class="mb-3 task">
                        @foreach($groupMembers as $key => $groupMember)
                        <div class="form-group row">
                            <div class="col-3">
                                <label for="class" class="col-form-label">@lang('Name')</label>

                                <input type="text" name="students[{{ ($key) }}][user_name]" class="form-control" value="{{ $groupMember->user->name_en }}" maxlength="100" disabled />
                                <input type="number" name="students[{{ ($key) }}][user_id]" class="form-control" value="{{ $groupMember->user_id }}" maxlength="100" hidden />
                            </div>
                            <div class="col-3">
                                <label for="class" class="col-form-label">@lang('Role')</label>

                                <input type="text" name="students[{{ ($key) }}][role]" class="form-control" placeholder="{{ __('Role') }}" value="@if($studentFeedbacks->count() > 0) {{ $studentFeedbacks[$key]->role }} @endif" maxlength="100" required />
                            </div>

                            <div class="col-6">
                                <label for="class" class="col-form-label">@lang('Reason')</label>

                                <input type="text" name="students[{{ ($key) }}][reason]" class="form-control" placeholder="{{ __('Reason') }}" value="@if($studentFeedbacks->count() > 0) {{ $studentFeedbacks[$key]->reason }} @endif" maxlength="100" required />
                            </div>
                        </div><!--form-group-->
                        @endforeach
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
