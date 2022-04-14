@extends('frontend.layouts.app')

@section('title', $story->{'name_'.app()->getLocale()}.' - Preview')

@section('background', 'bg-case-2')

@section('content')
    <div class="container py-4">
        <div class="col-md-12 text-right">
            <a type="button" class="btn btn-primary w3-animate-top" href="{{ route('frontend.user.story.drawing', ['storyId' => $story->id]) }}">
                @lang('Back to Drawing')
            </a>
        </div>
        @foreach($storyDrawings as $key => $storyDrawing)
        <div name="drawing" class="mb-3 task" style="{{ $key == 0 ? "display: block" : "" }}">
            <h3>{{ $key+1 }}</h3>
            <h4>{{ $storyDrawing->title }}</h4>
            <img src="{{ URL::asset('storage/drawings/'.$story->id.'/'.$storyDrawing->drawing) }}" class="rounded img-thumbnail" alt="">
            <p>{{ $storyDrawing->description }}</p>
            <div class="row">
                <div class="col-6">
                    <p>@lang('Audio')</p>
                    @if($storyDrawing->audio)
                        <audio controls onplay="playVoice(this)" id="voice"><source src="{{ URL::asset('storage/drawings/'.$story->id.'/audio/'.$storyDrawing->audio) }}" type="audio/mpeg"></audio>
                    @else
                        <p>@lang('No Audio')</p>
                    @endif
                </div>
                <div class="col-6">
                    <p>@lang('BGM')</p>
                    @if($storyDrawing->music)
                        <audio controls onplay="playMusic(this)" id="bgm"><source src="{{ URL::asset('storage/drawings/'.$story->id.'/audio/'.$storyDrawing->music->audio) }}" type="audio/mpeg"></audio>
                    @else
                        <p>@lang('No BGM')</p>
                    @endif
                </div>
            </div>

        </div>
        @endforeach

        <div class="d-grid gap-2 d-md-block float-md-right">
            <a class="btn btn-secondary prev-btn" onclick="showPrev()" style="display:none">@lang('Back')</a>
            <a class="btn btn-info next-btn" onclick="showNext()">@lang('Next')</a>
            <a href="{{ route('frontend.user.story.drawing', ['storyId' => $story->id]) }}" class="btn btn-success submit" style="display:none">@lang('Finish')</a>
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

        function playVoice(voice) {
            voice.volume = 1.0
            $("audio").not(voice).each(function(index,audio){
                if(audio.id === voice.id){
                    audio.pause();
                    audio.currentTime = 0;
                }
            })
        }

        function playMusic(bgm) {
            bgm.volume = 0.1
            $("audio").not(bgm).each(function(index,audio){
                if(audio.id === bgm.id){
                    audio.pause();
                    audio.currentTime = 0;
                }
            })
        }
    </script>
@endsection
