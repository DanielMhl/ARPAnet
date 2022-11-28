@extends('layouts.default')

@section('title', 'Cadastrar Pessoa')

@section('conteudo')
    <h1 class="mb-5">Cadastrar Pessoa</h1>

    <form class="row g-4" method="POST" action="{{ route('pessoas.store') }}">
        @csrf
        <div class="col-md-4">
            <label for="name" class="form-label fs-5 fs-5">Nome</label>
            <input type="text" class="form-control form-control-lg bg-light" id="name" name="name" required>
        </div>
        <div class="col-md-4">
            <label for="email" class="form-label fs-5 fs-5">E-mail</label>
            <input type="text" class="form-control form-control-lg bg-light" id="email" name="email" required>
        </div>
        <div class="col-md-4">
            <label for="telefone" class="form-label fs-5 fs-5">Telefone</label>
            <input type="text" class="form-control form-control-lg bg-light" id="telefone" name="telefone" required>
        </div>
        <div class="col-md-4">
            <label for="tipo" class="form-label fs-5 fs-5">Tipo da Pessoa</label>
            <select name="tipo" id="tipo" class="form-select form-select-lg bg-light" required>
                <option value="asssociado">Asssociado</option>
                <option value="contratado">Contratado</option>
                <option value="vendedor">Vendedor</option>
            </select>
        </div>
            <hr><p>Endereço</p>
        <div class="col-md-4">
            <label for="rua" class="form-label fs-5 fs-5">Rua</label>
            <input type="text" class="form-control form-control-lg bg-light" id="rua" name="rua" required>
        </div>
        <div class="col-md-4">
            <label for="bairro" class="form-label fs-5 fs-5">Bairro</label>
            <input type="text" class="form-control form-control-lg bg-light" id="bairro" name="bairro" required>
        </div>
        <div class="col-md-4">
            <label for="cep" class="form-label fs-5 fs-5">CEP</label>
            <input type="text" class="form-control form-control-lg bg-light" id="cep" name="cep" required>
        </div>
        <div class="col-md-4">
            <label for="cidade" class="form-label fs-5 fs-5">Cidade</label>
            <input type="text" class="form-control form-control-lg bg-light" id="cidade" name="cidade" required>
        </div>
        <div class="col-md-4">
            <label for="estado" class="form-label fs-5 fs-5">Estado</label>
            <input type="text" class="form-control form-control-lg bg-light" id="estado" name="estado" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <a href="{{ route('pessoas.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>
@endsection
