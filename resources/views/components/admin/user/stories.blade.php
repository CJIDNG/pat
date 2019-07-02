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
                      Submitted By
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
                      Created By
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
                  @for ($i = 0; $i < count($stories); $i++)
                    @php
                      $story = $stories[$i];

                      if($story->status_id == 1) {
                        $statusColor = 'badge-danger';
                      } else if($story->status_id == 2) {
                        $statusColor = 'badge-warning';
                      } else if($story->status_id == 3) {
                        $statusColor = 'badge-success';
                      }
                    @endphp

                    <tr role="row" class="odd">
                      <td tabindex="0" class="sorting_1">
                        {{ $i + 1 }}
                      </td>
                      <td>{{ $story->title }}</td>
                      <td>{{ $story->user->name }}</td>
                      <td>
                        <label for="" class="badge {{ $statusColor }}">
                          {{ App\Status::select('name')->where('id', $story->status_id)->first()->name }}
                        </label>
                      </td>
                      <td>{{ $story->created_at }}</td>
                      <td class="text-right">
                        @can('update', $story)
                        <a href="{{ route('editStory', ['id'=>$story->id]) }}" class="btn btn-link btn-info btn-just-icon like">
                          <i class="material-icons">edit</i>
                        </a>
                        @endcan
                        <a href="{{ route('showStory', ['id'=>$story->id]) }}" class="btn btn-link btn-warning btn-just-icon edit">
                          <i class="material-icons">dvr</i>
                        </a>
                        @can('delete', $story)
                        <a href="{{ route('adminDeleteStory', ['id'=>$story->id]) }}" class="btn btn-link btn-danger btn-just-icon remove">
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