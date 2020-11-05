$(function () {
    $(".buscar").click(function () {
        //Recuperar o valor do campo
        var cod_sala = $("#sala").val();

        //console.log('this', this)

        // var cod_publicacao = $(this).attr('data-comunicado')


        //Verificar se há algo digitado
        if (cod_sala != '') {
            var dados = {
                cod_sala: cod_sala
            }
            $.post('../controle/crud_sala.php', dados, function (retorna) {
                //Mostra dentro da ul os resultado obtidos
                //http://localhost/poticorp/Sistema-Corporativo/src/controle/detalhes_funcionario.php 
                $(".modal-body").html(retorna);
            });
        }
    });
});