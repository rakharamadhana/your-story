<?php

namespace App\Http\Controllers\Frontend\User\Story;

use App\Models\Cases;
use App\Models\Story;
use App\Models\StoryDrawing;
use App\Models\StoryDrawingMusic;
use App\Models\StudentGroup;
use App\Models\Task;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Shape\Media;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;

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
        $user_id = Auth::id();
        $studentGroup = StudentGroup::query()->where('user_id',$user_id)->with(['group'])->get();

        if($studentGroup->count() > 0){
            $user_id = 'G'.$studentGroup[0]->group_id;
        }

        $story = Story::query()->where('id',$storyId)->first();

        $storyDrawings = StoryDrawing::query()
            ->where('story_id', $storyId)
            ->get();

        return view('frontend.user.story.drawing')
            ->with('story',$story)
            ->with('storyDrawings', $storyDrawings)
            ->with('userId', $user_id);
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
        $user_id = Auth::id();
        $studentGroup = StudentGroup::query()->where('user_id',$user_id)->with(['group'])->get();

        if($studentGroup->count() > 0){
            $user_id = 'G'.$studentGroup[0]->group_id;
        }

        $story = Story::query()->where('id',$storyId)->first();

        $storyDrawings = StoryDrawing::query()
            ->with('music')
            ->where('story_id', $storyId)
            ->get();

