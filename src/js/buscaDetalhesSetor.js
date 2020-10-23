$(function () {
    $(".detalhes").click(function () {
        //Recuperar o valor do campo
        var cod_setor = $("input[type=hidden][name=cod_setor]").val();

        console.log('this', this)

        var cod_setor = $(this).attr('data-setor')

        console.log("cod setor", cod_setor)

        //Verificar se há algo digitado
        if (cod_setor != '') {
            var dados = {
                cod_setor: cod_setor
            }
            $.post('../../controle/detalhes_setor.php', dados, function (retorna) {
                //Mostra dentro da ul os resultado obtidos
                //http://localhost/poticorp/Sistema-Corporativo/src/controle/detalhes_funcionario.php 
                $(".modal-body").html(retorna);
            });
        }
    });
});