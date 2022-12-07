@extends('layouts.default')

@section('title', 'Cadastrar Produto')

@section('conteudo')
    <h1 class="mb-5">Cadastrar Produto</h1>

    <form class="row g-4" method="POST" action="{{ route('produtos.store') }}">
        @csrf
        <div class="col-md-4">
            <label for="descricaoProduto" class="form-label fs-5 fs-5">Descrição</label>
            <input type="text" class="form-control form-control-lg bg-light" id="descricaoProduto" name="descricaoProduto" required>
        </div>
        <div class="col-md-4">
            <label for="quantidadeProduto" class="form-label fs-5 fs-5">Quantidade (Kg)</label>
            <input type="number" class="form-control form-control-lg bg-light" id="quantidadeProduto" placeholder="Kg" name="quantidadeProduto" required>
        </div>
        <div class="mt-5">
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <a href="{{ route('produtos.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>
@endsection
