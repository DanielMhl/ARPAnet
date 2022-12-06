@extends('layouts.default')

@section('title', 'Cadastrar Pessoa')

@section('conteudo')
    <h1 class="mb-5">Cadastrar Pessoa</h1>
    <form class="row g-4" method="POST" action="{{ route('pessoas.store') }}">
        @csrf
        <div class="col-md-2">
            <label for="tipoPessoa" class="form-label fs-5 fs-5">Tipo da Pessoa</label>
            <select name="tipoPessoa" id="tipoPessoa" class="form-select form-select-lg bg-light"
            onchange="controleTipo()" required>
                <option value="F" selected="selected">Física</option>
                <option value="J">Jurídica</option>
            </select>
        </div>

        <div class="col-md-3" id="div-cpfPessoa" style="display: block">
            <label for="cpfPessoa" class="form-label fs-5 fs-5">CPF</label>
            <input type="text" class="form-control form-control-lg bg-light" id="cpfPessoa" name="cpfPessoa">
        </div>
        <div class="col-md-3" id="div-cnpjPessoa" style="display: none">
            <label for="cnpjPessoa" class="form-label fs-5 fs-5">CNPJ</label>
            <input type="text" class="form-control form-control-lg bg-light" id="cnpjPessoa" name="cnpjPessoa">
        </div>
        <div class="col-md-7">
            <label for="name" class="form-label fs-5 fs-5">Nome</label>
            <input type="text" class="form-control form-control-lg bg-light" id="nomePessoa" name="nomePessoa" required>
        </div>
        <div class="col-md-4">
            <label for="telefone" class="form-label fs-5 fs-5">Telefone</label>
            <input type="tel" placeholder="(99) 9999-9999" title="Número de telefone precisa ser no formato (99) 9999-9999" class="form-control form-control-lg bg-light" id="telefonePessoa" name="telefonePessoa" required> <!-- pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" -->
        </div>
            <hr><h2>Endereço</h2>
        <div class="col-md-4">
            <label for="logradouroEndereco" class="form-label fs-5 fs-5">Rua</label>
            <input type="text" class="form-control form-control-lg bg-light" id="logradouroEndereco" name="logradouroEndereco" required>
        </div>
        <div class="col-md-1">
            <label for="numeroEndereco" class="form-label fs-5 fs-5">Numero</label>
            <input type="text" class="form-control form-control-lg bg-light" id="numeroEndereco" name="numeroEndereco" required>
        </div>
        <div class="col-md-4">
            <label for="bairroEndereco" class="form-label fs-5 fs-5">Bairro</label>
            <input type="text" class="form-control form-control-lg bg-light" id="bairroEndereco" name="bairroEndereco" required>
        </div>
        <div class="col-md-3">
            <label for="complementoEndereco" class="form-label fs-5 fs-5">Complemento</label>
            <input type="text" class="form-control form-control-lg bg-light" id="complementoEndereco" name="complementoEndereco" required>
        </div>
        <div class="col-md-4">
            <label for="cepEndereco" class="form-label fs-5 fs-5">CEP</label>
            <input type="text" class="form-control form-control-lg bg-light" id="cepEndereco" name="cepEndereco" required>
        </div>
        <div class="col-md-4">
            <label for="cidadeEndereco" class="form-label fs-5 fs-5">Cidade</label>
            <input type="text" class="form-control form-control-lg bg-light" id="cidadeEndereco" name="cidadeEndereco" required>
        </div>
        <div class="col-md-4">
            <label for="ufEndereco" class="form-label fs-5 fs-5">Estado</label>
            <select  class="form-select form-select-lg bg-light" id="ufEndereco" name="ufEndereco" required>
                <option value=""></option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
                <option value="EX">Estrangeiro</option>
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
            <a href="{{ route('pessoas.index') }}" class="btn btn-danger btn-lg"> Cancelar</a>
        </div>
    </form>
<<<<<<< HEAD
    {{-- <script>

function controleTipo() {
    var tipoPessoa = document.getElementById("tipoPessoa").value;
    // document.getElementById("demo").innerHTML = "You selected: " + tipoPessoa;
    if (tipoPessoa == "J") {
        document.getElementById("div-cpfPessoa").style.display = "none";
        document.getElementById('div-cnpjPessoa').style.display = "block";
    }
    else {
        document.getElementById("div-cpfPessoa").style.display = "block";
        document.getElementById('div-cnpjPessoa').style.display = "none";
    }
};
    </script> --}}
{{--
    <script>
        function controlTipo(element) {
            let sec = getElementById('cnpj/cpf')
            if(element.value=='F') {
                sec.appendChild(input.className="form-label fs-5 fs-5");
            }

        }
    </script> --}}
=======
>>>>>>> 12e8f08b438c59654a4494737688bccc040bc125

@endsection

