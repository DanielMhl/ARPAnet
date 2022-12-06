
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

function tipoPessoa(){
var tipoPessoa = document.getElementById("tipoPessoa").value;

var $ordenadorBanners = document.getElementById('ordem-banner');
if ($activeBtn.checked) {
    $ordenadorBanners.required = true;
}else{
    $ordenadorBanners.required = false;
}
}
