$(function () {
    $(".detalhes").click(function () {
        //Recuperar o valor do campo
        var cod_cip = $("input[type=hidden][name=cod_cip]").val();

        //console.log('this', this)

        var cod_cip = $(this).attr('data-cip');

        console.log("cod cip", cod_cip);

        //Verificar se há algo digitado
        if (cod_cip != '') {
            var dados = {
                cod_cip: cod_cip
            }
            $.post('../controle/detalhes_cip.php', dados, function (retorna) {
                //Mostra dentro da ul os resultado obtidos
                //http://localhost/poticorp/Sistema-Corporativo/src/controle/detalhes_funcionario.php
                $(".modal-body").html(retorna);
            });
        }else{
          alert('veio vazio');
        }
    });
});
