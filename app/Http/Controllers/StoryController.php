<?php

namespace App\Http\Controllers;

use App\Story;
use App\Report;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Story\NewRequest;
use App\Http\Requests\Story\UpdateRequest;
use App\Http\Requests\Story\DelRequest;
use App\Http\Requests\Story\UpdateThumbRequest;
use App\Http\Requests\Story\UpdateStatusRequest;
use App\Http\Resources\StoryResource;
use Illuminate\Support\Str;

class StoryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        

        $flag = false;

        if($request->has('flag')){
            $flag = $request->input('flag');
        }
        if(Auth::check() && Auth::user()->hasAnyRole(['administrator', 'journalist']) && $flag == false) {
            $stories = Story::orderBy('created_at', 'desc')->paginate();
            
            return view('admin.story.view_all', ['stories'=>$stories]);
        }

        $stories = Story::where('status_id', 3)->orderBy('created_at', 'desc')->paginate(6);
        return view('story.all', ['stories' => $stories]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($reportId) {
        $report = Report::findOrFail($reportId);

        return view('admin.story.add', ['report' => $report]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewRequest $request) {
        $story = new Story();

        //Get filename with the extension
        $filenameWithExt = $request->file('thumbnail')->getClientOriginalName();
        //get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //get just ext
        $extension = $request->file('thumbnail')->getClientOriginalExtension();
        //filename to store
        $uuid = Str::uuid();
        $filenameToStore = $uuid.'.'.$extension;
        // upload image
        $path = $request->file('thumbnail')->storeAs('public/story/thumbs', $filenameToStore);

        $story->author = $request->input('author');
        $story->title = $request->input('title');
        $story->story = $request->input('story');
        $story->tags = $request->input('tags');
        $story->thumbnail = 'story/thumbs/'.$filenameToStore;
        $story->report_id = $request->input('report_id');
        $story->user_id = Auth::user()->id;
        $story->status_id = $request->status_id;

        if($story->save()) {
            $success = 1;
        } else {
            $success = 0;
        }

        return redirect()->action('StoryController@show', [
            'id'=>$story->id, 
            'success'=>$success
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show($id, $success = -1) {
        $story = Story::with('user')->findOrFail($id);

        $story->views = $story->views + 1;
        $story->save();


        if(Auth::check() && Auth::user()->hasAnyRole(['administrator', 'journalist'])) {
            if($success != -1) {
            return view('admin.story.view', [
                'story' => $story,
                'create_success' => $success
            ]);
        }

        return view('admin.story.view', [
            'story' => $story,
            'create_success' => $success
        ]);

        }


        return view('story.view', ['story'=>$story]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $success = -1) {
        $story = Story::findOrFail($id);

        if($success != -1) {
            return view('admin.story.edit', ['story'=>$story, 'success'=>$success]);
        }

        return view('admin.story.edit', ['story' => $story]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request) {
        $story = Story::findOrFail($request->input('id'));

        $story->author = $request->input('author');
        $story->title = $request->input('title');
        $story->story = $request->input('story');
        $story->tags = $request->input('tags');
        $story->status_id = $request->input('status_id');

        if($story->save()) {
            $success = 1;
        } else {
            $success = 0;
        }

        return redirect()->action('StoryController@show', [
            'id'=>$request->input('id'), 
            'success'=>$success
        ]);
    }

    public function showUpdateThumbForm($id) {
        $story = Story::findOrFail($id);

        return view('admin.story.update_thumbnail', ['story' => $story]);
    }

    public function updateThumbnail(UpdateThumbRequest $request) {

        //Get filename with the extension
        $filenameWithExt = $request->file('thumbnail')->getClientOriginalName();

        //get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //get just ext
        $extension = $request->file('thumbnail')->getClientOriginalExtension();

        //filename to store
        $uuid = Str::uuid();
        $filenameToStore = $uuid.'.'.$extension;

        // upload image
        $path = $request->file('thumbnail')->storeAs('public/story/thumbs', $filenameToStore);
        $story = Story::find($request->input('id'));

        //delete the previous file
        unlink(public_path("storage/".$story->thumbnail));

        $story->thumbnail = "story/thumbs/".$filenameToStore;

        if($story->save()) {
            $success = 1;
        } else {
            $success = 0;
        }

        return redirect()->action('StoryController@show', [
            'id'=>$request->input('id'), 
            'success'=>$success
        ]);
    }

    public function approve($id) {
        $story = Story::findOrFail($id);

        $this->authorize('delete', $story);

        $story->status_id = 3;

        if($story->save()) {
            $success = 1;
        } else {
            $success = 0;
        }

        return redirect()->action('StoryController@show', [
            'id'=> $id, 
            'success'=>$success
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $story = Story::findOrFail($id);
        
        if($story->delete()) {
            $success = 1;
        } else {
            $success = 0;
        }


        return redirect()->action('StoryController@index', [
            'delete_success' => $success
        ]);
    }

    // public function destroy(DelRequest $request) {
    //     $story = Story::findOrFail($request->input('id'));

    //     //delete thumbnail
    //     unlink(public_path("storage/".$story->thumbnail));

    //     if($story->delete()) {
    //         $response = [
    //             'success' => 1
    //         ];
    //     } else {
    //         $response = [
    //             'success' => 0
    //         ];
    //     }

    //     return view('admin/story/view_all', ['delete_success' => $response['success']]);
    // }
}
