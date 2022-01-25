<h3>Individual Review</h3>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="sel-card mb-3">
            <div class="card-body my-4">
                <form action="{{ route('frontend.user.story.basic.store',  ['storyId' => $story->id]) }}" method="post">
                    @csrf
                    <div class="mb-3 scrollable task" style="display: block">
                        <div class="mt-3 mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('When did the story take place?')</label>
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
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('Where does the story take place?')</label>
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
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('Where does the story take place?')</label>
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
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('Where does the story take place?')</label>
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
                            <label for="exampleFormControlTextarea1" class="form-label">@lang('Where does the story take place?')</label>
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

                    <div class="d-grid gap-2 d-md-block float-md-right">
                        <a class="btn btn-secondary prev-btn" onclick="showPrev()" style="display:none">@lang('Back')</a>
                        <button class="btn btn-success submit" type="submit" style="display:block">@lang('Finish')</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--col-md-10-->
</div><!--row-->
