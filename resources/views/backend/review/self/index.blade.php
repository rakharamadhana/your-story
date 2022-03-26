@extends('backend.layouts.app')

@section('title', __('Self Assessments (Individual)'))

@section('content')
    <div class="card">
        @if (Auth::user()->isAdministrator())
            <div class="card-header">
                <h5 class="float-left">@lang('Self Assessment (Individual)')</h5>
            </div>
        @endif

        <div class="card-body">
            <livewire:backend.review.self-table />
        </div>
    </div>
@endsection
