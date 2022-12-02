@extends('layouts.default')

@section('title', 'Nova Venda')

@section('conteudo')
    <h1 class="mb-5">Nova Venda</h1>

    <form class="row g-4" method="POST" action="{{ route('vendas.store') }}">
        @csrf
        <div class="col-md-4">
            <label for="nomeProduto" class="form-label fs-5 fs-5">Descrição do Produto</label>
            <input type="text" class="form-control form-control-lg bg-light" id="nomeProduto" name="tipo" required>
        </div>

        <div class="col-md-4">
            <label for="formaPagamentoVenda" class="form-label fs-5 fs-5">Forma de Pagamento</label>
            <select class="form-select form-select-lg bg-light" id="formaPagamentoVenda" name="formapagamento" required>
            <option value="pag1">Pag 1</option>
            <option value="pag1">Pag 2</option>
            </select>

        </div>
        <div class="col-md-4">
            <label for="idComprador" class= "form-label fs-5 fs-5">Comprador</label>
            <select class="form-select form-select-lg bg-light" id="idComprador" name="comprador" required>
            <option value="comprador1">Comprador 1</option>
            <option value="comprador2">Comprador 2</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="produtos"></label>
            <input type="checkbox" name="produto[]" value="papel">Pedra
            <input type="checkbox" name="produto[]" value="papel">Papel
            <input type="checkbox" name="produto[]" value="papel">Tesoura

        </div>
            {{-- Ajustar de acordo com o banco --}}
        <div class="col-md-4">
            <label for="#" class="form-label fs-5 fs-5">Quantidade</label>
            <input type="text" class="form-control form-control-lg bg-light" id="#" name="#" required>
        </div>
        <div class="col-md-4">
            <label for="#" class="form-label fs-5 fs-5">Valor</label>
            <input type="text" class="form-control form-control-lg bg-light" id="#" name="#" placeholder="R$" required>
        </div>

        <div class="mt-5">
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <a href="{{ route('vendas.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>
@endsection
