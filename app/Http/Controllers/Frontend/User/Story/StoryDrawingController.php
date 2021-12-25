<?php

namespace App\Http\Controllers\Frontend\User\Story;

use App\Models\Cases;
use App\Models\Story;
use App\Models\StoryDrawing;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class StoryController.
 */
class StoryDrawingController
{
    /**
     * @param null $storyId
     * @return Application|Factory|View
     */
    public function index($storyId = null): View|Factory|Application
    {
        $story = Story::query()->where('id',$storyId)->first();

        $storyDrawings = StoryDrawing::query()
            ->where('story_id', $storyId)
            ->get();

        return view('frontend.user.story.drawing')
            ->with('story',$story)
            ->with('storyDrawings', $storyDrawings);
    }

    /**
     * @param null $storyId
     * @return Application|Factory|View
     */
    public function draw($storyId = null): View|Factory|Application
    {
        $story = Story::query()->where('id',$storyId)->first();

        $data = [];

        return view('frontend.user.story.drawing.draw')
            ->with('story',$story)
            ->with('data', json_encode($data));
    }
}
