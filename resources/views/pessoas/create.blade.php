@extends('layouts.default')

@section('title', 'Cadastrar Pessoa')

@section('conteudo')
    <h1 class="mb-5">Cadastrar Pessoa</h1>

    <form class="row g-4" method="POST" action="{{ route('pessoas.store') }}">
        @csrf
        <div class="col-md-4">
            <label for="name" class="form-label fs-5 fs-5">Nome</label>
            <input type="text" class="form-control form-control-lg bg-light" id="nomePessoa" name="nomePessoa" required>
        </div>
        <div class="col-md-4">
            <label for="email" class="form-label fs-5 fs-5">E-mail</label>
            <input type="email" class="form-control form-control-lg bg-light" id="emailPessoa" name="emailPessoa" required>
        </div>
        <div class="col-md-4">
            <label for="telefone" class="form-label fs-5 fs-5">Telefone</label>
            <input type="tel" placeholder="(99) 9999-9999" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})" title="Número de telefone precisa ser no formato (99) 9999-9999" class="form-control form-control-lg bg-light" id="telefonePessoa" name="telefonePessoa" required> <!-- pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" -->
        </div>
        <div class="col-md-4">
            <label for="tipo" class="form-label fs-5 fs-5">Tipo da Pessoa</label>
            <select name="tipo" id="tipo" class="form-select form-select-lg bg-light" required>
                <option value="F">Física</option>
                <option value="J">Jurídica</option>
            </select>
        </div>
        <section id="cnpj/cpf"></section>
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
    <script type="text/javascript" src="../../js/masks.js"></script>
@endsection
