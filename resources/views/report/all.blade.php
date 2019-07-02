@extends('layouts.app')

@section('body-class', 'contact-page sidebar-collapse')

@section('nav-class', 'navbar bg-light fixed-top navbar-expand-lg')


@section('content')
  {{-- <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('{{ asset('img/bg10.jpg') }}');">
  </div> --}}
  <div class="main" style="min-height: 100vh">
    {{-- <div class="container"> --}}
        <div class="section">
          <h2 class="title text-center">Tracked Reports</h2>
        </div> 
       <div class="row justify-content-center">
        <div class="col-md-12">
          <ul class="nav nav-pills nav-pills-icons justify-content-center mb-4" role="tablist">
            <!--
                            color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                        -->
            <li class="nav-item">
              <a class="nav-link active show" href="#map-view" role="tab" data-toggle="tab" aria-selected="true">
                <i class="material-icons">place</i> Map View
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#table-view" role="tab" data-toggle="tab" aria-selected="false">
                <i class="material-icons">grid_on</i> Table View
              </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active show" id="map-view">
                <div id="reportsMap" style="width: 100%; height: 600px;"></div>
            </div>
{{-- being datatables tab --}}
            <div class="tab-pane" id="table-view">
              <div class="section">
                <div class="toolbar row justify-content-center">

                    <a href="{{ route('contact') }}" class="btn btn-info" role="button">
                        Request Report(s) Download
                      </a>
                    <!-- Here you can write extra buttons/actions for the toolbar -->
                  </div>
              <div class="container">
                <div class="material-datatables">
                  <div id="datatables_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                      <div class="col-sm-12">
                        <table id="datatables" 
                          class="table table-striped table-no-bordered table-hover dataTable dtr-inline" 
                          cellspacing="0" width="100%" style="width: 100%;" 
                          role="grid" aria-describedby="datatables_info">
                          <thead>
                            <tr role="row">
                              <th class="sorting_asc" tabindex="0" aria-controls="datatables" 
                                rowspan="1" colspan="1" style="" 
                                aria-sort="ascending" aria-label="Name: activate to sort column descending">
                                Id
                              </th>
                              <th class="sorting_asc" tabindex="0" aria-controls="datatables" 
                                rowspan="1" colspan="1" style="" 
                                aria-sort="ascending" aria-label="Name: activate to sort column descending">
                                Title
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="datatables" 
                                rowspan="1" colspan="1" style="" 
                                aria-label="Position: activate to sort column ascending">
                                Report Type
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="datatables" 
                                rowspan="1" colspan="1" style="" 
                                aria-label="Office: activate to sort column ascending">
                                Status
                              </th>
                              <th class="sorting" tabindex="0" aria-controls="datatables" 
                                rowspan="1" colspan="1" style="" 
                                aria-label="Date: activate to sort column ascending">
                                Date
                              </th>
                              <th class="disabled-sorting text-right sorting" 
                                tabindex="0" aria-controls="datatables" rowspan="1" 
                                colspan="1" style="" 
                                aria-label="View: activate to sort column ascending">
                                View
                              </th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th rowspan="1" colspan="1">
                                Id
                              </th>
                              <th rowspan="1" colspan="1">
                                Title
                              </th>
                              <th rowspan="1" colspan="1">
                                Report Type
                              </th>
                              <th rowspan="1" colspan="1">
                                Status
                              </th>
                              <th rowspan="1" colspan="1">
                                Date
                              </th>
                              <th class="text-right" rowspan="1" colspan="1">
                                View
                              </th>
                            </tr>
                          </tfoot>
                          <tbody>
                            @for ($i = 0; $i < count($reports); $i++)
                              @php
                                $report = $reports[$i];
        
                                if($report->status_id == 4) {
                                  $statusColor = 'badge-danger';
                                } else if($report->status_id == 5) {
                                  $statusColor = 'badge-success';
                                }
                              @endphp
        
                              <tr role="row" class="odd">
                                <td tabindex="0" class="sorting_1">
                                  {{ $i + 1 }}
                                </td>
                                @php
                                $fish = $report->title;
                                $len = strLen($fish);
                                
                                if($len > 30){
                                  $fish = substr($report->title, 0, 30).'...' ;
                                }
                              @endphp
                                <td>{{ $fish }}</td>
                                <td>{{ App\ReportType::select('name')->where('id', $report->report_type_id)->first()->name }}</td>
                                <td>
                                  <label for="" class="badge {{ $statusColor }}">
                                    {{ App\Status::select('name')->where('id', $report->status_id)->first()->name }}
                                  </label>
                                </td>
                                <td>{{ $report->date }}</td>
                                <td class="text-right">
                                  {{-- @can('update', $report)
                                  <a href="{{ route('admin/report/edit', ['id'=>$report->id]) }}" class="btn btn-link btn-info btn-just-icon like">
                                    <i class="material-icons">edit</i>
                                  </a>
                                  @endcan --}}
                                  <a href="{{ route('report', ['id'=>$report->id]) }}" class="btn btn-link btn-warning btn-just-icon edit">
                                    <i class="material-icons">dvr</i>
                                  </a>
                                  {{-- @can('delete', $report)
                                  <a href="{{ route('adminDeleteReport', ['id'=>$report->id]) }}" class="btn btn-link btn-danger btn-just-icon remove">
                                    <i class="material-icons">close</i>
                                  </a>
                                  @endcan --}}
                                </td>
                              </tr>
                            @endfor
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- end content-->
                  </div>
                  <!--  end card  -->
                </div>
              </div>
{{-- end datatables tab --}}
            </div>
          </div>
          </div>
        </div>
      </div>
{{-- End Nav-Tabs --}}
       
