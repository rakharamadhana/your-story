@inject('model', '\App\Models\Cases')

@extends('backend.layouts.app')

@section('title', __('Create Case'))

@section('content')
    <x-forms.post :action="route('admin.case.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Case')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">@lang('Description')</label>

                    <div class="col-md-10">
                        <textarea type="text" name="description" class="form-control">{{ old('description') }}</textarea>
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Case')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
