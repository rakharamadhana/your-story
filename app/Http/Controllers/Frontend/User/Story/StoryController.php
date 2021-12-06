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
class StoryController
{
    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function index()
    {
        $cases = Cases::all();
        $data = [];

        return view('frontend.user.story.index')
            ->with('cases',$cases)
            ->with('data', json_encode($data));
    }
}
