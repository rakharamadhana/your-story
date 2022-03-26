<?php

namespace App\Http\Livewire\Backend;

use App\Models\Story;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class StoriesTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make(__('Story (English)'),'name_en')
                ->sortable()
                ->searchable(),
            Column::make(__('Story (Chinese)'),'name_zh-TW')
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
        return Story::query();
    }

    public function rowView(): string
    {
        return 'backend.stories.includes.row';
    }
}