{{-- End Section --}}
      </div>
    </div>
    {{-- </div> --}}
    </div>
    </div>
  </div>

  

  @endsection

  @section('scripts')
  <script>
      $(document).ready(function() {
        let map = nonBelievers.reportMap(
          "reportsMap"
        );

       //let reports = JSON.stringify()

        // L.marker([7.9876, 7.3456]).addTo(map)
        //     .bindPopup(desc)
        //     .openPopup();


        let reports = @php echo App\Report::with(['state', 'reportType'])->get() @endphp;

        
//         var icon = L.icon({
//           iconUrl: '{{ asset('img/map-markers/denial_of_access_marker.png') }}',
//           shadowUrl: '{{ asset('img/map-markers/marker_shadow.png') }}',

//           iconSize:     [40, 85], // size of the icon
//           shadowSize:   [75, 64], // size of the shadow
//           iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
//           shadowAnchor: [4, 62],  // the same for the shadow
//           popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
// });

        var physical = L.layerGroup(), 
            arrest = L.layerGroup(), 
            border = L.layerGroup(), 
            seizure = L.layerGroup(), 
            damage = L.layerGroup(), 
            access = L.layerGroup(), 
            threat = L.layerGroup(), 
            harrassment = L.layerGroup();

        for(var i = 0; i < reports.length; i++){
          var state = reports[i].state;
          var title = reports[i].title;
          var id = reports[i].id;
          var type = reports[i].report_type.name;

          var marker = L.marker([state.latitude, state.longitude], {title: title});
          marker.bindPopup("<b>" + title + "</b><br>Type: " + type + "<br> <a href='/report/view/" + id + "'> Read More.. </a>" );

          switch(type) {
                case "Physical Attack":
                //change icon
                  marker.addTo(physical);
                  break;
                case "Arrest":
                  marker.addTo(arrest);
                  break;
                case "Border Stop":
                  marker.addTo(border);
                  break;
                case "Equiptment Search Or Seizure":
                  marker.addTo(seizure);
                  break;
                case "Equiptment Or Property Damage":
                  marker.addTo(damage);
                  break;
                case "Denial Of Access":
                  marker.addTo(access);
                  break;
                case "Threat":
                  marker.addTo(threat);
                  break;
                case "Harrassment":
                  marker.addTo(harrassment);
                  break;
              }
            }

            physical.addTo(map);
            arrest.addTo(map);
            border.addTo(map); 
            seizure.addTo(map); 
            damage.addTo(map);
            access.addTo(map); 
            threat.addTo(map); 
            harrassment.addTo(map);

              var type_group = {
                "Physical Attack": physical,
                "Arrest": arrest,
                "Border Stop": border,
                "Equiptment Search Or Seizure": seizure,
                "Equipement Or Property Damage": damage,
                "Denial Of Access": access,
                "Threat": threat,
                "Harrassment": harrassment
              };


              L.control.layers(null, type_group).addTo(map);
        
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
              [5, 10, 20, -1],
              [5, 10, 20, "All"]
            ],
            responsive: true,
            language: {
              search: "_INPUT_",
              searchPlaceholder: "Search records",
            }
        });

      });

  </script>


@endsection