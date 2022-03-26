@extends('backend.layouts.app')

@section('title', __('Case Learning Progress'))

@section('content')
    <div class="card">
        @if (Auth::user()->isAdministrator())
            <div class="card-header">
                <h5 class="float-left">@lang('Case Learning Progress')</h5>
                <a class="btn-sm btn-success float-right" href="{{ route('admin.case.learn.export') }}" role="button"><i class="cil-cloud-download"></i> @lang('Export Student Learning')</a>
            </div>
        @endif

        <div class="card-body">
            <livewire:backend.case-learn-table />
        </div>
    </div>
@endsection
