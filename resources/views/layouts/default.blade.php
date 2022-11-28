<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/images/layout/icon_arpa.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

</head>
<body>

    <style>
        #main {
  font-size:18px;
  padding-right: 10px;
}
    </style>

    <nav class=" navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container ">
          <a href="#"><img src="/images/layout/logo_arpanet_color.png" height="30" alt="ARPAnet"></a>
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
                    <li><a href="#" class="dropdown-item">Associados</a></li>
                    <li><a href="#" class="dropdown-item">Contratados</a></li>
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
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">Olá  {{ auth()->user()->name}}</a>

                <ul class="dropdown-menu">
                    <li><a href="#" class="dropdown-item">Alterar Dados</a></li>
                    <li><a href="{{ route('login.logout') }}" class="dropdown-item">Sair</a></li>
                </ul>
              </li>

            </ul>
          </div>
        </div>
      </nav>

      <div class="container mb-3 p-4 bg-white shadow h-100 position-relative">
        @yield('conteudo')
      </div>

      <footer class="sticky-footer container-fluid bg-light p-3 text-center">
        <span>
            ARPAnet <br>
            versão 0.1 <br>
            Centro Universitário UniRios
        </span>
      </footer>

    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
