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
    <form id="" class="form-horizontal" action="{{ route('adminUpdateStoryThumb') }}" 
      method="POST" novalidate="novalidate" enctype="multipart/form-data">
      @csrf
      <div class="card ">
        <div class="card-header card-header-default card-header-text">
          <div class="card-text">
            <h4 class="card-title">{{ $story->title }}</h4>
          </div>
        </div>
        <div class="card-body">

            {{--<div class="card mb-3">
                <img class="card-img-top" 
                src="{{ asset('storage/'.$story->thumbnail) }}" alt="Card image cap">
                
            </div>--}}

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
                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" 
                        data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                </div>
            </div>

            <input type="hidden" name="id" value="{{ $story->id }}" />
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-info">
            <i class="material-icons">add</i>
            Update Thumbnail
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection

@section('scripts')

@endsection