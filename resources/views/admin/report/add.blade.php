@extends('layouts.admin.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    @if (isset($_GET['success']) && $_GET['success'] == 1)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Report has been submitted successfully.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <form id="" class="form-horizontal" action="{{ route('adminAddReport') }}" method="POST" novalidate="novalidate">
      @csrf
      <div class="card ">
        <div class="card-header card-header-default card-header-text">
          <div class="card-text">
            <h4 class="card-title">New Report</h4>
          </div>
        </div>
        <div class="card-body">

          <div class="row my-5">
            <div class="col-md-8">
              <div class="form-group">
                <label for="report-description">
                  Report Title
                </label>
                <input name="title" type="text" class="form-control" placeholder="Title">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="report-description">
                      Type of Attack
                    </label>
                <select name="report_type_id" class="form-control selectpicker" data-style="" id="report-type">
                  @php
                    $reportTypes = App\ReportType::all();
                  @endphp
                  @for ($i = 0; $i < count($reportTypes); $i++)
                    @php
                        $reportType = $reportTypes[$i];
                    @endphp
                    <option value="{{ $reportType->id }}">
                      {{ $reportType->name }}
                    </option>
                  @endfor
                </select>
              </div>
            </div>
          </div>

          <div class="form-group my-5">
            <label for="report-description">
              Report Description
            </label><br><br>
            <textarea name="description" class="form-control" id="report-description" rows="6"></textarea>
          </div>

          <div class="col-md-6">
              <label for="report-description">
                  Location (state)
                </label><br>
            <select name="state_id" class="form-control selectpicker" data-style="" id="state" style="max-height: 50px">
                @php
                    $states = App\State::all();
                @endphp
                @for ($i = 0; $i < count($states); $i++)
                    @php
                        $state = $states[$i];
                    @endphp
                    <option value="{{ $state->id }}">
                    {{ $state->name }}
                    </option>
                @endfor
            </select>
        <span class="material-input"></span>
    </div>

          <div class="form-group my-5">
            <label for="">
              Victim
            </label>
            <input type="text" name="victim" class="form-control" placeholder="Victim">
          </div>

          <div class="form-group my-5">
            <label for="">
              Affiliation
            </label>
            <input type="text" name="affiliation" class="form-control" placeholder="Affiliation">
          </div>

          <div class="form-group my-5">
            <label for="">
              Assailant
            </label>
            <input name="assailant" type="text" name="assailant" class="form-control" placeholder="Assailant">
          </div>

          <!-- input with datetimepicker -->
          <div class="form-group my-5">
            <label class="">
              Incident Date
            </label>
            <input name="date" type="text" class="form-control datetimepicker" value="21/06/2018"/>
          </div>

          
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-info">
            <i class="material-icons">add</i>
            Submit Report
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection

@section('scripts')
  <script>
      <!-- javascript for init -->
      $('.datetimepicker').datetimepicker({
        icons: {
          time: "fa fa-clock-o",
          date: "fa fa-calendar",
          up: "fa fa-chevron-up",
          down: "fa fa-chevron-down",
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-screenshot',
          clear: 'fa fa-trash',
          close: 'fa fa-remove'
        }
      });

      <!-- classic ckeditor init -->
      ClassicEditor
				.create( document.querySelector( '#report-description' ) )
				.then( editor => {
					//console.log( editor );
				} )
				.catch( error => {
					//console.error( error );
				} );
  </script>
@endsection