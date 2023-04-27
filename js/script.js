'use strict';

const preencherFormulario = (endereco) => {

    document.getElementById('campo_endereco').value = endereco.logradouro;
    document.getElementById('campo_bairro').value   = endereco.bairro;
    document.getElementById('campo_cidade').value   = endereco.localidade;
    document.getElementById('campo_estado').value   = endereco.uf;
}

const pesquisarCep = async() => {

    const cep      = document.getElementById('campo_cep').value;
    const url      = `http://viacep.com.br/ws/${cep}/json/`;
    const dados    = await fetch(url);
    const endereco = await dados.json();
    
    if(endereco.hasOwnProperty('erro')) {
        document.getElementById('campo_endereco').value = 'CEP inválido!'
    }
    else{
        preencherFormulario(endereco);
    }
}

document.getElementById('campo_cep').addEventListener('focusout', pesquisarCep);