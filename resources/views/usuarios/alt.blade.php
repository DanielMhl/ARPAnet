@extends('layouts.default')

@section('title', 'Alterar Dados')

@section('conteudo')

    @if (Session::get('sucesso'))
    <div class="alert alert-success text-center">{{ Session::get('sucesso') }}</div>
    @endif

    <h1 class="mb-5">Alterar Dados</h1>

    <form class="row g-4" method="POST" action="{{ route('usuarios.update_alt', $usuario->id) }}" enctype="multipart/form-data" name="alt" id="alt">
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
                <label for="foto" class="form-label  fs-5 fs-5">Foto</label>
                <input class="form-control form-control-lg bg-light" type="file" id="formFile" name="foto">
            </div>
            <div class="col-md-8 d-flex flex-row justify-content-end">
                <a href="" class="btn btn-danger btn-lg mt-3 mb-3" title="Trocar Senha" data-bs-toggle="modal" data-bs-target="#modal-modifypass-{{ $usuario->id }}">Trocar Senha <i class="bi bi-key"></i></a>
            </div>
            {{-- <div class="col-md-8">
                <label for="password" class="form-label fs-5 fs-5 text-danger fw-bold">Trocar Senha</label>
                <input type="password" class="form-control form-control-lg bg-light" id="password" name="password" value="" placeholder="Informe a nova senha">
            </div>
        </div> --}}

        <div>
            <button type="submit" class="btn btn-primary btn-lg" form="alt">Salvar</button>
            <a href="{{ route('dashboard.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>
    @include('usuarios.modifypass')
@endsection
