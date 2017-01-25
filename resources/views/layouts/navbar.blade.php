<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" id="appname" href="{{ url('/home') }}">
                E-tudiant
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Se connecter</a></li>
                    <!--A deplacer-->
                    <li><a href="{{ url('/register') }}">Se créer un compte</a></li>
                    <!--A deplacer-->
                @else
                    @if(Auth::user()->role_id == 3)
                        @include('blocks.menuApprenant')
                    @elseif(Auth::user()->role_id == 2)
                        @include('blocks.menuFormateur')
                    @elseif(Auth::user()->role_id == 1)
                        @include('blocks.menuAdmin')
                    @endif
                    <li>
                        <a href="{{ url('/logout') }}" title="déconnexion"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>

                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                @endif
            </ul>
        </div>
    </div>
</nav>

<style>
    #appname{
        font-family: ReenieBeanie;
        color: black;
        font-size: 35px;
    }
</style>