//        dd($storyDrawings);

        return view('frontend.user.story.drawing.preview')
            ->with('story',$story)
            ->with('storyDrawings', $storyDrawings)
            ->with('userId', $user_id);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadImage(Request $request,$storyId = null)
    {
        $user_id = Auth::id();
        $studentGroup = StudentGroup::query()->where('user_id',$user_id)->with(['group'])->get();

        if($studentGroup->count() > 0){
            $user_id = 'G'.$studentGroup[0]->group_id;
        }

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'audio' => 'mimes:wav,ogg,mp3',
            'description' => 'required',
        ]);

        $audioName = null;

        if($request->audio){
            $audioName = $user_id.'-'.$storyId.'-'.time().'.'.$request->audio->extension();
            $audioLocation = public_path('storage/drawings/'.$user_id.'/'.$storyId.'/audio/');
            File::ensureDirectoryExists($audioLocation);
            $request->audio->move($audioLocation, $audioName);
        }

        $imageName = $user_id.'-'.$storyId.'-'.time().'.'.$request->image->extension();

        $imageLocation = public_path('storage/drawings/'.$user_id.'/'.$storyId.'/');
        File::ensureDirectoryExists($imageLocation);

        $request->image->move($imageLocation, $imageName);

        StoryDrawing::create(
            // Create or Update Value
            [
                'story_id' => $storyId,
                'category' => $request->input('category'),
                'title' => $request->input('title'),
                'drawing' => $imageName,
                'audio' => $audioName,
                'description' => $request->input('description'),
            ]
        );

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadMusic(Request $request,$storyId = null)
    {
        $user_id = Auth::id();
        $studentGroup = StudentGroup::query()->where('user_id',$user_id)->with(['group'])->get();

        if($studentGroup->count() > 0){
            $user_id = 'G'.$studentGroup[0]->group_id;
        }

        $request->validate([
            'category' => 'required',
            'audio' => 'required|mimes:wav,ogg,mp3',
        ]);

        $audioName = $user_id.'-'.$storyId.'-'.$request->input('category').'-music'.'.'.$request->audio->extension();
        $audioLocation = public_path('storage/drawings/'.$user_id.'/'.$storyId.'/audio/');
        File::ensureDirectoryExists($audioLocation);
        $request->audio->move($audioLocation, $audioName);

        StoryDrawingMusic::create(
        // Create or Update Value
            [
                'story_id' => $storyId,
                'category' => $request->input('category'),
                'audio' => $audioName,
            ]
        );

        return back()
            ->with('success','You have successfully upload image.')
            ->with('audio',$audioName);

    }

    /**
     * @param $storyId
     * @param $id
     * @return View|Factory|Application
     */
    public function editImage($storyId,$id): View|Factory|Application
    {
        $user_id = Auth::id();
        $studentGroup = StudentGroup::query()->where('user_id',$user_id)->with(['group'])->get();

        if($studentGroup->count() > 0){
            $user_id = 'G'.$studentGroup[0]->group_id;
        }

        $story = Story::query()->where('id',$storyId)->first();

        $storyDrawing = StoryDrawing::find($id);

        return view('frontend.user.story.drawing.edit')
            ->with('story',$story)
            ->with('storyDrawing', $storyDrawing)
            ->with('userId', $user_id);
    }

    /**
     * @param Request $request
     * @param $storyId
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateImage(Request $request, $storyId, $id): \Illuminate\Http\RedirectResponse
    {
        $user_id = Auth::id();
        $studentGroup = StudentGroup::query()->where('user_id',$user_id)->with(['group'])->get();

        if($studentGroup->count() > 0){
            $user_id = 'G'.$studentGroup[0]->group_id;
        }

        // Validating
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'audio' => 'mimes:wav,ogg,mp3',
            'description' => 'required',
        ]);

        // Get Story Information
        $story = Story::query()->where('id',$storyId)->first();

        $storyDrawing = StoryDrawing::find($id);

        // Initialize the image name with the existing image name from the database
        $imageName = $storyDrawing->drawing;
        $audioName = $storyDrawing->audio;

        // If Audio were changed, then replace the previous one
        if($request->audio){

            $audioLocation = public_path('storage/drawings/'.$user_id.'/'.$storyId.'/audio/');

            if (File::exists($audioLocation.$audioName)) {
                File::delete($audioLocation.$audioName);
            }

            $audioName = $user_id.'-'.$storyId.'-'.time().'.'.$request->audio->extension();
            $audioLocation = public_path('storage/drawings/'.$user_id.'/'.$storyId.'/audio/');
            File::ensureDirectoryExists($audioLocation);
            $request->audio->move($audioLocation, $audioName);
        }

        // If Image were changed, then replace the previous one
        if($request->image){

            $imageLocation = public_path('storage/drawings/'.$user_id.'/'.$storyId.'/');

            if (File::exists($imageLocation.$imageName)) {
                File::delete($imageLocation.$imageName);
            }

            $imageName = $user_id.'-'.$storyId.'-'.time().'.'.$request->image->extension();

            $imageLocation = public_path('storage/drawings/'.$user_id.'/'.$storyId.'/');
            File::ensureDirectoryExists($imageLocation);

            $request->image->move($imageLocation, $imageName);
        }

        // Updating Record
        $storyDrawing = StoryDrawing::find($id);
        $storyDrawing->update([
            'title' => $request->input('title'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'drawing' => $imageName ?? $storyDrawing->image,
            'audio' => $audioName ?? $storyDrawing->audio,
        ]);


        // Fetch Drawings for viewing page
        $storyDrawings = StoryDrawing::query()
            ->where('story_id', $storyId)
            ->get();

        // Redirect to drawing page
        return redirect()->route('frontend.user.story.drawing', ['storyId' => $storyId]);
    }

    public function deleteImage($storyId,$id)
    {
        $user_id = Auth::id();
        $studentGroup = StudentGroup::query()->where('user_id',$user_id)->with(['group'])->get();

        if($studentGroup->count() > 0){
            $user_id = 'G'.$studentGroup[0]->group_id;
        }

        $storyDrawing = StoryDrawing::find($id);

        $imageLocation = public_path('storage/drawings/'.$user_id.'/'.$storyId.'/');
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

    public function downloadPpt($storyId){
        $user_id = Auth::id();
        $studentGroup = StudentGroup::query()->where('user_id',$user_id)->with(['group'])->get();

        if($studentGroup->count() > 0){
            $user_id = 'G'.$studentGroup[0]->group_id;
        }

        $story = Story::query()->where('id',$storyId)->first();
        $storyDrawings = StoryDrawing::query()->where('story_id', $storyId)->get();

        $objPHPPowerPoint = new PhpPresentation();

        $currentSlide = $objPHPPowerPoint->getActiveSlide();

        // Create a shape (text)
        $shape = $currentSlide->createRichTextShape()
            ->setHeight(300)
            ->setWidth(600)
            ->setOffsetX(170)
            ->setOffsetY(180);
        $shape->getActiveParagraph()->getAlignment()->setHorizontal( Alignment::HORIZONTAL_CENTER );
        $textRun = $shape->createTextRun($story->name_en);
        $textRun->getFont()->setBold(true)
            ->setSize(60)
            ->setColor( new Color( 'FF000000' ) );

        foreach($storyDrawings as $key=>$storyDrawing ){
            $currentSlide = $objPHPPowerPoint->createSlide();

            // Create a shape (drawing)
            $shape = $currentSlide->createDrawingShape();
            $shape->setName($storyDrawing->title)
                ->setDescription($storyDrawing->title)
                ->setPath(public_path('storage/drawings/'.$user_id.'/'.$storyId.'/'.$storyDrawing->drawing))
                ->setHeight(400)
                ->setOffsetX(170)
                ->setOffsetY(100);

            // Create a shape (text)
            $shape = $currentSlide->createRichTextShape()
                ->setHeight(100)
                ->setWidth(600)
                ->setOffsetX(170)
                ->setOffsetY(600);
            $shape->getActiveParagraph()->getAlignment()->setHorizontal( Alignment::HORIZONTAL_LEFT );
            $textRun = $shape->createTextRun($storyDrawing->description);
            $textRun->getFont()
                ->setSize(18)
                ->setColor( new Color('FF000000') );
        }

        //Export PPT
        header('Content-Type: application/vnd.openxmlformats-officedocument.presentationml.presentation');
        header('Content-Disposition: attachment;filename="test.pptx"');
        header('Cache-Control: max-age=0');

        $oWriterPPTX = IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
        $oWriterPPTX->save('php://output');
    }
}
