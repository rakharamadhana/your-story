@extends('backend.layouts.app')

@section('title', __('Student Management'))

@section('content')
    <div class="card">
        @if (Auth::user()->isAdministrator())
            <div class="card-header">
                <h5 class="float-left">@lang('Student Management')</h5>
                <a class="btn-sm btn-primary float-right" href="{{ route('admin.student.create') }}" role="button"><i class="cil-plus"></i> @lang('Create Student')</a>
                <a class="btn-sm btn-success float-right mr-2" href="{{ route('admin.student.export') }}" role="button"><i class="cil-cloud-download"></i> @lang('Export Student')</a>
            </div>
        @endif

        <div class="card-body">
            <livewire:backend.students-table />
        </div>
    </div>
@endsection
