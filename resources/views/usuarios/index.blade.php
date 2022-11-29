@extends('layouts.default')

@section('title', 'Usuários')

@section('conteudo')

    @if (Session::get('sucesso'))
        <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <h1 class="mb-4">Usuários</h1>
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary position-absolute top-0 end-0 m-4
    rounded-circle fs-4"><i class="bi bi-plus-lg"></i></a>
    <p>Total de Usuários: {{ $totalUsuarios}}</p>
    <form action="" method="get" class="mb-3 d-flex justify-content-end">
        <div class="input-group me-3">
            <input type="text" name="buscaUsuario" class="form-control form-control-lg" placeholder="Nome do Usuário">
            <button class="btn btn-primary btn-lg" type="submit">Procurar</button>
        </div>
        <a href="{{ route('usuarios.index') }}" class="btn btn-light border btn-lg">Limpar</a>
    </form>
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
                <td class="align-middle text-center">{{ $usuario->name }}</td>
                <td class="align-middle text-center">{{ $usuario->email }}</td>
                <td class="align-middle text-center">{{ $usuario->tipo }}</td>
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

