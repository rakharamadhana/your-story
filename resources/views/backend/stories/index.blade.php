@extends('backend.layouts.app')

@section('title', __('Stories Management'))

@section('content')
    <div class="card">
        @if (Auth::user()->isAdministrator())
            <div class="card-header">
                <h5 class="float-left">@lang('Stories Management')</h5>
                <a class="btn-sm btn-primary float-right" href="{{ route('admin.story.create') }}" role="button"><i class="cil-plus"></i> Create Story</a>
            </div>
        @endif

        <div class="card-body">
            <livewire:backend.stories-table />
        </div>
    </div>
@endsection
