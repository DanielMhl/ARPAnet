@extends('layouts.default')

@section('title', 'Dashboard')

@section('conteudo')


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

    <h1 class="mb-3">Bem Vindo!</h1>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Vendas (Mensal)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">R$ {{ $totalMes->totalMes }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Vendas (Anual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">R$ {{ $totalAno->totalAno }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Últimas Vendas Realizadas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome do Comprador</th>
                        <th>Data da Venda</th>
                        <th>Valor</th>
                        <th>Qtd. Produtos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendasDashboard as $vendaDashboard)
                        <tr>
                            <td>{{ $vendaDashboard->nomePessoa }}</td>
                            <td>{{ $vendaDashboard->created_at }}</td>
                            <td>{{ $vendaDashboard->valorVenda }}</td>
                            <td>{{ $vendaDashboard->qtd_produtos }}</td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

</body>
</html>
@endsection
