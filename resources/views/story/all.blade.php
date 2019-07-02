@extends('layouts.app')

@section('body-class', 'contact-page sidebar-collapse')


@section('content')

<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('{{ asset('img/multi-free-fists.jpg') }}');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto text-center">
          <h2 class="title">What the Journalists are Saying</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <div class="row justify-content-center">
               
        {{ $stories->links() }}
        <div class="row">
          @foreach ($stories as $story)
          @php
              $description = $story->story;
          $len = strLen($description);
          
          if($len > 100){
            $description = substr($story->story, 0, 100).'...' ;

          }
          @endphp
              
          <div class="col-md-4">
            <div class="card card-blog">
              <div class="card-header card-header-image">
              <a href="{{ route('story', ['id' => $story->id]) }}">
                  <img class="img img-raised" src="{{ asset('storage/'.$story->thumbnail) }}">
              </a>
              </div>
              <div class="card-body">
              <h4 class="card-title">
                  <a href="{{ route('story', ['id' => $story->id]) }}">{{ $story->title }}</a>
              </h4>
              <p class="card-description">
                  {!! $description !!}
                  <a class="text-info" href="{{ route('story', ['$id' => $story->id]) }}"> Read More </a>
              </p>
              </div>
            </div>
          </div>

          @endforeach
        </div>
        {{ $stories->links() }}
        {{-- <div class="row justify-content-center">
                <nav aria-label="page navigation">
                    <ul class="pagination ">
                        <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                    </nav>
            </div> --}}
      </div>
    </div>
    </div>
    </div>
  </div>

  @endsection