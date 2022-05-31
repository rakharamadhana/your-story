<?php

namespace App\Http\Controllers\Backend\Case;

use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use League\Csv\CharsetConverter;
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
        return view('backend.cases.learn.create');
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

        StudentAnswer::create($input);

        return redirect()->route('admin.cases')->withFlashSuccess(__('The case was successfully created.'));
    }

    /**
     * @param StudentAnswer $studentAnswer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(StudentAnswer $studentAnswer)
    {
        return view('backend.cases.learn.show')
            ->with('student_answer',$studentAnswer);
    }

    /**
     * @param Request $request
     * @param StudentAnswer $studentAnswer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, StudentAnswer $studentAnswer)
    {
        return view('backend.cases.learn-edit')
            ->with('studentAnswer',$studentAnswer);
    }

    /**
     * @param Request $request
     * @param StudentAnswer $studentAnswer
     * @return mixed
     */
    public function update(Request $request, StudentAnswer $studentAnswer)
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

        $studentAnswer->fill($input)->save();

        return redirect()->route('admin.case.learn', $studentAnswer)->withFlashSuccess(__('The case was successfully updated.'));
    }

    /**
     * @param Request $request
     * @param StudentAnswer $studentAnswer
     * @return mixed
     */
    public function destroy(Request $request, StudentAnswer $studentAnswer)
    {
        $studentAnswer->delete();

        return redirect()->route('admin.case.learn')->withFlashSuccess(__('The case was successfully deleted.'));
    }

    public function export()
    {
        $encoder = (new CharsetConverter())
            ->inputEncoding('utf-8')
        ;

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

        //add formatter
        $csv->addFormatter($encoder);

        //insert the header
        $csv->insertOne($header);

        foreach ($studentAnswers as $studentAnswer) {

            if($studentAnswer->user->student){
                $academic_year = $studentAnswer->user->student->academic_year;
                $grade = $studentAnswer->user->student->grade;
                $class = $studentAnswer->user->student->class;
                $student_number = $studentAnswer->user->student->student_number;
            } else {
                $academic_year = '';
                $grade = '';
                $class = '';
                $student_number = '';
            }

            $csv->insertOne([
                $academic_year,
                $grade,
                $class,
                $studentAnswer->user->name_en,
                $student_number,
                $studentAnswer->cases->name_en,
                $studentAnswer->task->name_en,
                $studentAnswer->emo_1,
                $studentAnswer->emo_2,
                $studentAnswer->nvc_1,
                $studentAnswer->nvc_2,
                $studentAnswer->nvc_3,
                $studentAnswer->nvc_4,
                $studentAnswer->nvc_end,
                $studentAnswer->created_at->format('m/d/Y'),
                $studentAnswer->updated_at->format('m/d/Y')
            ]);
        }

        $csv->output('students_learning_report.csv');
    }
}
