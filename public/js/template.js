
function controleTipo() {
    var tipoPessoa = document.getElementById("tipoPessoa").value;
    // document.getElementById("demo").innerHTML = "You selected: " + tipoPessoa;
    if (tipoPessoa == "J") {
        document.getElementById("div-cpfPessoa").style.display = "none";
        document.getElementById("div-cpfPessoa").required = false;
        document.getElementById('div-cnpjPessoa').style.display = "block";
        document.getElementById("div-cnpjPessoa").required = true;

    }
    else {
        document.getElementById("div-cpfPessoa").style.display = "block";
        document.getElementById('div-cnpjPessoa').style.display = "none";
        document.getElementById("div-cpfPessoa").required = false;
        document.getElementById("div-cpfPessoa").required = true;
    }
};

/* WEBSERVICE */
function limpaFormularioCep() {
    //Limpa valores do formulário de cep.
    document.getElementById('logradouroEndereco').value=("");
    document.getElementById('bairroEndereco').value=("");
    document.getElementById('cidadeEndereco').value=("");
    document.getElementById('ufEndereco').value=("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('logradouroEndereco').value=(conteudo.logradouro);
        document.getElementById('bairroEndereco').value=(conteudo.bairro);
        document.getElementById('cidadeEndereco').value=(conteudo.localidade);
        document.getElementById('ufEndereco').value=(conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        limpaFormularioCep();
        var aviso = document.getElementById('div-alert');
        aviso.style.display = "block";
        aviso.innerHTML = "CEP não encontrado.";
    }
}

function pesquisaCep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('logradouroEndereco').value="...";
            document.getElementById('bairroEndereco').value="...";
            document.getElementById('cidadeEndereco').value="...";
            document.getElementById('ufEndereco').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpaFormularioCep();
            var aviso = document.getElementById('div-alert');
            aviso.style.display = "block";
            aviso.innerHTML = "Formato de CEP inválido.";
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpaFormularioCep();
    }
};

/* endWEBSERVICE */