<?php

namespace App\Http\Controllers\Backend\Story;

use App\Models\Story;
use App\Models\StoryDrawing;
use App\Models\StudentFeedback;
use App\Models\StudentStoryReview;
use Illuminate\Http\Request;

/**
 * Class StoryController.
 */
class StoryController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.stories.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.stories.create');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|max:255',
            'name_zh-TW' => 'required|max:255',
            'description_en' => 'required',
            'description_zh-TW' => 'required',
            'observes_en' => 'required',
            'observes_zh-TW' => 'required',
            'perceives_en' => 'required',
            'perceives_zh-TW' => 'required',
            'needs_en' => 'required',
            'needs_zh-TW' => 'required',
            'request_en' => 'required',
            'request_zh-TW' => 'required',
        ]);

        $input = $request->all();

        Story::create($input);

        return redirect()->route('admin.stories')->withFlashSuccess(__('The story was successfully created.'));
    }

    public function show(Story $story)
    {
        return view('backend.stories.show')
            ->with('story',$story);
    }

    public function edit(Request $request, Story $story)
    {
        $storyDrawings = StoryDrawing::query()->where('story_id', $story->id)->paginate(5);
        $storyReviews = StudentStoryReview::query()->where('story_id', $story->id)
            ->with('user')
            ->paginate();

        return view('backend.stories.edit')
            ->with('story',$story)
            ->with('storyDrawings',$storyDrawings)
            ->with('storyReviews',$storyReviews);
    }

    public function update(Request $request, Story $story)
    {
        $request->validate([
            'name_en' => 'required|max:255',
            'name_zh-TW' => 'required|max:255',
            'time' => 'required',
            'place' => 'required',
            'character' => 'required',
            'conflict' => 'required',
            'description' => 'required',
            'nvc_outline' => 'required',
        ]);

        $input = $request->all();

        $story->fill($input)->save();

        return redirect()->route('admin.stories', $story)->withFlashSuccess(__('The story was successfully updated.'));
    }


    public function destroy(Request $request, Story $story)
    {
        $story->delete();

        return redirect()->route('admin.stories')->withFlashSuccess(__('The story was successfully deleted.'));
    }
}
