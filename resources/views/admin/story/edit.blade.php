@extends('layouts.admin.app')

@section('admin-nav-title', 'Edit Story')

@section('content')

<div class="row">
  <div class="col-md-12">
    @if (isset($_GET['success']) && $_GET['success'] == 1)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Story has been saved successfully.
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
    <form id="" class="form-horizontal" action="{{ route('adminUpdateStory') }}" 
      method="POST" novalidate="novalidate" enctype="multipart/form-data">
      @csrf
      <div class="card ">
        <div class="card-header card-header-default card-header-text">
          <div class="card-text">
            <h4 class="card-title">{{ $story->title }}</h4>
          </div>
        </div>
        <div class="card-body">

            <div class="form-group my-5">
                <label for="">
                Author
                </label>
                <input name="author" value="{{ $story->author }}" type="text" class="form-control" placeholder="Author">
            </div>

            <div class="form-group my-5">
                <label for="">
                Story Title
                </label>
                <input name="title" value="{{ $story->title }}" type="text" class="form-control" placeholder="Title">
            </div>

            <div class="form-group my-5">
                <label for="">
                Story
                </label><br><br>
                <textarea name="story" class="form-control" id="story" rows="6">{{ $story->story }}</textarea>
            </div>

            <div class="form-group my-5">
                <label for="">
                Tags
                </label>
                <input type="text" value="{{ $story->tags }}" name="tags" class="form-control tagsinput" 
                data-role="tagsinput" data-color="danger">
            </div>

            @if ($story->status_id == 1)
            <div class="form-group-my-5">
                <label for="">
                    Status
                </label>
                <select class="form-control selectpicker" name="status_id" id="status_id">
                    <option value="1" @if ($story->status_id == 1) {{ "selected" }} @endif>
                        Save As Draft
                    </option>
                    <option value="2" @if ($story->status_id == 2) {{ "selected" }} @endif>
                        Submit For Approval
                    </option>
                </select>
            </div>
            @else
            <div class="form-group my-5">
                <label for="">
                    Status
                </label>
                <input name="status_id" value="{{ App\Status::findOrFail($story->status_id)->name }}" type="text" 
                    class="form-control" placeholder="status" disabled>
            </div>
            @endif

            <input type="hidden" name="id" value="{{ $story->id }}" />
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-info">
            <i class="material-icons">add</i>
            Submit Story
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection

@section('scripts')
  <script>
      <!-- classic ckeditor init -->
      ClassicEditor
        .create( document.querySelector( '#story' ) )
        .then( editor => {
            //console.log( editor );
        } )
        .catch( error => {
            //console.error( error );
        } );
  </script>
@endsection