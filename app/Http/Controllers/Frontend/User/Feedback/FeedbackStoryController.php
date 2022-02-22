<?php

namespace App\Http\Controllers\Frontend\User\Feedback;

use App\Models\Story;
use App\Models\StoryDrawing;
use App\Models\StudentFeedback;
use App\Models\StudentGroup;
use App\Models\StudentReview;
use App\Models\StudentStoryReview;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class FeedbackController.
 */
class FeedbackStoryController
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $userId = Auth::user()->id;

        $studentGroup = StudentGroup::query()->where('user_id',$userId)->with(['group'])->get();

        if($studentGroup->count() > 0){
            $stories = Story::query()->where('group_id',$studentGroup[0]->group_id)->get();
        }else{
            $stories = Story::query()->where('user_id',$userId)->get();
        }

        $groupCount = $studentGroup->count();

        return view('frontend.user.feedback.story.index')
            ->with('groupCount', $groupCount)
            ->with('stories', $stories);
    }


    public function show(int $storyId): Factory|View|Application
    {
        $userId = Auth::user()->id;
        $story = Story::find($storyId);

        $storyReview = StudentStoryReview::query()
            ->where('user_id',$userId)
            ->where('story_id',$storyId)
            ->first();

        if(!$storyReview ||$storyReview->count() == 0){
            $storyReview = new StudentStoryReview();
            $storyReview->q1 = 0;
            $storyReview->q2 = 0;
            $storyReview->q3 = 0;
            $storyReview->q4 = 0;
            $storyReview->q5 = 0;
        }

        return view('frontend.user.feedback.story.rate')
            ->with('storyReview', $storyReview)
            ->with('story', $story);
    }

    /**
     * @param null $storyId
     * @return Application|Factory|View
     */
    public function preview($storyId = null): View|Factory|Application
    {
        $story = Story::query()->where('id',$storyId)->first();

        $storyDrawings = StoryDrawing::query()
            ->where('story_id', $storyId)
            ->get();

        return view('frontend.user.feedback.story.preview')
            ->with('story',$story)
            ->with('storyDrawings', $storyDrawings);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function store(Request $request, $storyId): mixed
    {
        $userId = Auth::user()->id;

        StudentStoryReview::updateOrCreate(
        // Check if available
            [
                'user_id' => $userId,
                'story_id' => $storyId,
            ],

            // Create or Update Value
            [
                'q1' => $request->input('q1'),
                'q2' => $request->input('q2'),
                'q3' => $request->input('q3'),
                'q4' => $request->input('q4'),
                'q5' => $request->input('q5'),
                'q6' => $request->input('q6'),
                'q7' => $request->input('q7'),
            ]
        );

        return redirect()->route('frontend.user.feedback.story')->withFlashSuccess(__('The feedback was successfully created.'));
    }
}
