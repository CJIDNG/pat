@extends('layouts.app')


@section('body-class', 'contact-page sidebar-collapse')

@section('content')
<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('{{asset('img/bg2.jpg')}}')">
    <div class="container">
      <div class="row justify-content-around">
       @component('components.reports.metrics', ['report'=>$report])
           
       @endcomponent
      </div>
      <div class="row">
        <div class="col col-md-8 ml-auto mr-auto text-center">
          <h2 class="title">{{ $report->title }}</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
          <!-- Tabs with icons on Card -->
          <div class="card card-nav-tabs">
            <div class="card-header card-header-primary">
              <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                      <a class="nav-link active show" href="#report" data-toggle="tab">
                        <i class="material-icons">description</i> Report
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#evidence" data-toggle="tab">
                        <i class="material-icons">folder_special</i> Evidence
                      <div class="ripple-container"></div></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#stories" data-toggle="tab">
                        <i class="material-icons">insert_comment</i> Related Stories
                      <div class="ripple-container"></div></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body" style="min-height: 100px;">
              <div class="tab-content text-center">
                <div class="tab-pane active show" id="report">
                 
                  <div class="row">
                    <div class="col-8">
                      <blockquote class="blockquote my-2">
                          {!! $report->description !!}
                      </blockquote>
                    </div>
                    <div class="col">
                      @component('components.reports.details', ['report' => $report])
                          
                      @endcomponent
                    </div>
                  </div>
                
                </div>
                <div class="tab-pane" id="evidence">
                
                  @component('components.reports.evidence', ['report' => $report])
                      
                  @endcomponent
                
                </div>
                <div class="tab-pane" id="stories">
                 
                  @component('components.reports.stories', ['report' => $report])
                      
                  @endcomponent

                </div>
              </div>
            </div>
          </div>
          <!-- End Tabs with icons on Card -->
  </div>
  
@endsection