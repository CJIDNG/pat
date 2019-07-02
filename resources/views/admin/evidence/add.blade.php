@extends('layouts.admin.app')

@section('admin-nav-title', 'Upload Evidence')

@section('content')

<div class="row">
  <div class="col-md-12">
    @if (isset($_GET['success']) && $_GET['success'] == 1)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Evidence has been uploaded successfully.
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
    <form id="" class="form-horizontal" action="{{ route('adminAddEvidence') }}" 
      method="POST" novalidate="novalidate" enctype="multipart/form-data">
      @csrf
      <div class="card ">
        <div class="card-header card-header-default card-header-text">
          <div class="card-text">
            <h4 class="card-title">{{ $report->title }}</h4>
          </div>
        </div>
        <div class="card-body">

            {{--<div class="card mb-3">
                <img class="card-img-top" 
                src="{{ asset('storage/'.$report->thumbnail) }}" alt="Card image cap">
                
            </div>--}}

            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <label for="">
                    Evidence Upload(max: 2mb)
                    <small>
                        (jpeg,bmp,png,pdf,txt,html,jpg,doc,docx,xls,csv,tsv)
                    </small>
                </label><br>
                <input type="file" name="file" class="form-control">
            </div>

            <input type="hidden" name="report_id" value="{{ $report->id }}" />
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-info">
            <i class="material-icons">add</i>
            Upload
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection

@section('scripts')

@endsection