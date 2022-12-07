@extends('layouts.default')

@section('title', 'Nova Venda')

@section('conteudo')
    <h1 class="mb-5">Nova Venda</h1>

    <form class="row g-4" method="POST" action="{{ route('vendas.store') }}">
        @csrf
        <div class="col-md-6">
            <label for="idComprador" class= "form-label fs-5 fs-5">Comprador</label>
            <select class="form-select form-select-lg bg-white" id="idComprador" name="idPessoaComprador" required>
                @foreach ($compradores as $comprador)
                    <option value="{{ $comprador->idPessoa }}">{{ $comprador->nomePessoa.' - '.$comprador->cnpjPessoa }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="formaPagamentoVenda" class="form-label fs-5 fs-5">Forma de Pagamento</label>
            <select class="form-select form-select-lg bg-white" id="formaPagamentoVenda" name="formaPagamentoVenda" required>
                <option value="DI">Dinheiro</option>
                <option value="CR">Cartão de Crédito</option>
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="#" class="form-label fs-5 fs-5">Valor</label>
            <input type="text" class="form-control form-control-lg bg-white" id="valorVenda" name="valorVenda" placeholder="R$" required>
        </div>

        <table class="table">
            <thead class="table-dark">
                <tr class="text-center">
                    <th><i class="bi bi-bag-check"></i></th>
                    <th>Produto</th>
                    <th>Quantidade (Kg)</th>
                    <th>Quantidade Disponível (Kg)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                <tr>
                    <td class="align-middle text-center">
                        <input name="produto[]" id="check{{ $produto->idProduto }}" type="checkbox" class="form-check-input" value="{{ $produto->idProduto }}" onchange="controlInput(this)">
                    </td>
                    <td class="align-middle text-center">{{ $produto->descricaoProduto }}</td>
                    <td class="align-middle text-center"><input disabled name="quantidade[]" id="inputcheck{{ $produto->idProduto }}" type="number" class="form-control form-control-md bg-light disabled"></td>
                    <td class="align-middle text-center">{{ $produto->quantidadeProduto }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-cart-plus"></i> Finalizar Venda</button>
            <a href="{{ route('vendas.index') }}" class="btn btn-danger btn-lg">Cancelar</a>
        </div>
    </form>
    <script>
        function controlInput(element) {
            let inputId = "input#input" + element.id
            let inputCheck = document.querySelector(inputId)

            if(element.checked) {
                inputCheck.disabled = false
                inputCheck.classList.replace('bg-light', 'bg-white')
            } else {
                inputCheck.disabled = true
                inputCheck.classList.replace('bg-white', 'bg-light')
            }
        }
    </script>
@endsection
