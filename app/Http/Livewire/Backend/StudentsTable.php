<?php

namespace App\Http\Livewire\Backend;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Illuminate\Support\Facades\Lang;

class StudentsTable extends DataTableComponent
{

    public function columns(): array
    {
        $var = Lang::get('directory/index.str1');

        return [
            Column::make(__('Academic Year'),'academic_year')
                ->sortable()
                ->searchable(),
            Column::make(__('Grade'),'grade')
                ->sortable()
                ->searchable(),
            Column::make(__('Class'),'class')
                ->sortable()
                ->searchable(),
            Column::make(__('Name'),'user.name_en')
                ->sortable()
                ->searchable(),
            Column::make(__('Number'),'student_number')
                ->sortable()
                ->searchable(),
            Column::make(__('Email'),'user.email')
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

    public function filters(): array
    {
        return [
            'academic_year' => Filter::make(__('Academic Year'))
                ->select([
                    '' => __('Any'),
                    '110-1' => '110-1',
                    '110-2' => '110-2',
                    '111-1' => '111-1',
                    '111-2' => '111-2',
                ]),
            'grade' => Filter::make(__('Grade'))
                ->select([
                    '' => __('Any'),
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                ]),
            'class' => Filter::make(__('Class'))
                ->select([
                    '' => __('Any'),
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                ]),
        ];
    }

    public function query(): Builder
    {
        return Student::query()
            ->when($this->getFilter('academic_year'), fn ($query, $academic_year) => $query->where('academic_year', $academic_year))
            ->when($this->getFilter('grade'), fn ($query, $grade) => $query->where('grade', $grade))
            ->when($this->getFilter('class'), fn ($query, $class) => $query->where('class', $class));
    }

    public function rowView(): string
    {
        return 'backend.student.includes.row';
    }
}
