@extends('layouts.default')

@section('title', 'Usuários')

@section('conteudo')
    <h1 class="mb-4">Usuários</h1>

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <a href="{{ route('usuarios.create') }}" class="btn btn-primary float-end mb-2 rounded-circle" title="Cadastrar usuário"><i class="bi bi-plus fs-4"></i></a>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th width="60">ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Tipo</th>
                <th width="160">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td class="align-middle text-center">{{ $usuario->id }}</td>
                <td class="align-middle">{{ $usuario->name }}</td>
                <td class="align-middle">{{ $usuario->email }}</td>
                <td class="align-middle">{{ $usuario->tipo }}</td>
                <td class="align-middle text-center">
                    <a href="{{ $usuario->id }}" class="btn btn-primary" title="Editar"><i class="bi bi-pen"></i></a>
                    <a href="{{ $usuario->id }}" class="btn btn-danger" title="Excluir"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {{ $cargos->links('paginacao') }} --}}
@endsection

