<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/images/layout/icon_arpa.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/template.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    </head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark mb-4 template-bg">
        <div class="container">
          <a href="{{ route('dashboard.index') }}"><img src="/images/layout/logo_arpanet_color.png" height="30" alt="ARPAnet"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item px-3">
                <a class="nav-link text-white" href="{{route('dashboard.index')}}"><i id="main" class="bi bi-house-door color-white"></i>Home</a>
              </li>
              <li class="nav-item px-3 dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" ><i id="main" class="bi bi-person"></i>Pessoas</a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('pessoas.create')}}" class="dropdown-item">Cadastrar Novo</a></li>
                    <option value="asssociado">-----------------------</option>
                    <li><a href="{{route('associados.index')}}" class="dropdown-item">Associados</a></li>
                    <li><a href="{{route('contratados.index')}}" class="dropdown-item">Contratados</a></li>
                    <li><a href="#" class="dropdown-item">Compradores</a></li>
                    {{-- @foreach ($departamentos as $departamento)
                    <li><a href="" class="dropdown-item">{{ $departamento->nome }}</a></li>
                    @endforeach --}}

                </ul>
              </li>
              <li class="nav-item px-3">
                {{--Produtos não salvam no banco :D--}}
                <a class="nav-link text-white" href="{{route('produtos.index')}}"><i id="main" class="bi bi-box-seam color-white"></i>Produtos</a> {{-- Rever a estrutura dos produtos --}}
              </li>
              <li class="nav-item px-3">
                {{--Vendas Incompleto, faltam as ligações com o banco--}}
                <a class="nav-link text-white" href="{{route('vendas.index')}}"><i id="main" class="bi bi-cash-coin color-white"></i>Vendas</a>
              </li>

              @can('acessar-usuarios')
                <li class="nav-item px-3">
                  <a class="nav-link text-white" href="{{route('usuarios.index')}}"><i id="main" class="bi bi-key color-white"></i>Usuários</a>
                </li>
              @endcan
              <li class="nav-item px-3 dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"><img class="template-user" src="/storage/usuarios/{{ auth()->user()->foto}}" alt="{{ auth()->user()->name }}" />{{ auth()->user()->name }}</a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{ route('usuarios.alt', auth()->user()->id) }}" class="dropdown-item" title="Alterar Dados, Senha, Foto de Perfil"><i class="bi bi-gear"></i> Configurações</a></li>
                    <li><a href="#" class="dropdown-item" title="Ajuda e Suporte"><i class="bi bi-question-circle"></i> Ajuda e Suporte</a></li>
                    <li><a href="{{ route('login.logout') }}" class="dropdown-item" title="Sair da aplicação"><i class="bi bi-box-arrow-in-right"></i> Sair</a></li>
                </ul>
              </li>

            </ul>
          </div>
        </div>
      </nav>

      <div class="container mb-3 p-4 bg-white shadow h-100 position-relative">
        @yield('conteudo')

      </div>
      <div class="template-footer-fixed">
        <footer class="sticky-footer container-fluid p-3 text-center template-bg mt-5 text-white text-lg-start mx-auto">
            <div class="container text-center text-md-start d-flex flex-row justify-content-center align-items-start">
              <div class="mx-auto flex-fill align-self-center">
                <a href="{{ route('dashboard.index') }}"><img src="/images/layout/logo_branca.png" alt="ARPAnet" height="50px" /></a>
              </div>
              <div class="mx-auto flex-fill">
                <h6 class="fw-bold mb-2">Início</h6>
                <span class="d-block"><a href="{{ route('dashboard.index') }}" class="text-reset text-decoration-none">Home</a></span>
                <span class="d-block"><a href="#" class="text-reset text-decoration-none">Associados</a></span>
                {{-- <span class="d-block"><a href="#" class="text-reset text-decoration-none">Contratados</a></span>
                <span class="d-block"><a href="#" class="text-reset text-decoration-none">Compradores</a></span> --}}
              </div>
              <div class="mx-auto flex-fill">
                <h6 class="fw-bold mb-2">Sobre nós</h6>
                <span class="d-block"><a href="https://www.blogger.com/profile/14072350492570167936" class="text-reset text-decoration-none">Informações</a></span>
                <span class="d-block"><a href="http://arpareciclagem.blogspot.com" class="text-reset text-decoration-none">Blog</a></span>
              </div>
              <div class="mx-auto flex-fill">
                <h6 class="fw-bold mb-2">Redes</h6>
                  <div>
                    <a href="https://pt-br.facebook.com/reciclagemarpa/" class="me-3 text-reset" title="Facebook"><i class="bi bi-facebook template-txt"></i></a>
                    <a href="https://www.instagram.com/arpa7395/" class="me-3 text-reset" title="Instagram"><i class="bi bi-instagram template-txt"></i></a>
                  </div>
              </div>
            </div>
        </footer>
        <div class="text-center p-2 template-footer text-white">
          <span class="text-white-50">&copy; Copyright -</span> ARPAnet <span class="text-white-50">by</span> Centro Universitário UniRios.
          Todos os direitos reservados.
        </div>
      </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/template.js"></script>
    {{-- <script scr="{{ asset('js/template.js') }}"></script> --}}
</body>
</html>
