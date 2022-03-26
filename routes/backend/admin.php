<?php

use App\Http\Controllers\Backend\Case\CaseLearningController;
use App\Http\Controllers\Backend\Case\CasesController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Review\ReviewGroupController;
use App\Http\Controllers\Backend\Review\ReviewGroupSelfController;
use App\Http\Controllers\Backend\Review\ReviewSelfController;
use App\Http\Controllers\Backend\Story\StoryController;
use App\Http\Controllers\Backend\Student\StudentController;
use App\Models\Cases;
use App\Models\Story;
use App\Models\Student;
use App\Models\StudentAnswer;
use App\Models\StudentReview;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

Route::get('cases', [CasesController::class, 'index'])
    ->name('cases')
    ->breadcrumbs(function (Trail $trail) {

        $trail->parent('admin.dashboard')
            ->push(__('Cases'), route('admin.cases'));
    });

Route::get('stories', [StoryController::class, 'index'])
    ->name('stories')
    ->breadcrumbs(function (Trail $trail) {

        $trail->parent('admin.dashboard')
            ->push(__('Stories'), route('admin.stories'));
    });

Route::get('student', [StudentController::class, 'index'])
    ->name('student')
    ->breadcrumbs(function (Trail $trail) {

        $trail->parent('admin.dashboard')
            ->push(__('Student'), route('admin.student'));
    });

Route::group(['prefix' => 'case','as' => 'case.'], function () {
    Route::get('create', [CasesController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cases')
                ->push(__('Create Case'), route('admin.case.create'));
        });

    Route::get('learn', [CaseLearningController::class, 'index'])
        ->name('learn')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cases')
                ->push(__('Case Learning'), route('admin.case.learn'));
        });

    Route::group(['prefix' => '{case}'], function () {
        Route::get('edit', [CasesController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Cases $user) {
                $trail->parent('admin.cases', $user)
                    ->push(__('Edit'), route('admin.case.edit', $user));
            });

        Route::patch('/', [CasesController::class, 'update'])->name('update');
        Route::delete('/', [CasesController::class, 'destroy'])->name('destroy');
    });

    Route::post('/', [CasesController::class, 'store'])->name('store');

    Route::group(['prefix' => 'learn/{studentAnswer}'], function () {
        Route::get('edit', [CaseLearningController::class, 'edit'])
            ->name('learn.edit');

        Route::patch('/', [CaseLearningController::class, 'update'])->name('learn.update');
        Route::delete('/', [CaseLearningController::class, 'destroy'])->name('learn.destroy');
    });

    Route::get('learn-export', [CaseLearningController::class, 'export'])->name('learn.export');
});

Route::group(['prefix' => 'story','as' => 'story.'], function () {
    Route::get('create', [StoryController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.stories')
                ->push(__('Create Story'), route('admin.story.create'));
        });

    Route::group(['prefix' => '{story}'], function () {
        Route::get('edit', [StoryController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Story $user) {
                $trail->parent('admin.stories', $user)
                    ->push(__('Edit'), route('admin.story.edit', $user));
            });

        Route::patch('/', [StoryController::class, 'update'])->name('update');
        Route::delete('/', [StoryController::class, 'destroy'])->name('destroy');
    });

    Route::post('/', [StoryController::class, 'store'])->name('store');
});

Route::group(['prefix' => 'review','as' => 'review.'], function () {
    Route::get('group', [ReviewGroupController::class, 'index'])
        ->name('group');

    Route::group(['prefix' => 'group/{studentReview}','as' => 'group.'], function () {
        Route::get('edit', [ReviewGroupController::class, 'edit'])
            ->name('edit');

        Route::patch('/', [ReviewGroupController::class, 'update'])->name('update');
        Route::delete('/', [ReviewGroupController::class, 'destroy'])->name('destroy');
    });

    Route::get('group-self', [ReviewGroupSelfController::class, 'index'])
        ->name('group-self');

    Route::group(['prefix' => 'group-self/{studentReview}','as' => 'group-self.'], function () {
        Route::get('edit', [ReviewGroupSelfController::class, 'edit'])
            ->name('edit');

        Route::patch('/', [ReviewGroupSelfController::class, 'update'])->name('update');
        Route::delete('/', [ReviewGroupSelfController::class, 'destroy'])->name('destroy');
    });

    Route::get('self', [ReviewSelfController::class, 'index'])
        ->name('self');

    Route::group(['prefix' => 'self/{studentReview}','as' => 'self.'], function () {
        Route::get('edit', [ReviewSelfController::class, 'edit'])
            ->name('edit');

        Route::patch('/', [ReviewSelfController::class, 'update'])->name('update');
        Route::delete('/', [ReviewSelfController::class, 'destroy'])->name('destroy');
    });
});

Route::group(['prefix' => 'student','as' => 'student.'], function () {
    Route::get('create', [StudentController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.student')
                ->push(__('Create Student'), route('admin.student.create'));
        });

    Route::post('/', [StudentController::class, 'store'])->name('store');

    Route::group(['prefix' => '{student}'], function () {
        Route::get('edit', [StudentController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Student $user) {
                $trail->parent('admin.student', $user)
                    ->push(__('Edit'), route('admin.student.edit', $user));
            });

        Route::patch('/', [StudentController::class, 'update'])->name('update');
        Route::delete('/', [StudentController::class, 'destroy'])->name('destroy');
    });

    Route::get('export', [StudentController::class, 'export'])->name('export');
});
