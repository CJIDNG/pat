@extends('layouts.admin.app')

@section('admin-nav-title', 'New Story')

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
    <form id="" class="form-horizontal" action="{{ route('adminAddStory') }}" 
      method="POST" novalidate="novalidate" enctype="multipart/form-data">
      @csrf
      <div class="card ">
        <div class="card-header card-header-default card-header-text">
          <div class="card-text">
            <h4 class="card-title">New Story</h4>
          </div>
        </div>
        <div class="card-body">

          <div class="form-group my-5">
            <label for="">
              Author
            </label>
            <input name="author" type="text" class="form-control" placeholder="Author">
          </div>

          <div class="form-group my-5">
            <label for="">
              Story Title
            </label>
            <input name="title" type="text" class="form-control" placeholder="Title">
          </div>

          <div class="form-group my-5">
            <label for="">
              Story
            </label><br><br>
            <textarea name="story" class="form-control" id="story" rows="6"></textarea>
          </div>

          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
            <label for="">
              Thumbnail(max: 2mb)
            </label><br>
            <div class="fileinput-new thumbnail">
              <img src="{{ asset('img/image_placeholder.jpg') }}" alt="...">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail"></div>
            <div>
              <span class="btn btn-rose btn-round btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="thumbnail">
              </span>
              <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
            </div>
          </div>

          <div class="form-group my-5">
            <label for="">
              Tags
            </label>
            @php
                $titleArray = explode(' ', $report->title);
                $sampleTags = implode(',', $titleArray);
            @endphp
            <input type="text" value="{{ $sampleTags }}" name="tags" class="form-control tagsinput" 
            data-role="tagsinput" data-color="danger">
          </div>

          <div class="form-group-my-5">
            <label for="">
              Status
            </label>
            <select class="form-control selectpicker" name="status_id" id="status_id">
              <option value="1">
                Save As Draft
              </option>
              <option value="2">
                Submit For Approval
              </option>
            </select>
          </div>

          <input type="hidden" name="report_id" value="{{ $report->id }}" />
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