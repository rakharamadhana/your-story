<?php

namespace App\Http\Controllers\Frontend\User\Story;

use App\Models\Cases;
use App\Models\Story;
use App\Models\StoryDrawing;
use App\Models\StoryDrawingMusic;
use App\Models\Task;
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
            ->with('music')
            ->where('story_id', $storyId)
            ->get();

//        dd($storyDrawings);

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
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'audio' => 'mimes:wav,ogg,mp3',
            'description' => 'required',
        ]);

        $audioName = null;

        if($request->audio){
            $audioName = $storyId.'-'.time().'.'.$request->audio->extension();
            $audioLocation = public_path('storage/drawings/'.$storyId.'/audio/');
            $request->audio->move($audioLocation, $audioName);
        }

        $imageName = $storyId.'-'.time().'.'.$request->image->extension();

        $imageLocation = public_path('storage/drawings/'.$storyId.'/');

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
        $request->validate([
            'category' => 'required',
            'audio' => 'required|mimes:wav,ogg,mp3',
        ]);

        $audioName = $storyId.'-'.$request->input('category').'-music'.'.'.$request->audio->extension();
        $audioLocation = public_path('storage/drawings/'.$storyId.'/audio/');
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
        $story = Story::query()->where('id',$storyId)->first();

        $storyDrawing = StoryDrawing::find($id);

        return view('frontend.user.story.drawing.edit')
            ->with('story',$story)
            ->with('storyDrawing', $storyDrawing);
    }

    /**
     * @param Request $request
     * @param $storyId
     * @param $id
     * @return View|Factory|Application
     */
    public function updateImage(Request $request, $storyId, $id): View|Factory|Application
    {
        // Validating
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'audio' => 'mimes:wav,ogg,mp3',
            'description' => 'required',
        ]);

        // Get Story Information
        $story = Story::query()->where('id',$storyId)->first();

        // Initialize Audio Variable
        $audioName = null;
        $imageName = null;

        // If Audio were changed, then replace the previous one
        if($request->audio){
            $storyDrawing = StoryDrawing::find($id);

            $audioLocation = public_path('storage/drawings/'.$storyId.'/audio/');
            $audioName = $storyDrawing->audio;

            if (File::exists($audioLocation.$audioName)) {
                File::delete($audioLocation.$audioName);
            }else{
                dd('Audio does not exists.');
            }

            $audioName = $storyId.'-'.time().'.'.$request->audio->extension();
            $audioLocation = public_path('storage/drawings/'.$storyId.'/audio/');
            $request->audio->move($audioLocation, $audioName);
        }

        // If Image were changed, then replace the previous one
        if($request->image){
            $storyDrawing = StoryDrawing::find($id);

            $imageLocation = public_path('storage/drawings/'.$storyId.'/');
            $imageName = $storyDrawing->drawing;

            if (File::exists($imageLocation.$imageName)) {
                File::delete($imageLocation.$imageName);
            }else{
                dd('Image does not exists.');
            }

            $imageName = $storyId.'-'.time().'.'.$request->image->extension();

            $imageLocation = public_path('storage/drawings/'.$storyId.'/');

            $request->image->move($imageLocation, $imageName);
        }

        // Updating Record
        $storyDrawing = StoryDrawing::query()
            ->where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'category' => $request->input('category'),
                'description' => $request->input('description'),
                'drawing' => $imageName,
                'audio' => $audioName,
            ]);

        // Fetch Drawings for viewing page
        $storyDrawings = StoryDrawing::query()
            ->where('story_id', $storyId)
            ->get();

        // Redirect to drawing page
        return view('frontend.user.story.drawing')
            ->with('story',$story)
            ->with('storyDrawings', $storyDrawings);;
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

    public function downloadPpt($storyId){
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
                ->setPath(public_path('storage/drawings/'.$storyId.'/'.$storyDrawing->drawing))
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
