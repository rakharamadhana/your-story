@inject('model', '\App\Models\Cases')

@extends('backend.layouts.app')

@section('title', __('Update Student'))

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
                    <div class="col-6">
                        <label for="name" class="col-form-label">@lang('Name') - @lang('English')</label>

                        <input type="text" name="name_en" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name_en') ?? $case->name_en }}" maxlength="100" required />
                    </div>

                    <div class="col-6">
                        <label for="name" class="col-form-label">@lang('Name') - @lang('Chinese')</label>

                        <input type="text" name="name_zh-TW" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name_zh-TW') ?? $case->{'name_zh-TW'} }}" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Description') - @lang('English')</label>

                        <textarea type="text" name="description_en" class="form-control" rows="10">{{ old('description_en') ?? $case->description_en }}</textarea>
                    </div>
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Description') - @lang('Chinese')</label>

                        <textarea type="text" name="description_zh-TW" class="form-control" rows="10">{{ old('description_zh-TW') ?? $case->{'description_zh-TW'} }}</textarea>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Observation') - @lang('English')</label>

                        <textarea type="text" name="observes_en" class="form-control" rows="3" >{{ old('observes_en') ?? $case->{'observes_en'} }}</textarea>
                    </div>

                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Observation') - @lang('Chinese')</label>

                        <textarea type="text" name="observes_zh-TW" class="form-control" rows="3" >{{ old('observes_zh-TW') ?? $case->{'observes_zh-TW'} }}</textarea>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Perceives') - @lang('English')</label>

                        <textarea type="text" name="perceives_en" class="form-control" rows="3" >{{ old('perceives_en') ?? $case->{'perceives_en'} }}</textarea>
                    </div>
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Perceives') - @lang('Chinese')</label>

                        <textarea type="text" name="perceives_zh-TW" class="form-control" rows="3" >{{ old('perceives_zh-TW') ?? $case->{'perceives_zh-TW'} }}</textarea>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Needs') - @lang('English')</label>

                        <textarea type="text" name="needs_en" class="form-control" rows="3" >{{ old('needs_en') ?? $case->{'needs_en'} }}</textarea>
                    </div>

                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Needs') - @lang('Chinese')</label>

                        <textarea type="text" name="needs_zh-TW" class="form-control" rows="3" >{{ old('needs_zh-TW') ?? $case->{'needs_zh-TW'} }}</textarea>
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Request') - @lang('English')</label>

                        <textarea type="text" name="request_en" class="form-control" rows="3" >{{ old('request_en') ?? $case->{'request_en'} }}</textarea>
                    </div>
                    <div class="col-6">
                        <label for="email" class="col-form-label">@lang('Request') - @lang('Chinese')</label>

                        <textarea type="text" name="request_zh-TW" class="form-control" rows="3" >{{ old('request_zh-TW') ?? $case->{'request_zh-TW'} }}</textarea>
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Case')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection

@section('footer-scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#observes_en_editor' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#observes_zh-TW_editor' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#perceives_en_editor' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#perceives_zh-TW_editor' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#needs_en_editor' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#needs_zh-TW_editor' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#request_en_editor' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#request_zh-TW_editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
