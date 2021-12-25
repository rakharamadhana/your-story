@extends('frontend.layouts.app')

@section('title', $story->{'name_'.app()->getLocale()}.' - Drawing')

@section('background', 'bg-case-2')

@section('content')
    <div class="container py-4 mt-lg-5">
        <span class="sel-header h3 w3-animate-top" style="background-color: #88df6c;">@lang('Design A Story')</span>
        <div class="col-md-12 mt-5 text-right">
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
                        <td class="w-25"><img src="{{ URL::asset('storage/drawings/'.$storyDrawing->drawing) }}" class="rounded img-thumbnail" alt=""></td>
                        <td>{{ $storyDrawing->description }}</td>
                        <td>
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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


@endsection
