@extends('layouts.default')

@section('title', 'Cadastrar Contratado')

@section('conteudo')
    <h1 class="mb-5">Cadastrar Contratado</h1>

    <form class="row g-4" method="POST" action="{{ route('contratados.store') }}">
        @csrf
        <div class="col-md-4">
            <label for="idPessoa" class="form-label fs-5">Pessoa</label>
            <input type="text" class="form-control form-control-lg bg-light" id="idPessoa" name="idPessoa" required>
        </div>

        <div class="col-md-4">
            <label for="dtContratacaoContratado" class="form-label fs-5">Data de Contratação</label>
            <input type="date" class="form-control form-control-lg bg-light" id="dtContratacaoContratado" name="dtContratacaoContratado" required>
        </div>
        <div class="col-md-4">
            <label for="dtDesligamentoContratado" class="form-label fs-5">Data de Desligamento</label>
            <input type="date" class="form-control form-control-lg bg-light" id="dtDesligamentoContratado" name="dtDesligamentoContratado" required>
        </div>
        <div class="form-group">
            <p><label for="descricaoServico" class="form-label fs-5 ">Descrição do Serviço</label></p>
            <textarea class="form-control form-control-lg fs-6 " name="descricaoServico" rows="10"></textarea>
        </div>
        <div class="mt-5">
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <a href="{{ route('contratados.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>
@endsection
