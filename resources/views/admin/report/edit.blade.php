@extends('layouts.admin.app')

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
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <form id="" class="form-horizontal" action="{{ route('adminUpdateReport') }}" 
        method="POST" novalidate="novalidate">
      @csrf
      <div class="card ">
        <div class="card-header card-header-default card-header-text">
            <div class="card-text">
                <h4 class="card-title">
                    {{ $report->title }}
                </h4>
            </div>
        </div>
        <div class="card-body">

            <div class="row my-5">
                <div class="col-md-8">
                <div class="form-group">
                    <label for="report-description">
                        Report Title
                    </label>
                    <input name="title" type="text" class="form-control" placeholder="Title" value="{{ $report->title }}">
                </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select name="report_type_id" class="form-control selectpicker" data-style="" id="report-type">
                            <option disabled>Report Type</option>
                            @php
                                $reportTypes = App\ReportType::all();
                            @endphp
                            @for ($i = 0; $i < count($reportTypes); $i++)
                                @php
                                    $reportType = $reportTypes[$i];
                                @endphp
                                <option value="{{ $reportType->id }}" @if ($report->report_type_id == $reportType->id) {{ "selected" }} @endif>
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
                <textarea name="description" class="form-control" id="report-description" rows="6">
                    {{ $report->description }}
                </textarea>
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
                <input type="text" name="victim" class="form-control" placeholder="Victim" value="{{ $report->victim }}">
            </div>

            <div class="form-group my-5">
                <label for="">
                    Affiliation
                </label>
                <input type="text" name="affiliation" class="form-control" placeholder="Affiliation" value="{{ $report->affiliation }}">
            </div>

            <div class="form-group my-5">
                <label for="">
                    Assailant
                </label>
                <input type="text" name="assailant" class="form-control" placeholder="Assailant" value="{{ $report->assailant }}">
            </div>

            <!-- input with datetimepicker -->
            <div class="form-group my-5">
                <label class="">
                    Incident Date
                </label>
                <input name="date" type="text" class="form-control datetimepicker" value="{{ $report->date }}"/>
            </div>

            {{--<div class="form-group my-5">
                <label class="">
                    Status
                </label>
                <select name="status_id" class="form-control selectpicker" data-style="" id="status">
                    <option disabled>Status</option>
                    <option value="4" @if ($report->status_id === 4) echo "selected"; @endif>
                        Unverified
                    </option>
                    <option value="5" @if ($report->status_id === 5) echo "selected"; @endif>
                        Verified
                    </option>
                </select>
            </div>--}}

            <input name="id" type="hidden" value="{{ $report->id }}">          
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
            })
            .catch( error => {
                //console.error( error );
            });
  </script>
@endsection