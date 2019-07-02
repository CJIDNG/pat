@extends('layouts.app')


@section('body-class', 'contact-page sidebar-collapse')

@section('content')

<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('{{ asset('storage/'.$story->thumbnail) }}');">
    <div class="container">
        <div class="row justify-content-around">
            @component('components.story.metrics', ['story'=>$story])
                
            @endcomponent
        </div>
    </div>
  </div>
  <div class="main main-raised">

      <div class="card card-nav-tabs">
      <h4 class="card-header card-header-info">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <h3 class="title">{{ $story->title }}</h3>
            </div>
        </div>
      </h4>
      <div class="card-body">
       <div class="section section-text">
        <div class="row">
          <div class="col-8">
            <div class="blockquote undefined">
              <p>
                {!! $story->story !!}
              </p>
            </div>
          </div>
          <div class="col">
            @component('components.story.details', ['story' => $story])
                
            @endcomponent
          </div>
        </div>
      </div>
    <div class="section section-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-center">Other Stories</h2>
            <br>
            <div class="row">
              @component('components.story.stories', ['story' => $story])
                  
              @endcomponent
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</div>

@endsection