@extends('backend.layouts.app')

@section('title', __('Case Management'))

@section('content')
    <div class="card">
        @if (Auth::user()->isAdministrator())
            <div class="card-header">
                <h5 class="float-left">@lang('Case Management')</h5>
                <a class="btn-sm btn-primary float-right" href="{{ route('admin.case.create') }}" role="button"><i class="cil-plus"></i> Create Case</a>
            </div>
        @endif

        <div class="card-body">
            <livewire:backend.cases-table />
        </div>
    </div>
@endsection
