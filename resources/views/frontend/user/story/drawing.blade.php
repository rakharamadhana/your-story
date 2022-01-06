@extends('frontend.layouts.app')

@section('title', $story->{'name_'.app()->getLocale()}.' - Drawing')

@section('background', 'bg-case-2')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">@lang('Design A Story')</span>
        <div class="col-md-12 mt-5 text-right">
            <a type="button" class="btn btn-primary w3-animate-top" data-toggle="modal" data-target="#uploadImageModal">
                @lang('Upload Image')
            </a>
            <a type="button" class="btn btn-primary w3-animate-top" href="{{ route('frontend.user.story.drawing.draw', ['storyId' => $story->id]) }}">
                @lang('Draw Yourself')
            </a>
        </div>
        <div class="sel-card bg-warning mt-4">
            <div class="table-responsive table-scrollable table-image container mt-4">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($storyDrawings as $index => $storyDrawing)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td class="">{{ $storyDrawing->title }}</td>
                        <td class="w-25"><img src="{{ URL::asset('storage/drawings/'.$story->id.'/'.$storyDrawing->drawing) }}" class="rounded img-thumbnail" alt=""></td>
                        <td>{{ $storyDrawing->description }}</td>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                    <a href="{{ route('frontend.user.story.drawing.delete', ['drawingId'=> $storyDrawing->id, 'storyId' => $story->id, ]) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" data-method="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!--container-->

    <!-- Modal -->
    <div class="modal-transparent modal fade" id="uploadImageModal" tabindex="-1" role="dialog" aria-labelledby="uploadImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadImageModalLabel">@lang('Upload an Image')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('frontend.user.story.drawing.upload', ['storyId' => $story->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mt-3 mb-3">
                                    <label for="title" class="form-label">@lang('Title')</label>

                                    <input type="text" name="title" class="form-control" placeholder="{{ __('Enter Title') }}" value="{{ old('title') }}" maxlength="100" required />
                                </div>
                                <div class="mt-3 mb-3">
                                    <input type="file" name="image" placeholder="Choose image" id="image">
                                </div>
                                <div class="mt-3 mb-3">
                                    <img id="preview-image" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                         alt="preview image" style="max-height: 250px;"/>
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="title" class="form-label">@lang('Description')</label>

                                    <textarea type="text" name="description" class="form-control" maxlength="255" required>Enter Description</textarea>
                                </div>
                                <div class="mt-3 mb-3">
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
