@inject('model', '\App\Models\Cases')

@extends('backend.layouts.app')

@section('title', __('Create Student'))

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
                    <div class="col-6">
                        <label for="name" class="col-form-label">@lang('Name') - @lang('English')</label>

                        <input type="text" name="name_en" class="form-control" placeholder="{{ __('Name') }}" maxlength="100" required />
                    </div>

                    <div class="col-6">
                        <label for="name" class="col-form-label">@lang('Name') - @lang('Chinese')</label>

                        <input type="text" name="name_zh-TW" class="form-control" placeholder="{{ __('Name') }}" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Description') - @lang('English')</label>

                        <textarea type="text" name="description_en" class="form-control" rows="10">{{ old('description_en') }}</textarea>
                    </div>
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Description') - @lang('Chinese')</label>

                        <textarea type="text" name="description_zh-TW" class="form-control" rows="10">{{ old('description_zh-TW') }}</textarea>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Observation') - @lang('English')</label>

                        <textarea type="text" name="observes_en" class="form-control" rows="3" >{{ old('observes_en') }}</textarea>
                    </div>

                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Observation') - @lang('Chinese')</label>

                        <textarea type="text" name="observes_zh-TW" class="form-control" rows="3" >{{ old('observes_zh-TW') }}</textarea>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Perceives') - @lang('English')</label>

                        <textarea type="text" name="perceives_en" class="form-control" rows="3" >{{ old('perceives_en') }}</textarea>
                    </div>
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Perceives') - @lang('Chinese')</label>

                        <textarea type="text" name="perceives_zh-TW" class="form-control" rows="3" >{{ old('perceives_zh-TW') }}</textarea>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Needs') - @lang('English')</label>

                        <textarea type="text" name="needs_en" class="form-control" rows="3" >{{ old('needs_en') }}</textarea>
                    </div>

                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Needs') - @lang('Chinese')</label>

                        <textarea type="text" name="needs_zh-TW" class="form-control" rows="3" >{{ old('needs_zh-TW') }}</textarea>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Request') - @lang('English')</label>

                        <textarea type="text" name="request_en" class="form-control" rows="3" >{{ old('request_en') }}</textarea>
                    </div>
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Request') - @lang('Chinese')</label>

                        <textarea type="text" name="request_zh-TW" class="form-control" rows="3" >{{ old('request_zh-TW') }}</textarea>
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Case')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
