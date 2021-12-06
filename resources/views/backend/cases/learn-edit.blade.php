@inject('model', '\App\Models\StudentAnswer')

@extends('backend.layouts.app')

@section('title', __('Update Case Learning'))

@section('content')
    <x-forms.patch :action="route('admin.case.learn.update', $studentAnswer)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Case Learning')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.case.learn')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <div class="col-12">
                        <label for="name" class="col-form-label">Academic Year</label>

                        <input type="text" name="name_en" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name_en') ?? $studentAnswer->user->student->academic_year }}" maxlength="100" disabled />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-6">
                        <label for="name" class="col-form-label">Grade</label>

                        <input type="text" name="name_en" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name_en') ?? $studentAnswer->user->student->grade }}" maxlength="100" disabled />
                    </div>

                    <div class="col-6">
                        <label for="name" class="col-form-label">Class</label>

                        <input type="text" name="name_zh-TW" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name_zh-TW') ?? $studentAnswer->user->student->class }}" maxlength="100" disabled />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-6">
                        <label for="name" class="col-form-label">Name</label>

                        <input type="text" name="name_en" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name_en') ?? $studentAnswer->user->name_en }}" maxlength="100" disabled />
                    </div>

                    <div class="col-6">
                        <label for="name" class="col-form-label">Student Number</label>

                        <input type="text" name="name_zh-TW" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name_zh-TW') ?? $studentAnswer->user->student->student_number }}" maxlength="100" disabled />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-6">
                        <label for="name" class="col-form-label">Case</label>

                        <input type="text" name="name_en" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name_en') ?? $studentAnswer->cases->name_en }}" maxlength="100" disabled />
                    </div>

                    <div class="col-6">
                        <label for="name" class="col-form-label">Task</label>

                        <input type="text" name="name_zh-TW" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name_zh-TW') ?? $studentAnswer->task->name_en }}" maxlength="100" disabled />
                    </div>
                </div><!--form-group-->

                @if($studentAnswer->emo_1 || $studentAnswer->emo_2)
                <div class="form-group row">
                    <div class="col-12">
                        <label for="email" class="col-form-label">Task 1 - 1</label>

                        <input type="text" name="name_zh-TW" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name_zh-TW') ?? $studentAnswer->emo_1 }}" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-12">
                        <label for="email" class="col-form-label">Task 1 - 1</label>

                        <textarea type="text" name="description_zh-TW" class="form-control" rows="3">{{ old('description_zh-TW') ?? $studentAnswer->emo_2 }}</textarea>
                    </div>
                </div><!--form-group-->
                @endif

                @if($studentAnswer->nvc_1 || $studentAnswer->nvc_2 || $studentAnswer->nvc_3 || $studentAnswer->nvc_4 || $studentAnswer->nvc_end)
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="name" class="col-form-label">Task 2 - 1</label>

                            <textarea type="text" name="description_zh-TW" class="form-control" rows="3">{{ old('description_zh-TW') ?? $studentAnswer->nvc_1 }}</textarea>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <div class="col-12">
                            <label for="name" class="col-form-label">Task 2 - 2</label>

                            <textarea type="text" name="description_zh-TW" class="form-control" rows="3">{{ old('description_zh-TW') ?? $studentAnswer->nvc_2 }}</textarea>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <div class="col-12">
                            <label for="name" class="col-form-label">Task 2 - 3</label>

                            <textarea type="text" name="description_zh-TW" class="form-control" rows="3">{{ old('description_zh-TW') ?? $studentAnswer->nvc_3 }}</textarea>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <div class="col-12">
                            <label for="name" class="col-form-label">Task 2 - 4</label>

                            <textarea type="text" name="description_zh-TW" class="form-control" rows="3">{{ old('description_zh-TW') ?? $studentAnswer->nvc_4 }}</textarea>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <div class="col-12">
                            <label for="name" class="col-form-label">Task 2 - 5</label>

                            <textarea type="text" name="description_zh-TW" class="form-control" rows="3">{{ old('description_zh-TW') ?? $studentAnswer->nvc_end }}</textarea>
                        </div>
                    </div><!--form-group-->
                @endif
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
