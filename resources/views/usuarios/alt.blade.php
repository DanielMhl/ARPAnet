@extends('layouts.default')

@section('title', 'Alterar Dados')

@section('conteudo')
    <h1 class="mb-5">Alterar Dados</h1>

    <form class="row g-4" method="POST" action="{{ route('usuarios.update', $usuario->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="col-md-4">
            <img src="/storage/usuarios/{{ $usuario->foto }}" class="img-thumbnail" alt="{{ $usuario->name }}">
        </div>
        <div class="col-md-8">
            <div class="col-md-8">
                <label for="name" class="form-label fs-5 fs-5">Nome</label>
                <input type="text" class="form-control form-control-lg bg-light" id="name" name="name" value="{{ $usuario->name }}" required>
            </div>
            <div class="col-md-8">
                <label for="email" class="form-label fs-5 fs-5">E-mail</label>
                <input type="text" class="form-control form-control-lg bg-light" id="email" name="email" value="{{ $usuario->email }}" required>
            </div>
            <div class="col-md-8">
                <label for="password" class="form-label fs-5 fs-5">Trocar Senha</label>
                <input type="password" class="form-control form-control-lg bg-light" id="password" name="password" value="" placeholder="Informe a nova senha">
            </div>
            <div class="col-md-8">
                <label for="foto" class="form-label  fs-5 fs-5">Foto</label>
                <input class="form-control form-control-lg bg-light" type="file" id="formFile" name="foto">
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
            <a href="{{ route('dashboard.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>
@endsection
