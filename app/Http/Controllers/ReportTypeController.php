<?php

namespace App\Http\Controllers;

use App\ReportType;
use Illuminate\Http\Request;
use App\Http\Requests\ReportType\NewRequest;
use App\Http\Requests\ReportType\UpdateRequest;
use App\Http\Requests\ReportType\DelRequest;
use App\Http\Resources\ReportTypeResource;

class ReportTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reportTypes = ReportType::all();

        return ReportTypeResource::collection($reportTypes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewRequest $request)
    {
        $reportType = new ReportType();

        $reportType->name = $request->input('name');
        $reportType->description = $request->input('description');

        if($reportType->save()) {
            return response()->json([
                'success' => 1,
                'message' => 'Report Type has been saved'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReportType  $reportType
     * @return \Illuminate\Http\Response
     */
    public function show(ReportType $reportType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReportType  $reportType
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportType $reportType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReportType  $reportType
     * @return \Illuminate\Http\Response
     */
    public function update(NewRequest $request)
    {
        $reportType = ReportType::findOrFail($request->input('id'));

        $reportType->name = $request->input('name');
        $reportType->description = $request->input('description');

        if($reportType->save()) {
            return response()->json([
                'success' => 1,
                'message' => 'Report Type has been updated'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReportType  $reportType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DelRequest $request) 
    {
        $reportType = ReportType::findOrFail($request->input('id'));

        if($reportType->destroy()) {
            return response()->json([
                'success' => 1,
                'message' => 'Report Type has been destroyed'
            ]);
        }
    }
}
