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
                      aria-label="Actions: activate to sort column ascending">
                      Actions
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
                      <td>{{ substr($report->title, 0, 30).'...' }}</td>
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
            }
        });


        /**
          "processing": false,
          "serverSide": false,
          "ajax": "#"
        **/
    });
  </script>    
@endsection