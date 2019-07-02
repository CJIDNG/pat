{{-- SIDEBAR --}}
<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{ asset('img/sidebar-1.jpg') }}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo mx-3">
      <a href="{{ route('home') }}" class="simple-text logo-normal">
        Press Attack Tracker
      </a> 
    </div>
    <div class="sidebar-wrapper">
      <div class="user">
        <div class="photo">
          <img src="{{ asset('img/default-avatar.png') }}">
        </div>
        <div class="user-info">
          <a data-toggle="collapse" href="#collapseExample" class="username collapsed" aria-expanded="false">
            <span>
              {{ Auth::user()->name }} <b class="caret"></b>
            </span>
          </a>
          <div class="collapse" id="collapseExample" style="">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('showUser', ['id'=>Auth::user()->id]) }}">
                  <span class="sidebar-mini"> MP </span>
                  <span class="sidebar-normal"> My Profile </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('adminSubmissions', ['id'=>Auth::user()->id]) }}">
                  <span class="sidebar-mini"> MS </span>
                  <span class="sidebar-normal"> My Submissions </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <span class="sidebar-mini"> LO </span>
                  <span class="sidebar-normal"> Logout </span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" 
                    method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <ul class="nav">
        <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="material-icons">dashboard</i>
            <p> Dashboard </p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" data-toggle="collapse" href="#report-dropdown">
            <i class="material-icons">description</i>
            <p> Reports
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse" id="report-dropdown">
            <ul class="nav">
              <li class="nav-item ">
              <a class="nav-link" href="{{ route('admin/report/view_all') }}">
                  <span class="sidebar-mini"> MR </span>
                  <span class="sidebar-normal"> Manage Reports </span>
                </a>
              </li>
              <li class="nav-item ">
              <a class="nav-link" href="{{ route('admin/report/add') }}">
                  <span class="sidebar-mini"> AR </span>
                  <span class="sidebar-normal"> Add Report </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="{{ route('reports', ['flag' => true]) }}">
                  <span class="sidebar-mini"> VRM </span>
                  <span class="sidebar-normal"> View Report Map </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item ">
          <a class="nav-link" data-toggle="collapse" href="#post-dropdown">
            <i class="material-icons">insert_comment</i>
            <p> Stories
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse" id="post-dropdown">
            <ul class="nav">
              <li class="nav-item ">
                <a class="nav-link" href="{{ route('allStories') }}">
                  <span class="sidebar-mini"> MS </span>
                  <span class="sidebar-normal"> Manage Stories </span>
                </a>
              </li>
            </ul>
          </div>
        </li>  
        @if (Auth::user()->hasRole('administrator'))
        <li class="nav-item ">
          <a class="nav-link" data-toggle="collapse" href="#formsExamples">
            <i class="material-icons">settings</i>
            <p> 
              Config
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse" id="formsExamples">
            <ul class="nav">
              <li class="nav-item ">
                <a class="nav-link" href="{{ route('users') }}">
                  <span class="sidebar-mini"> MU </span>
                  <span class="sidebar-normal"> Manage Users </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        @endif  
      </ul>
    </div>
  <div class="sidebar-background" style="background-image: url({{ asset('img/sidebar-1.jpg') }}) "></div></div>