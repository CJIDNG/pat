@extends('layouts.admin.app')

@section('admin-nav-title', 'Manage Users')

@section('content')
    
<div class="row">
  <div class="col-md-12">
    @if (isset($_GET['delete_success']) && $_GET['delete_success'] == 1)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      User has been deleted successfully.
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
        <div class="card-header card-header-rose card-header-icon">
            <div class="card-icon">
                <i class="material-icons">
                    face
                </i>
            </div>
            <h4 class="card-title">
                Users
            </h4>
        </div>
        <div class="card-body">
            <!-- Toolbar -->
            <div class="toolbar">
                @can('create', App\User::class)
                <a href="#" data-toggle="modal" data-target="#newUserModal"
                    class="btn btn-info btn-sm">
                    <i class="material-icons">add</i>
                    New User
                </a>
                @endcan
            </div>
            <hr>

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
                                            Name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatables" 
                                            rowspan="1" colspan="1" style="" 
                                            aria-label="Position: activate to sort column ascending">
                                            Email
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatables" 
                                            rowspan="1" colspan="1" style="" 
                                            aria-label="Office: activate to sort column ascending">
                                            Role
                                        </th>
                                        <th class="disabled-sorting sorting" 
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
                                            Name
                                        </th>
                                        <th rowspan="1" colspan="1">
                                            Email
                                        </th>
                                        <th rowspan="1" colspan="1">
                                            Role
                                        </th>
                                        <th rowspan="1" colspan="1">
                                            Actions
                                        </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @for ($i = 0; $i < count($users); $i++)
                                    @php
                                        $user = $users[$i];
                                    @endphp

                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1">
                                        {{ $i + 1 }}
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles()->first()->name }}</td>
                                        <td>
                                        @can('update', $user)
                                        <a href="#" data-toggle="modal" data-target="#editUserModal" 
                                            class="btn btn-link btn-info btn-just-icon like">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        @endcan
                                        {{-- @can('delete', $user)
                                        <a href="" class="btn btn-link btn-danger btn-just-icon remove">
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
            <!-- end col-md-12 -->
        </div>
      <!-- end row -->
    </div>
  </div>
</div>

<!-- New User Form Modal -->
@component('components.admin.user.newUserForm')
    
@endcomponent

<!-- Update User Form Modal -->
@component('components.admin.user.editUserForm')
    
@endcomponent

@endsection

@section('scripts')
  <script>
    $(document).ready(function() {

        //datatables initialization
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

        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })

        /**
          "processing": false,
          "serverSide": false,
          "ajax": "#"
        **/
    });
  </script>    
@endsection
