<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Cases;
use App\Models\StudentAnswer;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\NoReturn;

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

        $studentId = Auth::user()->id;

        $studentAnswer = StudentAnswer::select()
            ->where('user_id', $studentId)
            ->where('cases_id', $caseId)
            ->where('task_id', $id)
            ->first();

        return view('frontend.user.case.task')
            ->with('case',$case)
            ->with('task',$task)
            ->with('student_answer',$studentAnswer);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function ending($caseId, $id)
    {
        $case = Cases::find($caseId);

        $task = Task::find($id);

        $studentId = Auth::user()->id;

        $studentAnswer = StudentAnswer::select()
            ->where('user_id', $studentId)
            ->where('cases_id', $caseId)
            ->where('task_id', $id)
            ->first();

        return view('frontend.user.case.task.task-ending')
            ->with('case',$case)
            ->with('task',$task)
            ->with('student_answer',$studentAnswer);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request, $caseId, $id)
    {
        //dd($request->input());
        $userId = Auth::user()->id;

        StudentAnswer::updateOrCreate(
            // Check if available
            [
                'user_id' => $userId,
                'cases_id' => $caseId,
                'task_id' => $id
            ],

            // Create or Update Value
            [
                'user_id' => $userId,
                'cases_id' => $caseId,
                'task_id' => $id,
                'emo_1' => $request->input('emo_1'),
                'emo_2' => $request->input('emo_2'),
                'nvc_1' => $request->input('nvc_1'),
                'nvc_2' => $request->input('nvc_2'),
                'nvc_3' => $request->input('nvc_3'),
                'nvc_4' => $request->input('nvc_4'),
            ]
        );

        if($request->input('nvc_1') && $request->input('nvc_2') && $request->input('nvc_3') && $request->input('nvc_4')){
            $redirect = redirect()->route('frontend.user.case.task.ending', ['caseId' => $caseId, 'id' => $id])->withFlashSuccess(__('The case was successfully created.'));
        } else {
            $redirect = redirect()->route('frontend.user.case', ['id' => $caseId])->withFlashSuccess(__('The case was successfully created.'));
        }

        return $redirect;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function storeEnding(Request $request, $caseId, $id)
    {
        //dd($request->input());
        $userId = Auth::user()->id;

        StudentAnswer::updateOrCreate(
        // Check if available
            [
                'user_id' => $userId,
                'cases_id' => $caseId,
                'task_id' => $id
            ],

            // Create or Update Value
            [
                'user_id' => $userId,
                'cases_id' => $caseId,
                'task_id' => $id,
                'nvc_end' => $request->input('nvc_end')
            ]
        );

        return redirect()->route('frontend.user.case', ['id' => $caseId])->withFlashSuccess(__('The case was successfully created.'));
    }

}
