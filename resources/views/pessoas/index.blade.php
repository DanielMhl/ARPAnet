@extends('layouts.default')

@section('title', 'Pessoas')

@section('conteudo')

    @if (Session::get('Sucesso'))
    <div class="alert alert-success text-center">{{ Session::get('Sucesso') }}</div>
    @endif

    @if (Session::get('Erro'))
    <div class="alert alert-danger text-center">{{ Session::get('Erro') }}</div>
    @endif

    <h1 class="mb-4">Pessoas</h1>

    <a href="{{ route('pessoas.create') }}" class="btn btn-primary position-absolute top-0 end-0 m-4
    rounded-circle fs-4"><i class="bi bi-person-plus-fill"></i></a>

    <p>Total de Pessoas: {{ $totalPessoas }}</p>

<form action="" method="get" class="mb-3 d-flex justify-content-end">
    <div class="input-group me-3">
        <input type="text" name="buscaPessoa" class="form-control form-control-lg" placeholder="Nome da Pessoa">
        <button class="btn btn-primary btn-lg" type="submit">Procurar</button>
    </div>
    <a href="{{ route('pessoas.index') }}" class="btn btn-light border btn-lg">Limpar</a>
</form>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th width="60">ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Tipo</th>
                <th>CPF/CNPJ</th>
                <th>Endereço</th>
                <th width="160">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pessoas as $pessoa)
            <tr>
                <td class="align-middle text-center">{{ $pessoa->idPessoa }}</td>
                <td class="align-middle text-center">{{ $pessoa->nomePessoa }}</td>
                <td class="align-middle text-center">{{ $pessoa->telefonePessoa }}</td>
                <td class="align-middle text-center">@if ($pessoa->tipoPessoa == "F") Física @elseif ($pessoa->tipoPessoa == "J") Jurídica @endif</td>
                <td class="align-middle text-center">@if ($pessoa->tipoPessoa == "F") {{ $pessoa->cpfPessoa }} @elseif ($pessoa->tipoPessoa == "J") {{ $pessoa->cnpjPessoa  }} @endif</td>
                <td class="align-middle text-center">{{ $pessoa->logradouroEndereco }}</td>
                <td class="align-middle text-center">
                    <a href="{{ route('pessoas.edit', $pessoa->idPessoa) }}" class="btn btn-primary" title="Editar"><i class="bi bi-pen"></i></a>
                    <a href="" class="btn btn-danger" title="Excluir" data-bs-toggle="modal" data-bs-target="#modal-deletar-{{ $pessoa->idPessoa }}"><i class="bi bi-trash"></i></a>
                    
                    @include('pessoas.delete')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $pessoas->links() }}
@endsection

