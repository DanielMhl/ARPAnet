@extends('layouts.default')

@section('title', 'Produtos')

@section('conteudo')
    <h1 class="mb-4">Produtos</h1>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <a href="{{ route('produtos.create') }}" class="btn btn-primary float-end mb-2 rounded-circle" title="Cadastrar Produto"><i class="bi bi-plus fs-4"></i></a>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th width="60">ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th width="160">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
            <tr>
                <td class="align-middle text-center">{{ $produto->id }}</td>
                <td class="align-middle">{{ $produto->name }}</td>
                <td class="align-middle">{{ $produto->descricao }}</td>
                <td class="align-middle">{{ $produto->quantidade }}</td>
                <td class="align-middle">{{ $produto->preco }}</td>
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

