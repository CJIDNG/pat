@extends('layouts.admin.app')

@section('admin-nav-title', substr($story->title, 0, 30))

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


    <!-- storys Metrics  -->
    @component('components.admin.story.metrics', ['story'=>$story])
        
    @endcomponent


    <div class="row">
        <!-- Story body -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">
                            insert_comment
                        </i>
                    </div>
                    <h4 class="card-title">
                        {{ $story->title }} by
                        <small>
                            {{ $story->author }}
                        </small>
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Toolbar -->
                    <div class="toolbar">
                        @can('update', $story)
                        <a href="{{ route('editStory', ['id'=>$story->id]) }}" 
                            class="btn btn-info btn-sm">
                            <i class="material-icons">edit</i>
                            Edit
                        </a>
                        <a href="{{ route('updateThumbnail', ['id'=>$story->id]) }}" 
                            class="btn btn-info btn-sm">
                            <i class="material-icons">image</i>
                            Change Thumbnail
                        </a>
                        @endcan
                        @if ($story->status_id == 2)
                        <label class="badge badge-warning badge-lg">
                            Awaiting Approval
                        </label>
                        @endif
                    </div>
                    <hr>

                    <!-- story Description -->
                    <div class="content my-5">

                        <div class="card mb-3">
                            <img class="card-img-top" 
                            src="{{ asset('storage/'.$story->thumbnail) }}" alt="Card image cap">
                            
                        </div>

                        {!! $story->story !!}
                    </div>

                </div>
            </div>
        </div>

        <!-- Story Details -->
        <div class="col-md-4">
            <!-- story Details -->
            @component('components.admin.story.details', ['story'=>$story])
                
            @endcomponent


            <!-- Submitted By -->
            <div class="card card-testimonial">
                <div class="icon">
                    <i class="material-icons">person</i>
                </div>
                <div class="card-body">
                    <h5 class="card-description">
                        Created By
                    </h5>
                </div>
                <div class="card-footer">
                    <h4 class="card-title">
                        {{ $story->user->name }}
                    </h4>
                </div>
            </div>
            <br><br>


        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection