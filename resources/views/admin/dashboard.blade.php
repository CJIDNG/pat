@extends('layouts.admin.app')



@section('content')

@php
    $states = App\State::withcount('reports')->get();
@endphp

<div class="row">
        <div class="col">
            <div id="changeMe"></div>
        </div>
    </div>
<div class="row">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons"></i>
              </div>
              <h4 class="card-title">Submitted Reports by State</h4>
            </div>
            <div class="card-body">
              <div class="row">
                 <div class="col-md-6">
                    <table id="statesTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>State</th>
                                <th># of Reports</th>
                                <th>% of Reports</th>
                                <th>Last Submitted Report</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @for ($i = 0; $i < count($states); $i++)
            
                                        @php
                                            $state = $states[$i];
                                            $count = $state->reports_count;  
                                            $percent = sprintf("%.2f%%", ($count / App\Report::count()) * 100);
                                            $findDate = App\Report::select('created_at')->where('state_id', $state->id)->latest()->first();
                                        

                                            if(empty($findDate)){
                                                $lastDate = 'N/A';
                                                
                    
                                            }else{
                                                $lastDate = $findDate->created_at->format('d/m/Y');
                                            }

                                        @endphp
                                    
                                        <tr>
                                            <td>{{ $state->name }}</td>
                                            <td>{{ $count }}</td>
                                            <td>{{ $percent }}</td>
                                            <td>{{ $lastDate }}</td>
                                        </tr>
                                 @endfor
                                </tbody>
                            <tfoot>
                                <tr>
                                        <th>State</th>
                                        <th># of Reports</th>
                                        <th>% of Reports</th>
                                        <th>Last Submitted Report</th>
                                </tr>
                            </tfoot>
                        </table>
                        <br>
                    </div>
                    <div class="col-md-6 ml-auto mr-auto">
                    <div id="mapsvg"></div>
                    </div>
                    </div>
                    </div>
                    </div>
                  </div>
                </div>
                  <div class="row">
                      <div class="col col-md-6">
                  @component('components.admin.dashboard.new_submittions')
    
                  @endcomponent

                  
                    @component('components.admin.dashboard.report_graph')
                          
                    @endcomponent
                 
                    
                        </div>
                      <div class="col col-md-6">

            @if (Auth::user()->hasRole('administrator'))
                  @component('components.admin.dashboard.unverified_submittions')
                      
                  @endcomponent
            @endif
                      @component('components.admin.dashboard.top_stats')
                          
                      @endcomponent
                      
                    </div>
                  </div>
@endsection
@section('scripts')
    <script>

// let states = @php echo App\State::with('reports')->withCount('reports')->get() @endphp;
// console.log(states);
// let regions = [];
// for (let i = 0; i < states.length; i++) {
//     var name = states[i].name;
//     var numReports = states[i].reports_count;
//     var region = nonBelievers.getRegions(name, numReports);
//     regions.push(region);
// }

$(document).ready(function() {
    $('#statesTable').DataTable( {
        scrollY: "30vh",
        scrollCollapse: true,
        paging: false,
        responsive: true,
        language: {
              search: "_INPUT_",
              searchPlaceholder: "Search records",
            }
    });

    let byMonth = @php echo App\Report::all()->groupBy(function($date) {
        return Carbon\Carbon::parse($date->created_at)->format('m');
    }); @endphp;

    let byReportType = @php echo App\ReportType::with('reports')->get() @endphp;

    nonBelievers.initCharts(byMonth, byReportType);

} );

let reports = @php echo App\Report::with(['state', 'reportType'])->get() @endphp;

marks = [];

for(var i = 0; i < reports.length; i++){
          var state = reports[i].state;
          var title = reports[i].title;
          var id = reports[i].id;
          var type = reports[i].report_type.name;

          var m = {
              geoCoords: [state.latitude, state.longitude]
          };

          marks.push(m);

        }
let svgM = $('#mapsvg').mapSvg(
                {
                    source: '{{ asset('/img/svg-map/nigeria.svg') }}',
                    responsive: true,
                    preloaderText: "Map is loading...",
                    colors: {
                        background: transparent,
                        base: '#5ab15e',
                        hover: '#ffffff',
                        stroke: '#000000'
                    },
                    markers: marks,
                    tooltips: {
                        mode: "title"
                    },
                        
                            

});

    </script>
@endsection



