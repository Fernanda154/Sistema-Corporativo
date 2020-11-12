$(function () {
    $(".entrar").click(function () {
        //Recuperar o valor do campo
        var email = $("#email_recuperacao").val();
        alert(email);
        //console.log('this', this)

      //  console.log("email funcionario", email)

        //Verificar se há algo digitado
        if (email != '') {
            var dados = {
                email: email
            }
            $.post('../controle/recuperacao_de_senha.php', dados, function (retorna) {
                //Mostra dentro da ul os resultado obtidos
                //http://localhost/poticorp/Sistema-Corporativo/src/controle/detalhes_funcionario.php
                $("#info").html(retorna);
            });
        }
    });
});
