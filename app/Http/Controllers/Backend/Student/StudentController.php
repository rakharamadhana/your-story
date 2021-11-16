<?php

namespace App\Http\Controllers\Backend\Student;

use App\Domains\Auth\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use League\Csv\Writer;

/**
 * Class CasesController.
 */
class StudentController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.student.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        $users = User::where('type', 'user')->get();

        return view('backend.student.create')
            ->with('users',$users);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => [
                'required',
                'max:255',
                Rule::unique('students', 'user_id'),
            ],
            'academic_year' => 'required|max:255',
            'grade' => 'required|max:255',
            'class' => 'required|max:255',
            'student_number' => [
                'required',
                'max:255',
                Rule::unique('students', 'student_number'),
            ],
        ]);

        $input = $request->all();

        Student::create($input);

        return redirect()->route('admin.student')->withFlashSuccess(__('The student was successfully created.'));
    }

    /**
     * @param Student $case
     * @return mixed
     */
    public function show(Student $case)
    {
        return view('backend.student.show')
            ->with('case',$case);
    }

    /**
     * @param Request $request
     * @param Student $student
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Student $student)
    {
        $users = User::where('type', 'user')->get();

        return view('backend.student.edit')
            ->with('student',$student)
            ->with('users', $users);
    }

    /**
     * @param Request $request
     * @param Student $student
     * @return mixed
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'user_id' => [
                'required',
                'max:255',
                Rule::unique('students', 'user_id')->ignore($student->user_id, 'user_id'),
            ],
            'academic_year' => 'required|max:255',
            'grade' => 'required|max:255',
            'class' => 'required|max:255',
            'student_number' => [
                'required',
                'max:255',
                Rule::unique('students', 'student_number')->ignore($student->student_number, 'student_number'),
            ],
        ]);

        $input = $request->all();

        $student->fill($input)->save();

        return redirect()->route('admin.student', $student)->withFlashSuccess(__('The student was successfully updated.'));
    }

    /**
     * @param Request $request
     * @param Student $student
     * @return mixed
     */
    public function destroy(Request $request, Student $student)
    {
        $student->delete();

        return redirect()->route('admin.student')->withFlashSuccess(__('The student was successfully deleted.'));
    }

    public function export()
    {
        $students = Student::query()->with('user')->get();

        $csv = Writer::createFromFileObject(new \SplTempFileObject);

        $header = [
            'Academic Year',
            'Grade',
            'Class',
            'Name',
            'Number',
            'Email',
            'Created At',
            'Updated At'
        ];

        //insert the header
        $csv->insertOne($header);

        foreach ($students as $student) {
            $csv->insertOne([
                $student->academic_year,
                $student->grade,
                $student->class,
                $student->user->name_en,
                $student->student_number,
                $student->user->email,
                $student->created_at,
                $student->updated_at
            ]);
        }

        $csv->output('students.csv');
    }
}
