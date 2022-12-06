@extends('layouts.default')

@section('title', 'Cadastrar Associado')

@section('conteudo')
    <h1 class="mb-5">Cadastrar Associado</h1>

    <form class="row g-4" method="POST" action="{{ route('associados.store') }}">
        @csrf
        <div class="col-md-4">
            <label for="idPessoa" class="form-label fs-5">Pessoa</label>
            <input type="text" class="form-control form-control-lg bg-light" id="idPessoa" name="idPessoa" required>
        </div>
        <div class="col-md-4">
            <label for="dtAssociacaoAssociado" class="form-label fs-5">Data de Associação</label>
            <input type="date" class="form-control form-control-lg bg-light" id="dtAssociacaoAssociado" name="dtAssociacaoAssociado" required>
        </div>
        <div class="col-md-4">
            <label for="dtDesligamentoAssociado" class="form-label fs-5">Data de Desligamento</label>
            <input type="date" class="form-control form-control-lg bg-light" id="dtDesligamentoAssociado" name="dtDesligamentoContratado" required>
        </div>
        <div class="mt-5">
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <a href="{{ route('associados.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>
@endsection