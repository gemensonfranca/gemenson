'use strict';

const campos = document.querySelectorAll('.required');
const spans  = document.querySelectorAll('.span_required');

function setError(index){
    campos[index].style.border = '2px solid orange';
    spans[index].style.display = 'block';
}

function removeError(index){
    campos[index].style.border = '';
    spans[index].style.display = 'none';
} 

function desabledFalseButton(){

    document.getElementById('bt_submit').disabled = false;
    document.getElementById('bt_submit').style.background = "green";
}

function desabledTrueButton(){

    document.getElementById('bt_submit').disabled = true;
    document.getElementById('bt_submit').style.background = "red";
}

function nomeValidate(){

    if(campos[0].value.length < 3){
        setError(0);
        desabledTrueButton();
    }
    else{
        removeError(0);
        desabledFalseButton();
    }
}

function sobrenomeValidate(){

    if(campos[1].value.length < 3){
        setError(1);
        desabledTrueButton();
    }
    else{
        removeError(1);
        desabledFalseButton();
    }
}

function cepValidate(){

    if(campos[2].value.length < 3){
        setError(2);
        desabledTrueButton();
    }
    else{
        removeError(2);
        desabledFalseButton();
    }
}

// realizar a liberação do botão a partir das verificações acima