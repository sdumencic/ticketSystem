<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background: linear-gradient(90deg, rgba(64,71,61,0.26684177088804273) 0%, rgba(9,96,121,0.3144608185070903) 52%, rgba(0,212,255,0.25843840954350494) 100%);">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto"></ul>

            <a class="btn btn-success | text-center" style="position: absolute; width: 120px; left: 50%; margin-left: -60px;" href="/posts/create">Create Ticket</a>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="/home">My tickets</a>
                  </li>

                </ul>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}<span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/posts/create">
                               Create Ticket
                            </a>
                            <a class="dropdown-item" href="/home">
                                My tickets
                            </a>
                            @if (Auth::user()->hasAnyRole('admin'))
                              <a class="dropdown-item" href={{route('admin.users.index')}}>Manage users</a>
                            @endif

                            @if (Auth::user()->hasAnyRole('admin') OR Auth::user()->hasAnyRole('employee'))
                            <a class="dropdown-item" href="/posts">Ticket list</a>
                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<br>