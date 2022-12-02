@extends('layouts.default')

@section('title', 'Editar Produto')

@section('conteudo')
    <h1 class="mb-5">Editar Produto</h1>

    <form class="row g-4" method="POST" action="{{ route('produtos.update', $produto->idProduto) }}">
        @csrf
        @method('PUT')
        <div class="col-md-4">
            <label for="descricaoProduto" class="form-label fs-5 fs-5">Descrição</label>
            <input type="text" class="form-control form-control-lg bg-light" id="descricaoProduto" name="descricaoProduto" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-lg">Alterar</button>
            <a href="{{ route('produtos.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>
@endsection
