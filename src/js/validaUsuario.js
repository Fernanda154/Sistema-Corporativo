var nome = document.getElementById('nome').value();
var telefone = document.getElementById('telefone').value();
var dataNascimento = document.getElementById('data_nascimento').value();
var email = document.getElementById('email').value();
var ramal = document.getElementById('ramal').value();
var login = document.getElementById('login').value();
var senha = document.getElementById('senha').value();
var confirmacaoSenha = document.ElementById('conf_senha').value();
var setor = document.getElementById('setor').value();

function validaUsuario(){
    if(nome == ""){
        alert("Campo nome não pode estar vazio.");
    }
    if(telefone == ""){
        alert("Campo de telefone não pode estar vazio.");
    }
}