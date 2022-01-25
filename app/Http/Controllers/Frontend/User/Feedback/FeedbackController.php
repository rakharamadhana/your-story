<?php

namespace App\Http\Controllers\Frontend\User\Feedback;

use App\Models\Story;
use App\Models\StudentGroup;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

/**
 * Class FeedbackController.
 */
class FeedbackController
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $studentGroup = StudentGroup::query()->where('user_id',$userId)->with(['group'])->get();

        if($studentGroup->count() > 0){
            $stories = Story::query()->where('group_id',$studentGroup[0]->group_id)->get();
        }else {
            $stories = Story::query()->where('user_id', $userId)->get();
        }

        $groupCount = $studentGroup->count();

        return view('frontend.user.feedback.index')
            ->with('stories',$stories)
            ->with('groupCount', $groupCount);
    }
}
