<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Cases;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class CaseController.
 */
class CaseController
{
    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function index($id)
    {
        $case = Cases::find($id);

        $tasks = Task::where('cases_id', $id)->get();

        return view('frontend.user.case.index')
            ->with('case',$case)
            ->with('tasks', $tasks);
    }
}
