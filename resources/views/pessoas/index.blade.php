@extends('layouts.default')

@section('title', 'Pessoas')

@section('conteudo')
    <h1 class="mb-4">Pessoas</h1>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <a href="{{ route('pessoas.create') }}" class="btn btn-primary float-end mb-2 rounded-circle" title="Cadastrar pessoas"><i class="bi bi-plus fs-4"></i></a>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th width="60">ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Tipo</th>
                <th width="160">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pessoas as $pessoa)
            <tr>
                <td class="align-middle text-center">{{ $pessoa->id }}</td>
                <td class="align-middle text-center">{{ $pessoa->name }}</td>
                <td class="align-middle text-center">{{ $pessoa->telefone }}</td>
                <td class="align-middle text-center">{{ $pessoa->tipo }}</td>
                <td class="align-middle text-center">
                    <a href="{{ $pessoa->id }}" class="btn btn-primary" title="Editar"><i class="bi bi-pen"></i></a>
                    <a href="{{ $pessoa->id }}" class="btn btn-danger" title="Excluir"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {{ $cargos->links('paginacao') }} --}}
@endsection

