$(function () {
    $(".detalhes").click(function () {
        //Recuperar o valor do campo
        var cod_funcionario = $("input[type=hidden][name=cod_Funcionario]").val();

        console.log('this', this)

        var cod_funcionario = $(this).attr('data-funcionario')

        console.log("cod funcionario", cod_funcionario)

        //Verificar se há algo digitado
        if (cod_funcionario != '') {
            var dados = {
                cod_funcionario: cod_funcionario
            }
            $.post('../controle/detalhes_comunicacao.php', dados, function (retorna) {
                //Mostra dentro da ul os resultado obtidos
                //http://localhost/poticorp/Sistema-Corporativo/src/controle/detalhes_funcionario.php 
                $(".modal-body").html(retorna);
            });
        }
    });
});