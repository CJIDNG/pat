<nav class="@yield('nav-class')" 
     id="sectionsNav">
     {{-- color-on-scroll="100" --}}
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Press Attack Tracker') }} 
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">description</i>
                        Reports
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('reports', ['flag' => true]) }}">Browse Reports</a>
                        <a class="dropdown-item" href="{{ route('addReportForm') }}">Submit Report</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('stories') }}" class="nav-link">
                        <i class="material-icons">insert_comment</i>
                        Stories
                    </a>
                </li>
                <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                        <i class="material-icons">live_help</i>
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://isupportfreepress.pressattack.ng/" class="nav-link" target="_blank">
                        <i class="material-icons">record_voice_over</i>
                        #iSupportFreePress
                    </a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="material-icons">person</i>
                            {{ __('Login') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="material-icons">person_add</i>
                            {{ __('Register') }}
                        </a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="material-icons">face</i>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            
                            @if (Auth::user()->hasAnyRole(['administrator', 'journalist'])) 
                            <a href="{{ route('dashboard') }}" class="dropdown-item">
                                Admin Panel
                            </a>
                            @endif

                            @if (!Auth::user()->hasAnyRole(['administrator', 'journalist'])) 
                            <a href="{{ route('userPage', ['id'=>Auth::user()->id]) }}" class="dropdown-item">
                                 My Profile
                            </a>
                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" 
                                method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>