@extends('layouts.admin.app')

@section('admin-nav-title', 'Update Report')

@section('content')

<div class="row">
  <div class="col-md-12">
    @if (isset($_GET['success']) && $_GET['success'] == 1)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Report has been updated successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


    <!-- Reports Metrics  -->
    @component('components.admin.report.metrics', ['report' => $report])
        
    @endcomponent


    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">
                            description
                        </i>
                    </div>
                    <h4 class="card-title">
                        {{ $report->title }}
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Toolbar -->
                    <div class="toolbar">
                        @can('update', $report)
                        <a href="{{ route('admin/report/edit', ['id'=>$report->id]) }}" 
                            class="btn btn-primary btn-sm">
                            <i class="material-icons">edit</i>
                            Edit
                        </a>
                        <a href="{{ route('addEvidence', ['report' => $report->id]) }}" 
                            class="btn btn-warning btn-sm">
                            <i class="material-icons">create</i>
                            Upload Evidence
                        </a>
                        @endcan
                        <a href="{{ route('writeStory', ['reportId'=>$report->id]) }}" 
                            class="btn btn-info btn-sm">
                            <i class="material-icons">create</i>
                            Write Story
                        </a>
                    </div>
                    <hr>

                    <!-- Report Description -->
                    <div class="content my-5">
                        {!! $report->description !!}
                    </div>
                    <hr>

                    <!-- Evidences -->
                    @component('components.admin.report.evidence', ['report'=>$report])
                        
                    @endcomponent
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Report Details -->
            @component('components.admin.report.details', ['report'=>$report])
                
            @endcomponent

            <!-- Submitted By -->
            <div class="card card-testimonial">
                <div class="icon">
                    <i class="material-icons">person</i>
                </div>
                <div class="card-body">
                    <h5 class="card-description">
                        Reported By
                    </h5>
                </div>
                <div class="card-footer">
                    <h4 class="card-title">
                        {{ $report->user->name }}
                    </h4>
                </div>
            </div>
            <br><br>


        </div>
    </div>

</div>

@endsection

@section('scripts')

@endsection