@extends('layouts.default')

@section('title', 'Produtos')

@section('conteudo')

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <h1 class="mb-4">Contratados</h1>
    <a href="{{ route('contratados.create') }}" class="btn btn-primary position-absolute top-0 end-0 m-4
    rounded-circle fs-4"><i class="bi bi-plus-lg"></i></a>
    <p>Total de Contratados: {{ $totalContratados }}</p>

<form action="" method="get" class="mb-3 d-flex justify-content-end">
    <div class="input-group me-3">
        <input type="text" name="buscaContratado" class="form-control form-control-lg" placeholder="Nome do Contratado">
        <button class="btn btn-primary btn-lg" type="submit">Procurar</button>
    </div>
    <a href="{{ route('contratados.index') }}" class="btn btn-light border btn-lg">Limpar</a>
</form>
    <table class="table table-striped ">
        <thead class="table-dark">
            <tr class="text-center">
                <th width="60">ID</th>
                <th>Pessoa</th>
                <th>Telefone</th>
                <th width="160">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contratados as $contratado)
            <tr>
                <td class="align-middle text-center">{{ $contratado->idContratado}}</td>
                <td class="align-middle text-center">{{ $contratado->pessoa->nomePessoa }}</td>
                <td class="align-middle text-center">{{ $contratado->pessoa->telefonePessoa }}</td>
                <td class="align-middle text-center">
                    <a href="{{ $produto->id }}" class="btn btn-primary" title="Editar"><i class="bi bi-pen"></i></a>
                    <a href="{{ $produto->id }}" class="btn btn-danger" title="Excluir"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {{ $cargos->links('paginacao') }} --}}
@endsection

