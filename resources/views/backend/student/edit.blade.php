@inject('model', '\App\Models\Student')

@extends('backend.layouts.app')

@section('title', __('Update Student'))

@section('content')
    <x-forms.patch :action="route('admin.student.update', $student)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Student')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.student')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <div class="col-12">
                        <label for="academic_year" class="col-form-label">@lang('Academic Year')</label>

                        <input type="text" name="academic_year" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('academic_year') ?? $student->academic_year }}" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-12">
                        <label for="name" class="col-form-label">@lang('Grade')</label>

                        <input type="text" name="grade" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('grade') ?? $student->grade }}" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-12">
                        <label for="class" class="col-form-label">@lang('Class')</label>

                        <input type="text" name="class" class="form-control" placeholder="{{ __('Class') }}" value="{{ old('class') ?? $student->class }}" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-12">
                        <label for="student_number" class="col-form-label">@lang('Student Number')</label>

                        <input type="text" name="student_number" class="form-control" placeholder="{{ __('Student Number') }}" value="{{ old('student_number') ?? $student->student_number }}" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-12">
                        <label for="user_id" class="col-form-label">@lang('Account')</label>

                        <select class="form-control" id="user_id" name="user_id">
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ 'ID: '.$user->id.' | Name: '.$user->name_en.' | Email: '.$user->email }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Student')</button>
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
