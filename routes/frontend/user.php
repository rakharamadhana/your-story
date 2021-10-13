<?php

use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\CasesController;
use App\Http\Controllers\Frontend\User\CaseController;
use App\Http\Controllers\Frontend\User\Task1Controller;
use App\Http\Controllers\Frontend\User\Task2Controller;
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
    Route::get('cases', [CasesController::class, 'index'])
        ->middleware('is_user')
        ->name('cases')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Cases'), route('frontend.user.cases'));
        });

    Route::get('case/{id}', [CaseController::class, 'index'])
        ->middleware('is_user')
        ->name('case')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.user.cases')->push(__('Case'));
        });

    Route::group(['prefix' => 'case/{id}','as' => 'case.'], function () {
        Route::get('task1', [Task1Controller::class, 'index'])
            ->middleware('is_user')
            ->name('task1')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('frontend.user.case')
                    ->push(__('Task 1'));
            });

        Route::get('task2', [Task2Controller::class, 'index'])
            ->middleware('is_user')
            ->name('task2')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('frontend.user.case')
                    ->push(__('Task 2'));
            });
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
