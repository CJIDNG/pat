@extends('layouts.app')

@section('body-class', 'presentation-page sidebar-collapse')
@section('nav-class', 'navbar fixed-top navbar-expand-lg')

@section('content')

<div class="contactus-1 section-image" style="background-image: url('{{ asset('img/examples/city.jpg') }}')">
    <div class="container">
        <div class="row mt-5">
            {{-- <div class="col-md-4 justify-content-center">
                <h2 class="title">Submit Report</h2>
                <h5 class="description">Give some userful advise for the reporters to read :) </h5>
                <div class="info info-horizontal">
                    <div class="icon icon-primary">
                        <i class="material-icons">pin_drop</i>
                    </div>
                    <div class="description">
                        <h4 class="info-title">Find us at the office</h4>
                        <p> 53 Mambolo Street, Wuse Zone II,
                            <br> Abuja FCT,
                            <br> Nigeria
                        </p>
                    </div>
                </div>
                <div class="info info-horizontal">
                    <div class="icon icon-primary">
                        <i class="material-icons">phone</i>
                    </div>
                    <div class="description">
                        <h4 class="info-title">Give us a ring</h4>
                        <p> Faruk Nasir
                            <br> +234 817 732 4377
                            <br> Mon - Fri, 8:00-22:00
                        </p>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-12 my-auto">
                <div class="card card-contact">
                <form id="contact-form" action="{{ route('addReport') }} "method="POST" novalidate="novalidate">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                        <div class="card-header card-header-raised card-header-primary text-center">
                            <h4 class="card-title">Submit Report</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="label-floating">Select Report Type</label>
                                        <select name="report_type_id" class="form-control selectpicker" data-style="" id="report-type">
                                                <option value="">- Please select the type of attack -</option>
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
                                    <span class="material-input"></span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <label class="form-check-label">Incident Date</label>
                                        <input name="date" type="text" class="form-control datetimepicker" value=""/>                                
                                    </div>
                                </div>
                            </div>
                            <div class="form-group label-floating is-empty bmd-form-group">
                                <label class="bmd-label-floating">Report Title</label>
                                <input type="text" name="title" class="form-control">
                                <span class="material-input"></span>
                            </div>                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating is-empty bmd-form-group">
                                        <label class="bmd-label-floating">Victim Name</label>
                                        <input type="text" name="victim" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating is-empty bmd-form-group">
                                        <label class="bmd-label-floating">Assailant Name</label>
                                        <input type="text" name="assailant" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group label-floating is-empty bmd-form-group">
                                <label class="bmd-label-floating">Affiliation</label>
                                <input type="email" name="affiliation" class="form-control">
                                <span class="material-input"></span>
                            </div>
                            <div class="col-md-6 justify-content-center">
                                        <select name="state_id" class="form-control selectpicker" data-style="" id="state">
                                            <option value="">- Please select the state -</option>
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
                            {{-- <div class="form-group label-floating is-empty bmd-form-group">
                                <label class="bmd-label-floating">Location</label>
                                <input type="text" name="location" class="form-control">
                                <span class="material-input"></span>
                            </div> --}}
                            <div class="form-group label-floating is-empty bmd-form-group">
                                <label for="exampleMessage1" class="bmd-label-floating">Report Description</label>
                                <textarea name="description" class="form-control" id="report-description" rows="6"></textarea>
                                <span class="material-input"></span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

    </script>

@endsection