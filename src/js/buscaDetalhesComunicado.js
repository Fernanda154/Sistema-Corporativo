$(function () {
    $(".detalhes").click(function () {
        //Recuperar o valor do campo
        var cod_publicacao = $("input[type=hidden][name=cod_publicacao]").val();

        //console.log('this', this)

        var cod_publicacao = $(this).attr('data-comunicado')


        //Verificar se há algo digitado
        if (cod_publicacao != '') {
            var dados = {
                cod_publicacao: cod_publicacao
            }
            $.post('../../controle/detalhes_comunicado.php', dados, function (retorna) {
                //Mostra dentro da ul os resultado obtidos
                //http://localhost/poticorp/Sistema-Corporativo/src/controle/detalhes_funcionario.php 
                $(".modal-body").html(retorna);
            });
        }
    });
});