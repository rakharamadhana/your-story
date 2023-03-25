<?php

namespace App\Http\Controllers\Frontend\User\Feedback;

use App\Models\Story;
use App\Models\StudentFeedback;
use App\Models\StudentGroup;
use App\Models\StudentReview;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class FeedbackController.
 */
class FeedbackReviewController
{
    /**
     * @return Application|Factory|View
     */
    public function index(int $storyType)
    {
        $userId = Auth::user()->id;
        $studentReview = StudentReview::query()->where('user_id',$userId)->get();

        if($studentReview->count() == 0){
            $studentReview[] = new StudentReview();
            $studentReview[0]->q1 = 0;
            $studentReview[0]->q2 = 0;
            $studentReview[0]->q3 = 0;
            $studentReview[0]->q4 = 0;
            $studentReview[0]->q5 = 0;

            $studentReview[1] = new StudentReview();
            $studentReview[1]->q1 = 0;
            $studentReview[1]->q2 = 0;
            $studentReview[1]->q3 = 0;
            $studentReview[1]->q4 = 0;
            $studentReview[1]->q5 = 0;
        }

        if($storyType == 2){
            $studentGroup = StudentGroup::query()->where('user_id', $userId)->first();

            $groupMembers = StudentGroup::query()->where('group_id', $studentGroup->group_id)
                ->with('user')
                ->get();

            $studentFeedbacks = StudentFeedback::query()->where('user_id', $userId)->get();

//            if(!$studentFeedbacks){
//                $studentReview = new StudentFeedback();
//                $studentReview->role = '';
//                $studentReview->reason = '';
//            }

            return view('frontend.user.feedback.review')
                ->with('studentReview', $studentReview)
                ->with('studentFeedbacks', $studentFeedbacks)
                ->with('groupMembers',$groupMembers)
                ->with('storyType', $storyType);
        }

        return view('frontend.user.feedback.review')
            ->with('studentReview', $studentReview)
            ->with('storyType', $storyType);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function store(Request $request, $id): mixed
    {

        $userId = Auth::user()->id;

        $request->validate([
            'q1' => 'required',
            'q2' => 'required',
            'q3' => 'required',
            'q4' => 'required',
            'q5' => 'required',
        ]);

        $studentGroup = StudentGroup::query()->where('user_id',$userId)->first();

        $type = 1;
        if($studentGroup){
            $type = 2;

            StudentReview::updateOrCreate(
            // Check if available
                [
                    'user_id' => $userId,
                    'group_id' => $studentGroup->group_id,
                    'type' => $type
                ],

                // Create or Update Value
                [
                    'q1' => $request->input('q1'),
                    'q2' => $request->input('q2'),
                    'q3' => $request->input('q3'),
                    'q4' => $request->input('q4'),
                    'q5' => $request->input('q5'),
                ]
            );

            $type = 3;
            StudentReview::updateOrCreate(
            // Check if available
                [
                    'user_id' => $userId,
                    'group_id' => $studentGroup->group_id,
                    'type' => $type //group team to reflect on their own
                ],

                // Create or Update Value
                [
                    'q1' => $request->input('q2-1'),
                    'q2' => $request->input('q2-2'),
                    'q3' => $request->input('q2-3'),
                    'q4' => $request->input('q2-4'),
                    'q5' => $request->input('q2-5'),
                ]
            );

            foreach($request->input('students') as $key => $student){
                StudentFeedback::updateOrCreate(
                // Check if available
                    [
                        'user_id' => $userId,
                        'targeted_user_id' => $request->input('students.'.$key.'.user_id')
                    ],

                    // Create or Update Value
                    [
                        'role' => $request->input('students.'.$key.'.role'),
                        'reason' => $request->input('students.'.$key.'.reason'),
                    ]
                );
            }

            return redirect()->route('frontend.user.feedback')->withFlashSuccess(__('The feedback was successfully created.'));
        }

        StudentReview::updateOrCreate(
            // Check if available
            [
                'user_id' => $userId,
                'type' => $type,
            ],

            // Create or Update Value
            [
                'q1' => $request->input('q1'),
                'q2' => $request->input('q2'),
                'q3' => $request->input('q3'),
                'q4' => $request->input('q4'),
                'q5' => $request->input('q5'),
            ]
        );

        return redirect()->route('frontend.user.feedback')->withFlashSuccess(__('The story was successfully created.'));
    }
}
