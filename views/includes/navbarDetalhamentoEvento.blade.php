<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">{{ $evento->descricao }}</a>
        <button class="navbar-toggler bg-primary navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
        </button>
        @guest

        @else
            <ul class="navbar-nav">
                <a class="nav-link text-white" href="/home">{{ __('Home') }}</a>
                <a class="nav-link text-white" href="/selecionar/evento">{{ __('Seus Eventos') }}</a>
                <li class="nav-item dropdown text-white">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Atividade
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <form action="/evento/cadastroAtividade" method="post" id="formCadastrarAtividade">
                            @csrf
                            <input class="form-control" type="hidden" value="{{$evento->id}}" name="evento_id">
                            <a class="dropdown-item" onclick="document.getElementById('formCadastrarAtividade').submit()">Cadastrar</a>
                        </form>
                        <a class="dropdown-item" href="#">Alterar</a>
                        <!-- <form action="/listar/atividades" method="post" id="formListarAtividade"> -->
                            <!-- @csrf -->
                            <!-- <input class="form-control" type="hidden" value="{{$evento->id}}" name="evento_id"> -->
                            <!-- <a class="dropdown-item" onclick="document.getElementById('formListarAtividade').submit()">Consultar</a> -->
                        <!-- </form> -->

                    </div>
                </li>
                <li class="nav-item dropdown text-white">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Vouchers
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <form action="/evento/cadastroVoucher" method="post" id="formCadastrarVoucher">
                            @csrf
                            <input class="form-control" type="hidden" value="{{$evento->id}}" name="evento_id">
                            <a class="dropdown-item" onclick="document.getElementById('formCadastrarVoucher').submit()">Cadastrar</a>
                        </form>
                        <a class="dropdown-item" href="#">Alterar</a>
                        <!-- <a class="dropdown-item" href="#">Consultar</a> -->
                    </div>
                </li>
                <li class="nav-item dropdown text-white">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Inscrições
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <form action="/evento/inscricoes" method="post" id="formInscricoes">
                            @csrf
                            <input class="form-control" type="hidden" value="{{$evento->id}}" name="evento_id">
                            <input class="form-control" type="hidden" value="{{Auth::user()->id}}" name="usuario_id">
                            <a class="dropdown-item" onclick="document.getElementById('formInscricoes').submit()">Inscritos</a>
                        </form>
                        <!-- <a class="dropdown-item" href="#">Pendentes</a> -->
                    </div>
                </li>
            </ul>


        @endguest
        <div class="collapse navbar-collapse" id="navbarResponsive">
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


                            @endguest
                        </ul>

                    </div>



        </div>

    </div>

</nav>
@endguest
