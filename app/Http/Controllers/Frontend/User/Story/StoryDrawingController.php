<?php

namespace App\Http\Controllers\Frontend\User\Story;

use App\Models\Cases;
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
    public function index($storyId = null)
    {
        $case = Cases::query()->where('id',$storyId)->first();

        return view('frontend.user.story.drawing')
            ->with('case',$case);
    }
}
