$(function () {
    $("#buscar").click(function () {
        //Recuperar o valor do campo
        var cod_sala = $("#cod_sala").val();
        alert(cod_sala);
        //console.log('this', this)

        //var cod_sala = $(this).attr('data-sala')

       console.log("cod sala", cod_sala)

        //Verificar se há algo digitado
        if (cod_sala != '') {
            var dados = {
                cod_sala: cod_sala
            }
            $.post('../controle/verifica_reservas.php', dados, function (retorna) {
                //Mostra dentro da ul os resultado obtidos
                //http://localhost/poticorp/Sistema-Corporativo/src/controle/detalhes_funcionario.php
                $(".resultado_da_busca").html(retorna);
            });
        }
    });
});
