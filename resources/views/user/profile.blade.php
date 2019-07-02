@extends('layouts.app')


@section('body-class', 'profile-page sidebar-collapse')


@section('content')
    
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('/img/city-profile.jpg') }}');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="{{ asset('/img/genericUser.png') }}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
              <h3 class="title">{{ $user->name }}</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="description text-center">
            <a href="{{ route('addReportForm') }}" class="btn btn-lg btn-primary justify-content-end">
                <i class="material-icons pr-2">create</i>
                Submit Report
            </a>
        </div>
        <div class="row">
                <div class="card">
                    {{-- <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">
                            description
                        </i>
                        </div>
                        <h4 class="card-title">
                        My Reports
                        </h4>
                    </div> --}}

                    @php
                    $user = Auth::user();
                    $userReports = App\Report::where('user_id', $user->id)->get();
                    @endphp 

                <div class="card-body">
                    @if ($userReports->isEmpty())
                      <h4 class="text-center">You have not submit any reports yet.</h4>
                    @else
                      @component('components.user.reports', ['reports' => $userReports])
                              
                      @endcomponent
                  @endif
                  
                </div>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection