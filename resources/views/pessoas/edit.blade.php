@extends('layouts.default')

@section('title', 'Editar Pessoa')

@section('conteudo')
    <h1 class="mb-5">Editar Pessoa</h1>
    <h2>Pessoa</h2><br/>
    <form class="row g-4" method="POST" action="{{ route('pessoas.update', $pessoas->idPessoa) }}">
        @csrf
        @method('PUT')
        <div class="col-md-2">
            <label for="tipoPessoa" class="form-label fs-5 fs-5">Tipo da Pessoa</label>
            <select name="tipoPessoa" id="tipoPessoa" class="form-select form-select-lg bg-light" onchange="controleTipo()" required>
                <option value="F" @selected($pessoas->tipoPessoa == 'F')>Física</option>
                <option value="J" @selected($pessoas->tipoPessoa == 'J')>Jurídica</option>
            </select>
        </div>

        <div class="col-md-3" id="div-cpfPessoa" style="display: block">
            <label for="cpfPessoa" class="form-label fs-5 fs-5">CPF</label>
            <input disabled type="text" class="form-control form-control-lg bg-light" id="cpfPessoa" name="cpfPessoa"
                maxlength="14" minlength="11" value=" {{ $pessoas->cpfPessoa }} ">
        </div>
        <div class="col-md-3" id="div-cnpjPessoa" style="display: none">
            <label for="cnpjPessoa" class="form-label fs-5 fs-5">CNPJ</label>
            <input disabled type="text" class="form-control form-control-lg bg-light" id="cnpjPessoa" name="cnpjPessoa"
                maxlength="18" minlength="14" value=" {{ $pessoas->cnpjPessoa }} " onblur="pesquisaCNPJ(this.value);">
        </div>
        <div class="col-md-5">
            <label for="nomePessoa" class="form-label fs-5 fs-5">Nome</label>
            <input type="text" class="form-control form-control-lg bg-light" id="nomePessoa" name="nomePessoa" 
            value=" {{ $pessoas->nomePessoa }} " required>
        </div>
        <div class="col-md-2">
            <label for="telefonePessoa" class="form-label fs-5 fs-5">Telefone</label>
            <input type="tel" placeholder="(99) 9999-9999" maxlength="20"
                title="Número de telefone precisa ser no formato (99) 9999-9999"
                class="form-control form-control-lg bg-light" id="telefonePessoa" name="telefonePessoa" 
                value=" {{ $pessoas->telefonePessoa }} "required>
        </div>
        <hr>
        <h2>Endereço</h2>
        <div class="alert alert-danger text-center p-2" style="display: none" id="div-alert"></div>
        <div class="col-md-2">
            <label for="cepEndereco" class="form-label fs-5 fs-5">CEP</label>
            <input type="text" class="form-control form-control-lg bg-light" id="cepEndereco" name="cepEndereco"
                required onblur="pesquisaCep(this.value);" maxlength="9"
                value=" {{ $enderecos->cepEndereco }} ">
        </div>
        <div class="col-md-4">
            <label for="logradouroEndereco" class="form-label fs-5 fs-5">Rua</label>
            <input type="text" class="form-control form-control-lg bg-light" id="logradouroEndereco"
                name="logradouroEndereco" value=" {{ $enderecos->logradouroEndereco }} " required>
        </div>
        <div class="col-md-2">
            <label for="numeroEndereco" class="form-label fs-5 fs-5">Número</label>
            <input type="text" class="form-control form-control-lg bg-light" id="numeroEndereco" name="numeroEndereco"
                value=" {{ $enderecos->numeroEndereco }} " required>
        </div>
        <div class="col-md-4">
            <label for="complementoEndereco" class="form-label fs-5 fs-5">Complemento</label>
            <input type="text" class="form-control form-control-lg bg-light" id="complementoEndereco"
                name="complementoEndereco" value=" {{ $enderecos->complementoEndereco }} ">
        </div>
        <div class="col-md-4">
            <label for="bairroEndereco" class="form-label fs-5 fs-5">Bairro</label>
            <input type="text" class="form-control form-control-lg bg-light" id="bairroEndereco" name="bairroEndereco"
                value=" {{ $enderecos->bairroEndereco }} " required>
        </div>
        <div class="col-md-4">
            <label for="cidadeEndereco" class="form-label fs-5 fs-5">Cidade</label>
            <input type="text" class="form-control form-control-lg bg-light" id="cidadeEndereco" name="cidadeEndereco"
                value=" {{ $enderecos->cidadeEndereco }} " required>
        </div>
        <div class="col-md-4">
            <label for="ufEndereco" class="form-label fs-5 fs-5">Estado</label>
            <select class="form-select form-select-lg bg-light" id="ufEndereco" name="ufEndereco"
                 required>
                @foreach ($UFs as $uf)
                    <option value=" {{ $uf->ufSigla }} " @selected($enderecos->ufEndereco == $uf->ufSigla)> {{ $uf->ufDescricao }} </option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-lg">Salvar Alteração</button>
            <a href="{{ route('pessoas.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>
    <script>
        window.onload = function () {
            controleTipoAoEntrarEdit()
        } 
    </script>
@endsection
