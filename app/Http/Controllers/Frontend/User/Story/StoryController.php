<?php

namespace App\Http\Controllers\Frontend\User\Story;

use App\Models\Cases;
use App\Models\Story;
use App\Models\StudentGroup;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class StoryController.
 */
class StoryController
{
    /**
     * @param null $storyId
     * @return Application|Factory|View
     */
    public function index($storyId = null): View|Factory|Application
    {
        $userId = Auth::user()->id;
        $studentGroup = StudentGroup::query()->where('user_id',$userId)->with(['group'])->get();

        if($studentGroup->count() > 0){
            $stories = Story::query()->where('group_id',$studentGroup[0]->group_id)->get();
        }else{
            $stories = Story::query()->where('user_id',$userId)->get();
        }

        $groupCount = $studentGroup->count();

        $data = [];

        if($storyId) {
            $story = Story::query()->where('id',$storyId)->first();

            return view('frontend.user.story.modify')
                ->with('story',$story)
                ->with('groupCount', $groupCount)
                ->with('studentGroup', $studentGroup);
        }

        return view('frontend.user.story.index')
            ->with('stories',$stories)
            ->with('groupCount', $groupCount)
            ->with('studentGroup', $studentGroup)
            ->with('data', json_encode($data));

    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function store(Request $request)
    {
        //dd($request->input());
        $userId = Auth::user()->id;

        Story::create(
            // Create or Update Value
            [
                'user_id' => $userId,
                'group_id' => $request->input('group_id'),
                'name_en' => $request->input('title'),
                'name_zh-TW' => $request->input('title'),
                'is_group_story' => $request->input('group_id') ? 1 : 0,
            ]
        );

        return redirect()->route('frontend.user.stories')->withFlashSuccess(__('The story was successfully created.'));
    }
}
