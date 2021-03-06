<?php

namespace App\Http\Livewire\Backend;

use App\Models\Cases;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class CasesTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make(__('Case (English)'),'name_en')
                ->sortable()
                ->searchable(),
            Column::make(__('Case (Chinese)'),'name_zh-TW')
                ->sortable()
                ->searchable(),
            Column::make(__('Created At'), 'created_at')
                ->sortable(function(Builder $query, $direction) {
                    return $query->orderBy('created_at',$direction);
                }),
            Column::make(__('Update At'), 'updated_at')
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
        return Cases::query();
    }

    public function rowView(): string
    {
        return 'backend.cases.includes.row';
    }
}
