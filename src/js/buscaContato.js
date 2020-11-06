$(function () {
    $("#busca").keyup(function () {
        //Recuperar o valor do campo
        //Recuperar o valor do campo
        var cod_funcionario = $("input[type=hidden][name=cod_funcionario]").val();

        console.log('this', this)

        var cod_funcionario = $(this).attr('data-publicacao')
        var pesquisa = $(this).val();

        //Verificar se há algo digitado
        if (pesquisa != '') {
            var dados = {
                palavra: pesquisa
            }
            $.post('../controle/busca_contatos.php', dados, function (retorna) {
                //Mostra dentro da ul os resultado obtidos 
                $(".resultado").html(retorna);
            });
        }
    });
});