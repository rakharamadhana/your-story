<?php

use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\CaseController;
use App\Http\Controllers\Frontend\User\Story\StoryBasicController;
use App\Http\Controllers\Frontend\User\Story\StoryController;
use App\Http\Controllers\Frontend\User\Story\StoryDrawingController;
use App\Http\Controllers\Frontend\User\Story\StoryOutlineController;
use App\Http\Controllers\Frontend\User\TaskController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Models\Cases;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the user has not confirmed their email
 */
Route::group(['as' => 'user.', 'middleware' => ['auth', 'password.expires', config('boilerplate.access.middleware.verified')]], function () {
    /** Dashboard */
    Route::get('dashboard', [DashboardController::class, 'index'])
        ->middleware('is_user')
        ->name('dashboard')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Dashboard'), route('frontend.user.dashboard'));
        });

    /** Cases */
    Route::get('case/{id}', [CaseController::class, 'index'])
        ->middleware('is_user')
        ->name('case')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.user.cases')->push(__('Case'));
        });

    Route::group(['prefix' => 'case/{caseId}','as' => 'case.'], function () {
        Route::get('task/{id}', [TaskController::class, 'index'])
            ->middleware('is_user')
            ->name('task' )
            ->breadcrumbs(function (Trail $trail, $caseId) {
                $trail->parent('frontend.user.case', $caseId)
                    ->push(__('Task'));
            });

        Route::get('task/{id}/ending', [TaskController::class, 'ending'])
            ->middleware('is_user')
            ->name('task.ending' )
            ->breadcrumbs(function (Trail $trail, $caseId) {
                $trail->parent('frontend.user.case', $caseId)
                    ->push(__('Task'));
            });

        Route::post('task/{id}/store', [TaskController::class, 'store'])
            ->middleware('is_user')
            ->name('task.store' );

        Route::post('task/{id}/storeEnding', [TaskController::class, 'storeEnding'])
            ->middleware('is_user')
            ->name('task.storeEnding' );
    });

    /** Story */
    Route::get('stories', [StoryController::class, 'index'])
        ->middleware('is_user')
        ->name('stories')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.user.stories')->push(__('Stories'));
        });

    Route::get('story/{storyId}', [StoryController::class, 'index'])
        ->middleware('is_user')
        ->name('story')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.user.story')->push(__('Story'));
        });

    Route::post('story/store', [StoryController::class, 'store'])
        ->middleware('is_user')
        ->name('story.store' );

    Route::group(['prefix' => 'story/{storyId}','as' => 'story.'], function () {
        Route::get('basic', [StoryBasicController::class, 'index'])
            ->middleware('is_user')
            ->name('basic' )
            ->breadcrumbs(function (Trail $trail, $storyId) {
                $trail->parent('frontend.user.story', $storyId)
                    ->push(__('Story'));
            });

        Route::get('basic/description', [StoryBasicController::class, 'description'])
            ->middleware('is_user')
            ->name('basic.description' );

        Route::post('basic/store', [StoryBasicController::class, 'store'])
            ->middleware('is_user')
            ->name('basic.store' );

        Route::post('basic/storeDescription', [StoryBasicController::class, 'storeDescription'])
            ->middleware('is_user')
            ->name('basic.storeDescription' );

        Route::get('outline', [StoryOutlineController::class, 'index'])
            ->middleware('is_user')
            ->name('outline' )
            ->breadcrumbs(function (Trail $trail, $storyId) {
                $trail->parent('frontend.user.story', $storyId)
                    ->push(__('Story'));
            });

        Route::post('outline/store', [StoryOutlineController::class, 'store'])
            ->middleware('is_user')
            ->name('outline.store' );

        Route::get('drawing', [StoryDrawingController::class, 'index'])
            ->middleware('is_user')
            ->name('drawing' )
            ->breadcrumbs(function (Trail $trail, $storyId) {
                $trail->parent('frontend.user.story', $storyId)
                    ->push(__('Story'));
            });

        Route::get('drawing/draw', [StoryDrawingController::class, 'draw'])
            ->middleware('is_user')
            ->name('drawing.draw' );

        Route::post('drawing/upload', [StoryDrawingController::class, 'uploadImage'])
            ->middleware('is_user')
            ->name('drawing.upload' );

        Route::get('drawing/delete/{drawingId}', [StoryDrawingController::class, 'deleteImage'])
            ->middleware('is_user')
            ->name('drawing.delete' );
    });


    /** Account */
    Route::get('account', [AccountController::class, 'index'])
        ->name('account')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('My Account'), route('frontend.user.account'));
        });

    Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
