$(function () {
    $("#busca").keyup(function () {
        //Recuperar o valor do campo
        var pesquisa = $(this).val();

        //Verificar se há algo digitado
        if (pesquisa != '') {
            var dados = {
                palavra: pesquisa
            }
            $.post('../controle/buscaComunicados.php', dados, function (retorna) {
                //Mostra dentro da ul os resultado obtidos 
                $(".resultado").html(retorna);
            });
        }
    });
});