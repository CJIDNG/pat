<!-- Modal -->
<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" 
    aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserModalLabel">New User</h5>
                <button type="button" class="close" data-dismiss="modal" 
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="addUserForm" id="addUserForm" method="POST" action="{{ route('addNewUser') }}">
                    @csrf
                    <div class="form-group bmd-form-group">
                        <label for="name" class="bmd-label-floating">
                            Name
                        </label>
                        <input type="name" class="form-control" 
                            id="name" name="name">
                    </div>
                    <div class="form-group bmd-form-group">
                        <label for="email" class="bmd-label-floating">
                            Email Address
                        </label>
                        <input type="email" class="form-control" 
                            id="email" name="email">
                    </div>
                    <div class="form-group bmd-form-group">
                        <label for="password" class="bmd-label-floating">
                            Password
                        </label>
                        <input type="password" class="form-control" 
                            id="password" name="password">
                    </div>
                    <div class="form-group bmd-form-group">
                        <label for="password_confirmation" class="bmd-label-floating">
                            Confirm Password
                        </label>
                        <input type="password" class="form-control" 
                            id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="form-group bmd-form-group">
                        <label for="role_id" class="bmd-label-static">Role</label><br>
                        <select name="role_id" id="role_id" class="form-control">
                            @php
                                $roles = App\Role::get();
                            @endphp
                            @for ($i = 0; $i < count($roles); $i++)
                            <option value="{{ $roles[$i]->id }}">{{ $roles[$i]->name }}</option>
                            @endfor
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" 
                    data-dismiss="modal">
                    Close
                </button>
                <button type="submit" form="addUserForm"
                    class="btn btn-primary">
                    Add
                </button>
            </div>
        </div>
    </div>
</div>