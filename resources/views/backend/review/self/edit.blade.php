@inject('model', '\App\Models\StudentReview')

@extends('backend.layouts.app')

@section('title', __('Update Review'))

@section('content')
    <x-forms.patch :action="route('admin.review.self.update', $studentReview)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Review')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.stories')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <div class="col-12">
                        <label for="name" class="col-form-label">@lang('Name') - @lang('English')</label>

                        <input type="text" name="name_en" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name_en') ?? $studentReview->user->name_en }}" maxlength="100" required />
                    </div>
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col">
                        <label for="name" class="col-form-label">@lang('Q1')</label>

                        <input type="text" name="q1" class="form-control" placeholder="{{ __('q1') }}" value="{{ old('q1') ?? $studentReview->q1 }}" maxlength="100" required />
                    </div>

                    <div class="col">
                        <label for="name" class="col-form-label">@lang('Q2')</label>

                        <input type="text" name="q1" class="form-control" placeholder="{{ __('q2') }}" value="{{ old('q2') ?? $studentReview->q2 }}" maxlength="100" required />
                    </div>

                    <div class="col">
                        <label for="name" class="col-form-label">@lang('Q3')</label>

                        <input type="text" name="q1" class="form-control" placeholder="{{ __('q3') }}" value="{{ old('q3') ?? $studentReview->q3 }}" maxlength="100" required />
                    </div>

                    <div class="col">
                        <label for="name" class="col-form-label">@lang('Q4')</label>

                        <input type="text" name="q1" class="form-control" placeholder="{{ __('q4') }}" value="{{ old('q4') ?? $studentReview->q4 }}" maxlength="100" required />
                    </div>

                    <div class="col">
                        <label for="name" class="col-form-label">@lang('Q5')</label>

                        <input type="text" name="q1" class="form-control" placeholder="{{ __('q5') }}" value="{{ old('q5') ?? $studentReview->q5 }}" maxlength="100" required />
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Review')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection

@section('footer-scripts')
    <script>

    </script>
@endsection
