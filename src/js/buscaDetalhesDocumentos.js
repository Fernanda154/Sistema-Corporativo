$(function () {
    $(".detalhes").click(function () {
        //Recuperar o valor do campo
        var cod_documento = $("input[type=hidden][name=cod_documento]").val();

        //console.log('this', this)

        var cod_documento = $(this).attr('data-documento')


        //Verificar se há algo digitado
        if (cod_documento != '') {
            var dados = {
                cod_documento: cod_documento
            }
            $.post('../../controle/detalhes_documento.php', dados, function (retorna) {
                //Mostra dentro da ul os resultado obtidos
                //http://localhost/poticorp/Sistema-Corporativo/src/controle/detalhes_funcionario.php 
                $(".modal-body").html(retorna);
            });
        }
    });
});