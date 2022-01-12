<?php

namespace App\Http\Controllers\Frontend\User\Story;

use App\Models\Cases;
use App\Models\Story;
use App\Models\StoryDrawing;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

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

        return view('frontend.user.story.drawing.preview')
            ->with('story',$story)
            ->with('storyDrawings', $storyDrawings);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadImage(Request $request,$storyId = null)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);

        $imageName = $storyId.'-'.time().'.'.$request->image->extension();

        $imageLocation = public_path('storage/drawings/'.$storyId.'/');

        $request->image->move($imageLocation, $imageName);

        StoryDrawing::create(
            // Create or Update Value
            [
                'story_id' => $storyId,
                'title' => $request->input('title'),
                'drawing' => $imageName,
                'description' => $request->input('description'),
            ]
        );

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);

    }

    public function deleteImage($storyId,$id)
    {
        $storyDrawing = StoryDrawing::find($id);

        $imageLocation = public_path('storage/drawings/'.$storyId.'/');
        $imageName = $storyDrawing->drawing;

        if (File::exists($imageLocation.$imageName)) {
            File::delete($imageLocation.$imageName);
            $storyDrawing->delete();
        }else{
            dd('Image does not exists.');
        }

        return back()
            ->with('success','You have successfully delete the image.');
    }
}
