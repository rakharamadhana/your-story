@extends('backend.layouts.app')

@section('title', __('Group Reviews'))

@section('content')
    <div class="card">
        @if (Auth::user()->isAdministrator())
            <div class="card-header">
                <h5 class="float-left">@lang('Group Reviews')</h5>
            </div>
        @endif

        <div class="card-body">
            <livewire:backend.review.group-table />
        </div>
    </div>
@endsection
