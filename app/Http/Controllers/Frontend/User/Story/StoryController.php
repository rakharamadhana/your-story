<?php

namespace App\Http\Controllers\Frontend\User\Story;

use App\Models\Cases;
use App\Models\Story;
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
        $stories = Story::all();
        $data = [];

        if($storyId) {
            $story = Story::query()->where('id',$storyId)->first();

            return view('frontend.user.story.modify')
                ->with('story',$story);
        }

        return view('frontend.user.story.index')
            ->with('stories',$stories)
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
                'name_en' => $request->input('title'),
                'name_zh-TW' => $request->input('title'),
            ]
        );

        return redirect()->route('frontend.user.stories')->withFlashSuccess(__('The story was successfully created.'));
    }
}
