@extends('frontend.layouts.app')

@section('title', $story->{'name_'.app()->getLocale()}.' - Edit Image')

@section('background', 'bg-story-1')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">{{ $story->{'name_'.app()->getLocale()} }} - @lang('Edit Image')</span>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="sel-card mb-3">
                    <div class="card-body my-4">
                        <div class="mb-3">
                            <div class="row scrollable">
                                <div class="col">
                                    <form action="{{ route('frontend.user.story.drawing.update', ['storyId' => $story->id, 'drawingId' => $storyDrawing->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mt-3 mb-3">
                                            <label for="title" class="form-label">@lang('Title')</label>

                                            <input type="text" name="title" class="form-control" placeholder="{{ __('Enter Title') }}" value="{{ $storyDrawing->title }}" maxlength="100" required />
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <label for="category" class="form-label">@lang('Category')</label>

                                            <input type="number" name="category" class="form-control" placeholder="@lang('Enter Category')" value="{{ $storyDrawing->category }}" maxlength="100" required />
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <label for="image" class="form-label">@lang('Upload Image')</label>

                                            <input type="file" name="image" placeholder="@lang('Choose image')" id="image">
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <img id="preview-image" src="{{ URL::asset('storage/drawings/'.$userId.'/'.$story->id.'/'.$storyDrawing->drawing) }}"
                                                 style="max-height: 150px;"/>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <label for="title" class="form-label">@lang('Description')</label>

                                            <textarea type="text" name="description" class="form-control" maxlength="255" required>{{ $storyDrawing->description }}</textarea>
                                        </div>
                                        <div class="mt-3 mb-3">
                                            @if($storyDrawing->audio)
                                                <audio controls onplay="playVoice(this)" id="voice"><source src="{{ URL::asset('storage/drawings/'.$userId.'/'.$story->id.'/audio/'.$storyDrawing->audio) }}" type="audio/mpeg"></audio>
                                            @else
                                                <p>@lang('No Audio')</p>
                                            @endif
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <label for="audio" class="form-label">@lang('Upload Audio')</label>

                                            <input type="file" name="audio" placeholder="@lang('Choose audio')" id="audio">
                                        </div>
                                        <div class="mt-3 mb-3">
                                            <button type="submit" class="btn btn-success">@lang('Upload')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection

@push('after-scripts')
    <script type="text/javascript">
        $(document).ready(function (e) {
            $('#image').change(function(){

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endpush
