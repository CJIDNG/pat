@extends('layouts.app')

@section('content')

  <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/jail-bars.jpg')}}')">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand text-center">
            <h1 class="title">Press Attack Tracker</h1>
            <h3 class="description text-center">
  
            Records of attacks and harassment on Nigerian Journalists.
              
            </h3>
          </div>
        </div>
      </div>



      <div class="row text-center my-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-text card-header-info">
                  <div class="card-text">
                    <h2 class="card-title">{{ App\Report::count() }} </h2>
                  </div>
                </div>
                <div class="display-4 card-description text-center my-2">
                  Total Reports
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-text card-header-primary">
                  <div class="card-text">
                  <h2 class="card-title">{{ App\Status::withCount('reports')->where('name', 'Verified')->first()->reports_count}} </h2>
                  </div>
                </div>
                <div class="display-4 card-description text-center my-2">
                  Verified Reports
                </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="card">
              <div class="card-header card-header-text card-header-danger">
                <div class="card-text">
                  <h2 class="card-title">{{ App\ReportType::withCount('reports')->where('name', 'Physical Attack')->first()->reports_count}} </h2>
                </div>
              </div>
              <div class="display-4 card-description text-center my-2">
                Violent Reports
              </div>
          </div>
        </div>
    </div>
    
    <div class="row justify-content-md-center">
        <div class="col col-lg-2">
            
          </div>
          <div class="col-md-auto">
          <a href="{{ route('reports', ['flag' => true]) }}" class="btn btn-lg btn-info justify-content-end mr-4">
                  <i class="material-icons pr-2">search</i>
                  Browse Reports
          </a>
              <a href="{{ route('addReportForm') }}" class="btn btn-lg btn-danger justify-content-end">
                  <i class="material-icons pr-2">create</i>
                  Submit Reports
              </a>
              
          </div>
          <div class="col col-lg-2">
            
          </div>



        {{-- <div class="col lg-4">
            
        </div>
        <div class="col lg-4 justify-content-start">
          <button class="btn btn-danger">
            Submit Report
          </button>
        </div> --}}
    </div>
    <br>
  </div>
  </div>


{{-- BLOG POSTS ETC... --}}
<div class="main main-raised">
  <div class="container">
      {{-- <div class="row">
          <div class="card bg-danger">
              <div class="card-body">
              <h2 class="card-title text-center">
              THANKS FOR PARTICIPATING IN BETA TESTING ! 
              </h2>
                  <h4 class="card-title text-center">
                   -- please use the following login details for complete access --
                  </h4>
          
                  <div class="card-stats">
                      <p>
                        <table class="table">
                          <thead>
                              <tr>
                                  <th class="text-center text-white">Role</th>
                                  <th class="text-white">Email</th>
                                  <th class="text-white">Password</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td class="text-center">Administrator</td>
                                  <td>admin@pressattack.ng</td>
                                  <td>testpassword</td>
                              </tr>
                              <tr>
                                  <td class="text-center">Journalist</td>
                                  <td>journalist@pressattack.ng</td>
                                  <td>testpassword</td>
                              </tr>
                              <tr>
                                  <td class="text-center">User</td>
                                  <td>user@pressattack.ng</td>
                                  <td>testpassword</td>
                              </tr>
                          </tbody>
                        </table>
                      </p>
                  </div>
              </div>
          </div>
        </div> --}}
    <div class="section text-center">
      <div class="container">
        <div class="section">
            <h3 class="title text-center">Featured Story</h3>

          <div class="row">
            <div class="col-md-12">

              @php
                  $featured = App\Story::where('status_id', 3)->orderBy('views', 'desc')->first();

                  $stories = App\Story::where('status_id', 3)->inRandomOrder()->limit(3)->get();
                  

              @endphp

              @if ($featured)
    

              <div class="card card-raised card-background" style="background-image: url(' {{asset('storage/'.$featured->thumbnail)}} ')">
                <div class="card-body" style="color: white;">
                <h6 class="card-category text-info">Author: {{ $featured->author }}</h6>
                  <h3 class="card-title">{{ $featured->title }}</h3>

                  @php
                      $description = $featured->story;

                      if(strLen($featured->story) > 100){
                        $description = substr($featured->story, 0, 100).'...';
                      }


                  @endphp

                  <p class="card-description" >
                      {!! $description !!}
                   </p>
                  <a href="{{ route('story',['id' => $featured->id]) }}" class="btn btn-info btn-round btn-sm">
                    <i class="material-icons">subject</i> Read Report Story
                  </a>
               
                </div>
              </div>
              @endif



            </div>
          </div>
        </div>
          <div class="section section-gray px-5">
            <h3 class="title text-center">Read The Latest Stories</h3>
            <div class="row justify-content-center">

              @for ($i = 0; $i < count($stories); $i++)
                  
              
              @php
                  $story = $stories[$i];

                  $desctiption = $story->story;
                    if(strLen($description) > 100){
                      $description = substr($story->story, 0, 100).'... ';
                    }
                    
              @endphp
              
              <div class="col-md-4">
                <div class="card card-blog">
                  <div class="card-header card-header-image">
                    <a href="{{ route('story',['id' => $story->id]) }}">
                      <img class="img img-raised" src="{{ asset('storage/'.$story->thumbnail) }}">
                    </a>
                    <div class="colored-shadow" style="background-image: url( {{ asset('/img/examples/color3.jpg') }} ); opacity: 1;"></div>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="{{ route('story',['id' => $story->id]) }}">
                        {{ $story->title }}
                      </a>
                    </h4>
                    <p class="card-description">
                     {!! $description !!}
                      <a href="{{ route('story',['id' => $story->id]) }}"> Read More </a>
                    </p>
                  </div>
                </div>
              </div>
          @endfor

            </div>
          </div>
        </div>
    </div>
