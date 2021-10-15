<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Cases;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class TaskController.
 */
class TaskController
{
    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function index($caseId, $id)
    {
        $case = Cases::find($caseId);

        $task = Task::find($id);

        return view('frontend.user.case.task')
            ->with('case',$case)
            ->with('task',$task);
    }
}
