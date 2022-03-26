<?php

namespace App\Http\Controllers\Frontend\User\Story;

use App\Models\Story;
use App\Models\StudentGroup;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class StoryController.
 */
class StoryOutlineController
{
    /**
     * @param null $storyId
     * @return Application|Factory|View
     */
    public function index($storyId = null)
    {
        $story = Story::query()->where('id',$storyId)->first();

        return view('frontend.user.story.outline.create')
            ->with('story',$story);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function store(Request $request, $id): mixed
    {
        //dd($request->input());
        $userId = Auth::user()->id;
        $studentGroup = StudentGroup::query()->where('user_id',$userId)->first();

        if($studentGroup){
            Story::updateOrCreate(
            // Check if available
                [
                    'id' => $id,
                    'group_id' => $studentGroup->group_id
                ],

                // Create or Update Value
                [
                    'user_id' => $userId,
                    'nvc_outline' => $request->input('nvc_outline')
                ]
            );
        }else{
            Story::updateOrCreate(
            // Check if available
                [
                    'id' => $id,
                    'user_id' => $userId
                ],

                // Create or Update Value
                [
                    'user_id' => $userId,
                    'nvc_outline' => $request->input('nvc_outline')
                ]
            );
        }

        return redirect()->route('frontend.user.story', ['storyId' => $id])->withFlashSuccess(__('The outline was successfully created.'));
    }
}
