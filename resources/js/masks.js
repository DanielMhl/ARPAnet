const phone = document.querySelector('#telefonePessoa');

phone.addEventListener("keyup", ({target: { value }}) => {
  if (!value) return ""
  value = value.replace(/\D/g,'')
  value = value.replace(/(\d{2})(\d)/,"($1) $2")
  value = value.replace(/(\d)(\d{4})$/,"$1-$2")
  return value;
})

const cep = document.querySelector('#cep');

input.addEventListener("keyup", ({target: { value }}) => {
  if (!value) return ""
  value = value.replace(/\D/g,"");
  value = value.replace(/^(\d{5})(\d)/,"$1-$2");
  return value;
});

const select = document.querySelector('#tipo');
const section = document.querySelector('#cnpj/cpf');

select.addEventListener('change', ({target: { value }}) => {
  const input = document.createElement('input');
  input.type = "number";
  if (value === 'F') {
    input.addEventListener("keyup", cpfMask);
  } else {
    input.addEventListener("keyup", cnpjMask);
  };
  section.appendChild(input.className="form-label fs-5 fs-5");
});

const cpfMask = ({target: { value }}) => {
  value.replace(/\D/g,"");
  value = value.replace(/(\d{3})(\d)/,"$1.$2");
  value = value.replace(/(\d{3})(\d)/,"$1.$2");
  value = value.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
  return value;
}

const cnpjMask = ({target: { value }}) => {
  value.replace(/\D/g,"");
  value = value.replace(/^(\d{2})(\d)/,"$1.$2");
  value = value.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3");
  value = value.replace(/\.(\d{3})(\d)/,".$1/$2");
  value = value.replace(/(\d{4})(\d)/,"$1-$2");
  return value;
}


