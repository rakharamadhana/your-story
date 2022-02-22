@inject('model', '\App\Models\Story')

@extends('backend.layouts.app')

@section('title', __('Update Story'))

@section('content')
    <x-forms.patch :action="route('admin.story.update', $story)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Story')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.stories')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <div class="col-6">
                        <label for="name" class="col-form-label">@lang('Name') - @lang('English')</label>

                        <input type="text" name="name_en" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name_en') ?? $story->name_en }}" maxlength="100" required />
                    </div>

                    <div class="col-6">
                        <label for="name" class="col-form-label">@lang('Name') - @lang('Chinese')</label>

                        <input type="text" name="name_zh-TW" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name_zh-TW') ?? $story->{'name_zh-TW'} }}" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-6">
                        <label for="time" class="col-form-label">@lang('Time')</label>

                        <textarea type="text" name="time" class="form-control" rows="3">{{ old('time') ?? $story->time }}</textarea>
                    </div>
                    <div class="col-6">
                        <label for="place" class="col-form-label">@lang('Place')</label>

                        <textarea type="text" name="place" class="form-control" rows="3">{{ old('place') ?? $story->place }}</textarea>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-6">
                        <label for="time" class="col-form-label">@lang('Characters')</label>

                        <textarea type="text" name="character" class="form-control" rows="3">{{ old('character') ?? $story->characters }}</textarea>
                    </div>
                    <div class="col-6">
                        <label for="place" class="col-form-label">@lang('Conflict')</label>

                        <textarea type="text" name="conflict" class="form-control" rows="3">{{ old('conflict') ?? $story->conflict }}</textarea>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-12">
                        <label for="description" class="col-form-label">@lang('Description')</label>

                        <textarea type="text" name="description" class="form-control" rows="5">{{ old('character') ?? $story->description }}</textarea>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-12">
                        <label for="outline" class="col-form-label">@lang('Outline')</label>

                        <textarea type="text" name="nvc_outline" class="form-control" rows="5">{{ old('outline') ?? $story->nvc_outline }}</textarea>
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Story')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>

    <x-backend.card>
        <x-slot name="header">
            @lang('Story Drawing')
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Audio</th>
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
                        @if($storyDrawing->audio)
                            <td><audio controls><source src="{{ URL::asset('storage/drawings/'.$story->id.'/audio/'.$storyDrawing->audio) }}" type="audio/mpeg"></audio></td>
                        @else
                            <td>-</td>
                        @endif
                        <td>{{ $storyDrawing->description }}</td>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                    <a href="{{ route('frontend.user.story.drawing.delete', ['drawingId'=> $storyDrawing->id, 'storyId' => $story->id, ]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')" data-toggle="tooltip" data-placement="top" data-method="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <div class="row justify-content-center">
                {{ $storyDrawings->links() }}
            </div>
        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Export Story (PDF)')</button>
        </x-slot>
    </x-backend.card>
@endsection

@section('footer-scripts')
    <script>

    </script>
@endsection
