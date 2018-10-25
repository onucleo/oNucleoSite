<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">Pensalight</a>
        <button class="navbar-toggler bg-primary navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
        </button>
        @guest

        @else
            <a class="nav-link text-white" href="/home">{{ __('Home') }}</a>
            <a class="nav-link text-white" href="/cadastrar/evento">{{ __('Crie seu evento') }}</a>
            <a class="nav-link text-white" href="/selecionar/evento">{{ __('Seus Eventos') }}</a>
            <form action="/home/suasparticipacoes" method="post" id="formSuasParticipacoes">
                @csrf
                <input class="form-control" type="hidden" value="{{Auth::user()->id}}" name="usuario_id">
                <a class="form-control bg-secondary border-0 text-white" onclick="document.getElementById('formSuasParticipacoes').submit()">Suas Participações</a>
            </form>
            
            @can('create', Auth::user())
                <a class="nav-link text-white" href="/selecionar/evento">{{ __('Usuários') }}</a>
            @endcan
        @endguest
        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav ml-auto">

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else

                </div>
                <div class="collapse navbar-collapse" id="navbarResponsive">

                    <ul class="navbar-nav ml-auto">

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->nome }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        @endif


                        @endguest
                    </ul>

                </div>

        </div>

    </div>

</nav>
