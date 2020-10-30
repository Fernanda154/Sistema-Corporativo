$(function () {
    $("#busca").keyup(function () {
        //Recuperar o valor do campo
        //Recuperar o valor do campo
        var cod_publicacao = $("input[type=hidden][name=cod_publicacao]").val();

        console.log('this', this)

        var cod_publicacao = $(this).attr('data-publicacao')
        var pesquisa = $(this).val();

        //Verificar se há algo digitado
        if (pesquisa != '') {
            var dados = {
                palavra: pesquisa
            }
            $.post('../../controle/busca_comunicados.php', dados, function (retorna) {
                //Mostra dentro da ul os resultado obtidos 
                $(".resultado").html(retorna);
            });
        }
    });
});