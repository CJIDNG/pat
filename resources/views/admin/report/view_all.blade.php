@extends('layouts.admin.app')

@section('admin-nav-title', 'All Reports')

@section('content')
    
<div class="row">
  <div class="col-md-12">
    @if (isset($_GET['delete_success']) && $_GET['delete_success'] == 1)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Report has been deleted successfully.
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
    <div class="card">
      <div class="card-header card-header-primary card-header-icon">
        <div class="card-icon">
          <i class="material-icons">
            description
          </i>
        </div>
        <h4 class="card-title">
          Reports
        </h4>
      </div>
      <div class="card-body">
        <div class="toolbar">
          <!-- Here you can write extra buttons/actions for the toolbar -->
        </div>
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
                        rowspan="1" colspan="1" style="min-width: 40px" 
                        aria-sort="ascending" aria-label="Name: activate to sort column descending">
                        Id 
                      </th>
                      <th class="sorting_asc" tabindex="0" aria-controls="datatables" 
                        rowspan="1" colspan="1" style="" 
                        aria-sort="ascending" aria-label="Name: activate to sort column descending">
                        Title
                      </th>
                      <th class="sorting_asc" tabindex="0" aria-controls="datatables" 
                        rowspan="1" colspan="1" style="" 
                        aria-sort="ascending" aria-label="Name: activate to sort column descending">
                        Description
                      </th>
                      <th class="sorting_asc" tabindex="0" aria-controls="datatables" 
                        rowspan="1" colspan="1" style="" 
                        aria-sort="ascending" aria-label="Name: activate to sort column descending">
                        State
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
                        aria-label="Actions: activate to sort column ascending">
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th rowspan="1" colspan="1" style="min-width: 40px">
                        Id 
                      </th>
                      <th rowspan="1" colspan="1">
                        Title
                      </th>
                      <th rowspan="1" colspan="1">
                        Description
                      </th>
                      <th rowspan="1" colspan="1">
                        State
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
                        Actions
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
                        <td>{{ $report->description }}</td>
                        <td>{{ App\State::select('name')->where('id', $report->state_id)->first()->name }}</td>
                        <td>{{ App\ReportType::select('name')->where('id', $report->report_type_id)->first()->name }}</td>
                        <td>
                          <label for="" class="badge {{ $statusColor }}">
                            {{ App\Status::select('name')->where('id', $report->status_id)->first()->name }}
                          </label>
                        </td>
                        <td>{{ $report->date }}</td>
                        <td class="text-right">
                          @can('update', $report)
                          <a href="{{ route('admin/report/edit', ['id'=>$report->id]) }}" class="btn btn-link btn-info btn-just-icon like">
                            <i class="material-icons">edit</i>
                          </a>
                          @endcan
                          <a href="{{ route('showReport', ['id'=>$report->id]) }}" class="btn btn-link btn-warning btn-just-icon edit">
                            <i class="material-icons">dvr</i>
                          </a>
                          @can('delete', $report)
                          <a href="{{ route('adminDeleteReport', ['id'=>$report->id]) }}" class="btn btn-link btn-danger btn-just-icon remove">
                            <i class="material-icons">close</i>
                          </a>
                          @endcan
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
        <!-- end col-md-12 -->
      </div>
      <!-- end row -->
    </div>
  </div>
</div>


@endsection

@section('scripts')
  <script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
              [10, 25, 50, -1],
              [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
              search: "_INPUT_",
              searchPlaceholder: "Search records",
            },
            dom: 'Bfrtip',
            buttons: [
              'copyHtml5',
              'excelHtml5',
              'csvHtml5',
              'pdfHtml5'
            ],
            "columnDefs": [
              { "visible": false, "targets": 2 },
              { "visible": false, "targets": 3 }
            ]
        });


        /**
          "processing": false,
          "serverSide": false,
          "ajax": "#"
        **/
    });
  </script>    
@endsection
