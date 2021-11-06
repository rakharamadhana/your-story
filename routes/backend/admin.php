<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Case\CasesController;
use App\Http\Controllers\Backend\Student\StudentController;
use App\Models\Cases;
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

    Route::post('/', [CasesController::class, 'store'])->name('store');

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
});
