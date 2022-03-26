<?php

namespace App\Http\Livewire\Backend\Review;

use App\Models\Cases;
use App\Models\StudentReview;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class SelfTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make(__('Name'))
                ->sortable()
                ->searchable(),
            Column::make(__('q1'))
                ->sortable()
                ->searchable(),
            Column::make(__('q2'))
                ->sortable()
                ->searchable(),
            Column::make(__('q3'))
                ->sortable()
                ->searchable(),
            Column::make(__('q4'))
                ->sortable()
                ->searchable(),
            Column::make(__('q5'))
                ->sortable()
                ->searchable(),
            Column::make(__('Created At'), 'created_at')
                ->sortable(function(Builder $query, $direction) {
                    return $query->orderBy('created_at',$direction);
                }),
            Column::make(__('Updated At'), 'updated_at')
                ->sortable(function(Builder $query, $direction) {
                    return $query->orderBy('updated_at',$direction);
                }),
            Column::make(__('Actions')),
        ];
    }

//    public function filters(): array
//    {
//        return [
//            'name' => Filter::make('Name')
//                ->select([
//                    '' => 'Any',
//                    Cases::TYPE_ADMIN => 'Administrators',
//                    Cases::TYPE_USER => 'Users',
//                ]),
//        ];
//    }

    public function query(): Builder
    {
        return StudentReview::query()->where('type',1)
            ->with(['user','group']);;
    }

    public function rowView(): string
    {
        return 'backend.review.self.includes.row';
    }
}
