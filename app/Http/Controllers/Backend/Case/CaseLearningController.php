<?php

namespace App\Http\Controllers\Backend\Case;

use App\Domains\Auth\Http\Requests\Backend\User\EditUserRequest;
use App\Http\Requests\Backend\Case\EditCaseRequest;
use App\Models\Cases;
use App\Models\Student;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use League\Csv\Writer;

/**
 * Class CasesController.
 */
class CaseLearningController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.cases.learn');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.cases.create');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|max:255',
            'name_zh-TW' => 'required|max:255',
            'description_en' => 'required',
            'description_zh-TW' => 'required',
            'observes_en' => 'required',
            'observes_zh-TW' => 'required',
            'perceives_en' => 'required',
            'perceives_zh-TW' => 'required',
            'needs_en' => 'required',
            'needs_zh-TW' => 'required',
            'request_en' => 'required',
            'request_zh-TW' => 'required',
        ]);

        $input = $request->all();

        Cases::create($input);

        return redirect()->route('admin.cases')->withFlashSuccess(__('The case was successfully created.'));
    }

    /**
     * @param Cases $case
     * @return mixed
     */
    public function show(Cases $case)
    {
        return view('backend.cases.show')
            ->with('case',$case);
    }

    /**
     * @param Request $request
     * @param StudentAnswer $studentAnswer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, StudentAnswer $studentAnswer)
    {
        return view('backend.case.learn.edit')
            ->with('studentAnswer',$studentAnswer);
    }

    /**
     * @param Request $request
     * @param Cases $case
     * @return mixed
     */
    public function update(Request $request, Cases $case)
    {
        $request->validate([
            'name_en' => 'required|max:255',
            'name_zh-TW' => 'required|max:255',
            'description_en' => 'required',
            'description_zh-TW' => 'required',
            'observes_en' => 'required',
            'observes_zh-TW' => 'required',
            'perceives_en' => 'required',
            'perceives_zh-TW' => 'required',
            'needs_en' => 'required',
            'needs_zh-TW' => 'required',
            'request_en' => 'required',
            'request_zh-TW' => 'required',
        ]);

        $input = $request->all();

        $case->fill($input)->save();

        return redirect()->route('admin.cases', $case)->withFlashSuccess(__('The case was successfully updated.'));
    }

    /**
     * @param Request $request
     * @param Cases $case
     * @return mixed
     */
    public function destroy(Request $request, Cases $case)
    {
        $case->delete();

        return redirect()->route('admin.cases')->withFlashSuccess(__('The case was successfully deleted.'));
    }

    public function export()
    {
        $studentAnswers = StudentAnswer::query()->with(['user','cases','task'])->get();

        $csv = Writer::createFromFileObject(new \SplTempFileObject);

        $header = [
            'Academic Year',
            'Grade',
            'Class',
            'Name',
            'Number',
            'Case',
            'Task',
            'Task 1-1',
            'Task 1-2',
            'Task 2-1',
            'Task 2-2',
            'Task 2-3',
            'Task 2-4',
            'Task 2-5',
            'Created At',
            'Updated At'
        ];

        //insert the header
        $csv->insertOne($header);

        foreach ($studentAnswers as $studentAnswer) {
            $csv->insertOne([
                $studentAnswer->user->student->academic_year,
                $studentAnswer->user->student->grade,
                $studentAnswer->user->student->class,
                $studentAnswer->user->name_en,
                $studentAnswer->user->student->student_number,
                $studentAnswer->cases->name_en,
                $studentAnswer->task->name_en,
                $studentAnswer->emo_1,
                $studentAnswer->emo_2,
                $studentAnswer->nvc_1,
                $studentAnswer->nvc_2,
                $studentAnswer->nvc_3,
                $studentAnswer->nvc_4,
                $studentAnswer->nvc_end,
                $studentAnswer->created_at,
                $studentAnswer->updated_at
            ]);
        }

        $csv->output('students_learning_report.csv');
    }
}
