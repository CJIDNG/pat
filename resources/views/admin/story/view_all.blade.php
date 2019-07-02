@extends('layouts.admin.app')

@section('admin-nav-title', 'All Stories')

@section('content')
    
<div class="row">
  <div class="col-md-12">
    @if (isset($_GET['delete_success']) && $_GET['delete_success'] == 1)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Story has been deleted successfully.
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
      <div class="card-header card-header-info card-header-icon">
        <div class="card-icon">
          <i class="material-icons">
            insert_comment
          </i>
        </div>
        <h4 class="card-title">
          Stories
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