</div>

{{-- 
<div class="subscribe-line subscribe-line-white">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3 class="title">
          Get Tips &amp; Tricks every Week!
        </h3>
        <p class="description">
          Join our newsletter and get news in your 
          inbox every week! We hate spam too, 
          so no worries about this.
        </p>
      </div>
      <div class="col-md-6">
        <div class="card card-plain card-form-horizontal">
          <div class="card-body ">
            <form method="" action="">
              <div class="row">
                  <div class="col-lg-8 col-md-6 ">
                      <span class="bmd-form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">mail</i>
                            </span>
                          </div>
                          <input type="email" value="" placeholder="Your Email..." class="form-control">
                        </div>
                      </span>
                  </div>
                  <div class="col-lg-4 col-md-6 ">
                      <button type="button" class="btn btn-rose btn-round btn-block">Subscribe</button>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}

<hr> 
  
{{-- SOCIAL MEDIA LINKS --}}
<div class="social-line social-line-big-icons social-line-white ">
    <div class="container">
      <div class="row justify-content-center">
        <h3 class="title text-center"> Our Partners</h3>
      </div>
      <div class="row justify-content-center">
          <div class="col-md-2 col-4">
            <a href="https://isupportfreepress.pressattack.ng/" target="_blank">
              <img src="{{ asset('img/partners/FPUlogo.jpg') }}" alt="Free Press Logo" style="width: 125px; height: 100px;">
            </a>
          </div>
         {{-- <div class="col-md-2 col-4">
            <a href="https://www.africmil.org/" target="_blank">
              <img src="{{ asset('img/partners/Africmil-logo.jpg') }}" alt="Africmil Logo" style="width: 125px; height: 100px;">
            </a>
          </div> 
          <div class="col-md-2 col-4">
            <a href="https://www.ipcng.org" target="_blank">
              <img src="{{ asset('img/partners/ipc-logo.png') }}" alt="IPC Logo" style="width: 125px; height: 100px;">
            </a>
          </div> --}}
          <div class="col-md-2 col-4">
            <a href="https://nuj.org.ng/" target="_blank">
              <img src="{{ asset('img/partners/new-nuj-logo-3.jpg') }}" alt="NUJ Logo" style="width: 125px; height: 100px;">
            </a>
          </div>
         {{-- <div class="col-md-2 col-4">
            <a href="https://ptcij.org" target="_blank">
              <img src="{{ asset('img/partners/ptcijlogo.png') }}" alt="PTCIJ Logo" style="width: 125px; height: 100px;">
            </a>
          </div> --}}
          <div class="col-md-2 col-4">
            <a href="https://ptcij.org" target="_blank">
              <img src="{{ asset('img/partners/CWPPFlogo.png') }}" alt="CWPPF Logo" style="width: 125px; height: 100px;">
            </a>
          </div>
        </div>
      </div>
    </div>
</div>
  
{{-- SUBSCRIBE TO US SECTINO --}}
  {{-- <div class="subscribe-line subscribe-line-image" style="background-image: url('{{ asset('img/bg7.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
              <div class="text-center">
                <h3 class="title">Subscribe to our Newsletter</h3>
                <p class="description">
                    Join our newsletter and get news in your inbox every week! We hate spam too, so no worries about this.
                </p>
              </div>
              <div class="card card-raised card-form-horizontal">
                <div class="card-body ">
                    <form method="" action="">
                      <div class="row">
                        <div class="col-lg-8 col-md-6 ">
                          <span class="bmd-form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="material-icons">mail</i>
                                </span>
                              </div>
                              <input type="email" value="" placeholder="Your Email..." class="form-control">
                            </div>
                          </span>
                        </div>
                        <div class="col-lg-4 col-md-6 ">
                            <button type="button" class="btn btn-primary btn-block">Subscribe</button>
                        </div>
                      </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection



