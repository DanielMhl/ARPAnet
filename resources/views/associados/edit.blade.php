@extends('layouts.default')

@section('title', 'Editar Associado')

@section('conteudo')
    <h1 class="mb-5">Editar Associado</h1>

    <form class="row g-4" method="POST" action="{{ route('associados.update', $associados->idAssociado) }}">
        @csrf
        @method('PUT')
        <div class="col-md-4">
            <label for="dtAssociacaoAssociado" class="form-label fs-5">Data de Associação</label>
            <input type="date" class="form-control form-control-lg bg-light" id="dtAssociacaoAssociado" name="dtAssociacaoAssociado" required>
        </div>
        <div class="col-md-4">
            <label for="dtDesligamentoAssociado" class="form-label fs-5">Data de Desligamento</label>
            <input type="date" class="form-control form-control-lg bg-light" id="dtDesligamentoAssociado" name="dtDesligamentoContratado">
        </div>
        <div class="mt-5">
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <a href="{{ route('associados.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>
@endsection
