<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\User;
use App\Models\Cases;
use App\Models\Student;
use App\Models\StudentAnswer;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class CaseLearnTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make(__('Academic Year'),'user_id')
                ->sortable()
                ->searchable(),
            Column::make(__('Grade'),'user_id')
                ->sortable()
                ->searchable(),
            Column::make(__('Class'),'user_id')
                ->sortable()
                ->searchable(),
            Column::make(__('Name'),'user_id')
                ->sortable()
                ->searchable(),
            Column::make(__('Number'),'user_id')
                ->sortable()
                ->searchable(),
            Column::make(__('Case'),'cases_id')
                ->sortable(),
            Column::make(__('Task'),'task_id')
                ->sortable(),
            Column::make(__('1-1'),'emo_1')
                ->sortable(),
            Column::make(__('1-2'),'emo_2')
                ->sortable(),
            Column::make(__('2-1'),'nvc_1')
                ->sortable(),
            Column::make(__('2-2'),'nvc_2')
                ->sortable(),
            Column::make(__('2-3'),'nvc_3')
                ->sortable(),
            Column::make(__('2-4'),'nvc_4')
                ->sortable(),
            Column::make(__('2-5'),'nvc_end')
                ->sortable(),
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
        $students = User::query()
            ->where('type','user')
            ->orderBy('name_en')
            ->get()
            ->keyBy('id')
            ->map(fn($student) => $student->name_en)
            ->toArray();

        $tasks = Task::query()->orderBy('id')
            ->get()
            ->keyBy('id')
            ->map(fn($task) => $task->name_en)
            ->toArray();

        $cases = Cases::query()->orderBy('id')
            ->get()
            ->keyBy('id')
            ->map(fn($case) => $case->name_en)
            ->toArray();

        array_unshift($students, 'Any');
        array_unshift($tasks, 'Any');
        array_unshift($cases, 'Any');

        return [
            'academic_year' => Filter::make(__('Academic Year'))
                ->select([
                    '' => __('Any'),
                    '110-1' => '110-1',
                    '110' => '110',
                    '111' => '111',
                ]),
            'grade' => Filter::make(__('Grade'))
                ->select([
                    '' => __('Any'),
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
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
                    '11' => '11',
                    '12' => '12',
                    '13' => '13',
                ]),
            'student' => Filter::make(__('Student'))
                ->select(
                    $students
                ),
            'task' => Filter::make(__('Task'))
                ->select(
                    $tasks
                ),
            'case' => Filter::make(__('Case'))
                ->select(
                    $cases
                ),
        ];
    }

    public function query(): Builder
    {
//        dd(StudentAnswer::query()
//            ->with('user')
//            ->with('cases')
//            ->with('task')
//            ->get()
//        );
        return StudentAnswer::query()
            ->when($this->hasFilter('academic_year'), function ($query) {
                $query->whereHas('user.student', function ($query) {
                    return $query->where('academic_year', $this->getFilter('academic_year'));
                })->get();
            })
            ->when($this->hasFilter('grade'), function ($query) {
                $query->whereHas('user.student', function ($query) {
                    return $query->where('grade', $this->getFilter('grade'));
                })->get();
            })
            ->when($this->hasFilter('class'), function ($query) {
                $query->whereHas('user.student', function ($query) {
                    return $query->where('class', $this->getFilter('class'));
                })->get();
            })
            ->when($this->getFilter('student'), fn ($query, $student) => $query->where('user_id', $student+1))
            ->when($this->getFilter('task'), fn ($query, $task) => $query->where('task_id', $task))
            ->when($this->getFilter('case'), fn ($query, $case) => $query->where('cases_id', $case));

    }

    public function rowView(): string
    {
        return 'backend.cases.learn.includes.row';
    }
}
