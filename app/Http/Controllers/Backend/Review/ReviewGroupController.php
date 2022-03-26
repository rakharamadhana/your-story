<?php

namespace App\Http\Controllers\Backend\Review;

use App\Models\StudentFeedback;
use App\Models\StudentReview;
use Illuminate\Http\Request;

/**
 * Class ReviewController.
 */
class ReviewGroupController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('backend.review.group.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.review.group.create');
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

        StudentReview::create($input);

        return redirect()->route('admin.review.group.index')->withFlashSuccess(__('The review was successfully created.'));
    }

    public function show(StudentReview $studentReview)
    {
        return view('backend.review.group.show')
            ->with('studentReview',$studentReview);
    }

    public function edit(Request $request, StudentReview $studentReview)
    {
        $studentFeedbacks = StudentFeedback::query()->where('user_id', $studentReview->user_id)
            ->with(['user','target'])
            ->paginate();

        return view('backend.review.group.edit')
            ->with('studentReview',$studentReview)
            ->with('studentFeedbacks',$studentFeedbacks);;
    }

    public function update(Request $request, StudentReview $studentReview)
    {
        $request->validate([
            'name_en' => 'required|max:255',
            'name_zh-TW' => 'required|max:255',
            'time' => 'required',
            'place' => 'required',
            'character' => 'required',
            'conflict' => 'required',
            'description' => 'required',
            'nvc_outline' => 'required',
        ]);

        $input = $request->all();

        $studentReview->fill($input)->save();

        return redirect()->route('admin.review.group.index', $studentReview)->withFlashSuccess(__('The review was successfully updated.'));
    }


    public function destroy(Request $request, StudentReview $studentReview)
    {
        $studentReview->delete();

        return redirect()->route('admin.review.group.index')->withFlashSuccess(__('The review was successfully deleted.'));
    }
}
