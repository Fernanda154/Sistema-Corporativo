$(function () {
    $(".detalhes").click(function () {
        //Recuperar o valor do campo
        var cod_reserva = $("input[type=hidden][name=cod_reserva]").val();

        //console.log('this', this)

        var cod_reserva = $(this).attr('data-reserva')


        //Verificar se há algo digitado
        if (cod_reserva != '') {
            var dados = {
                cod_reserva: cod_reserva
            }
            $.post('../controle/detalhes_reserva.php', dados, function (retorna) {
                //Mostra dentro da ul os resultado obtidos
                $(".modal-body").html(retorna);
            });
        }
    });
});