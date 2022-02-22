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
 * Class StoryBasicController.
 */
class StoryBasicController
{
    /**
     * @param null $storyId
     * @return Application|Factory|View
     */
    public function index($storyId = null): View|Factory|Application
    {
        $story = Story::query()->where('id',$storyId)->first();

        return view('frontend.user.story.basic')
            ->with('story',$story);
    }

    /**
     * @param $id
     * @return View|Factory|Application
     */
    public function description($id): View|Factory|Application
    {
        $studentId = Auth::user()->id;
        $studentGroup = StudentGroup::query()->where('user_id',$studentId)->first();

        if($studentGroup){
            $story = Story::select()
                ->where('id', $id)
                ->where('group_id', $studentGroup->group_id)
                ->first();
        }else{
            $story = Story::select()
                ->where('id', $id)
                ->where('user_id', $studentId)
                ->first();
        }


        return view('frontend.user.story.basic.description')
            ->with('story',$story);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function store(Request $request, $id)
    {


        $userId = Auth::user()->id;
        $studentGroup = StudentGroup::query()->where('user_id',$userId)->first();

        //dd($studentGroup);
        if($studentGroup){
            Story::updateOrCreate(
            // Check if available
                [
                    'id' => $id,
                    'group_id' => $studentGroup->group_id
                ],

                // Create or Update Value
                [
                    'time' => $request->input('time'),
                    'place' => $request->input('place'),
                    'characters' => $request->input('characters'),
                    'conflict' => $request->input('conflict'),
                ]
            );
        }else{
            Story::updateOrCreate(
            // Check if available
                [
                    'id' => $id,
                    'user_id' => $userId,
                ],

                // Create or Update Value
                [
                    'time' => $request->input('time'),
                    'place' => $request->input('place'),
                    'characters' => $request->input('characters'),
                    'conflict' => $request->input('conflict'),
                ]
            );
        }

        if($request->input('time') && $request->input('place') && $request->input('characters') && $request->input('conflict')){
            $redirect = redirect()->route('frontend.user.story.basic.description', ['storyId' => $id])->withFlashSuccess(__('The basic information was successfully created.'));
        } else {
            $redirect = redirect()->route('frontend.user.stories')->withFlashSuccess(__('The story was successfully created.'));
        }

        return $redirect;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function storeDescription(Request $request, $id)
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
                    'description' => $request->input('description')
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
                    'description' => $request->input('description')
                ]
            );
        }


        return redirect()->route('frontend.user.story', ['storyId' => $id])->withFlashSuccess(__('The story was successfully created.'));
    }
}
