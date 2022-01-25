<h3>Peer Review</h3>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="sel-card mb-3">
            <div class="card-body my-4">
                <form action="{{ route('frontend.user.story.basic.store',  ['storyId' => $story->id]) }}" method="post">
                    @csrf
                    <div class="mb-3 scrollable task" style="display: block">
                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think your group are having a good time working together')</label>
                            <ul class="likert">
                                <li>
                                    <label>
                                        <input type="radio" name="feedback1" value="1" />
                                        Strongly disagree
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback1" value="2" />
                                        Disagree
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback1" value="3" />
                                        Neutral
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback1" value="4" />
                                        Agree
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback1" value="5" />
                                        Strongly agree
                                    </label>
                                </li>
                            </ul>
                            <br>
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('You think your group have a clear division of work in  cooperation process')</label>
                            <ul class="likert">
                                <li>
                                    <label>
                                        <input type="radio" name="feedback2" value="1" />
                                        Strongly disagree
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback2" value="2" />
                                        Disagree
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback2" value="3" />
                                        Neutral
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback2" value="4" />
                                        Agree
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback2" value="5" />
                                        Strongly agree
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
                                        <input type="radio" name="feedback3" value="1" />
                                        Strongly disagree
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback3" value="2" />
                                        Disagree
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback3" value="3" />
                                        Neutral
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback3" value="4" />
                                        Agree
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback3" value="5" />
                                        Strongly agree
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
                                        <input type="radio" name="feedback4" value="1" />
                                        Strongly disagree
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback4" value="2" />
                                        Disagree
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback4" value="3" />
                                        Neutral
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback4" value="4" />
                                        Agree
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback4" value="5" />
                                        Strongly agree
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
                                        <input type="radio" name="feedback5" value="1" />
                                        Strongly disagree
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback5" value="2" />
                                        Disagree
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback5" value="3" />
                                        Neutral
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback5" value="4" />
                                        Agree
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="feedback5" value="5" />
                                        Strongly agree
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

                                <input type="text" name="students[{{ ($key) }}][role]" class="form-control" placeholder="{{ __('Role') }}" value="{{ old('role') }}" maxlength="100" required />
                            </div>

                            <div class="col-6">
                                <label for="class" class="col-form-label">@lang('Reason')</label>

                                <input type="text" name="students[{{ ($key) }}][reason]" class="form-control" placeholder="{{ __('Reason') }}" value="{{ old('reason') }}" maxlength="100" required />
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
