<?php

namespace App\Http\Controllers\Frontend\User\Feedback;

use App\Models\Story;
use App\Models\StudentGroup;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
    public function index(int $storyId,int $storyType)
    {
        $story = Story::query()->where('id',$storyId)
            ->first();

        if($story->group_id){
            $groupMembers = StudentGroup::query()->where('group_id', $story->group_id)
                ->with('user')
                ->get();

            return view('frontend.user.feedback.rate')
                ->with('story',$story)
                ->with('groupMembers',$groupMembers)
                ->with('storyType', $storyType);
        }

        return view('frontend.user.feedback.rate')
            ->with('story',$story)
            ->with('storyType', $storyType);
    }
}
