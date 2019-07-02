<?php

namespace App\Http\Controllers;

use App\Evidence;
use App\Report;
use Illuminate\Http\Request;
use App\Http\Requests\Evidence\NewRequest;
use App\Http\Requests\Evidence\UpdateRequest;
use App\Http\Requests\Evidence\DelRequest;
use App\Http\Resources\EvidenceResource;
use Illuminate\Support\Str;

class EvidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($reportId) {
        $report = Report::findOrFail($reportId);

        return EvidenceResource::collection($report->evidence);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($reportId) {
        $report = Report::findOrFail($reportId);

        return view('admin.evidence.add', ['report' => $report]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $evidence = new Evidence();

        //Get filename with the extension
        $filenameWithExt = $request->file('file')->getClientOriginalName();
        //get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //get just ext
        $extension = $request->file('file')->getClientOriginalExtension();
        //filename to store
        $uuid = Str::uuid();
        $filenameToStore = $uuid.'.'.$extension;
        // upload image
        $path = $request->file('file')->storeAs(
            'public/report/evidence', 
            $filenameToStore
        );
        
        $evidence->report_id = $request->input('report_id');
        $evidence->file_format = $extension;
        $evidence->url = "report/evidence/".$filenameToStore;

        if($evidence->save()) {
            $success = 1;
        } else {
            $success = 0;
        }

        return redirect()->action('ReportController@show', [
            'id'=>$request->input('report_id'), 
            'success'=>$success
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $evidence = Evidence::findOrFail($id);

        return new EvidenceResource($evidence);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function edit(Evidence $evidence) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evidence $evidence) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evidence  $evidence
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $evidence = Evidence::findOrFail($id);

        //delete file
        unlink(public_path("storage/".$evidence->url));

        if($evidence->delete()) {
            $success = 1;
        } else {
            $success = 0;
        }

        return redirect()->action('ReportController@show', [
            'id'=>$evidence->report_id, 
            'success'=>$success
        ]);
    }
}
