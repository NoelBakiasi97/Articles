<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <div class="container">
    <a class="navbar-brand" href="{{route('welcome')}}">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ml-auto ">
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
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <div class="dropDiv">
                    <a class="dropdown-item colorDrop " href="{{ route('myProfil') }}">
                       My profile
                    </a>
                </div>
                @if (Auth::user()->id_role==1 )
                    <div class="dropDiv">
                        <a class="dropdown-item colorDrop " href="{{ route('users') }}">
                        Users
                        </a>
                    </div>
                    <div class="dropDiv">
                        <a class="dropdown-item colorDrop " href="{{ route('lecteurRequest') }}">
                            Lecteur requests
                            @if ($lecteurcount==0)
                            @else
                                <span class="badge badge-primary">{{$lecteurcount}}</span>
                            @endif
                        </a>
                    </div>
                    <div class="dropDiv">
                        <a class="dropdown-item colorDrop " href="{{ route('redacteurRequests') }}">
                            Redacteur requests
                            @if ($redacteurcount==0)
                            @else
                            <span class="badge badge-primary">{{$redacteurcount}}</span>
                            @endif
                        </a>
                    </div>
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