@inject('model', '\App\Models\Cases')

@extends('backend.layouts.app')

@section('title', __('Update Case'))

@section('content')
    <x-forms.patch :action="route('admin.case.update', $case)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Case')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.cases')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $case->name }}" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label">@lang('Description')</label>

                    <div class="col-md-10">
                        <textarea type="text" name="description" id="description" class="form-control" rows="5">{{ old('description') ?? $case->description }}</textarea>
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Case')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
