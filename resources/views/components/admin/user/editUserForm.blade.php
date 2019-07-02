<!-- Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" 
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" 
                    data-dismiss="modal">
                    Close
                </button>
                <button type="button" 
                    class="btn btn-primary">
                    Update
                </button>
            </div>
        </div>
    </div>
</div>