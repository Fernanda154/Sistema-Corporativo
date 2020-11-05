function valida_login() {
    var user = document.getElementById('login').value;
    var senha = document.getElementById('senha').value;
    var tag = true;
    if (user == "") {
        alert("Parece que você esqueceu de preencher o login.");
        tag = false;
    }
    if (senha == "") {
        alert("Parece que você esqueceu de preencher o campo de senha.");
        tag = false;
    }
    return tag;
}