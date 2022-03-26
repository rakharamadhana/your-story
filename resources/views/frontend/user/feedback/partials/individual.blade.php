<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="sel-card mb-3">
            <div class="card-body my-4">
                <h3>@lang('Self Reflection')</h3>
                <form action="{{ route('frontend.user.feedback.store',  ['type' => 1]) }}" method="post">
                    @csrf
                    <div class="mb-3 scrollable task" style="display: block">
                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">@lang("You think you're having fun when you design the story")</label>
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
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think your creativity can be stimulated when you design the story')</label>
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
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think you can express your ideas clearly')</label>
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
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think you are responsible when you design the story')</label>
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
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think you put a lot of efforts when you design the story')</label>
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

                    <div class="d-grid gap-2 d-md-block float-md-right">
                        <a class="btn btn-secondary prev-btn" onclick="showPrev()" style="display:none">@lang('Back')</a>
                        <button class="btn btn-success submit" type="submit" style="display:block">@lang('Finish')</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--col-md-10-->
</div><!--row-->
