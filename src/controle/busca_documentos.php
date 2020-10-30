<?php
//Incluir a conexão com banco de dados
include_once ('conexao.php');

    $palavra = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
    //Limite de dados a serem exibidos
    $limite_dados = 10;
    $pagina = 0;
    if(isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
    }
    $pagina_atual = intval($pagina);
    $pagina_atual = $pagina_atual > 0 ? $pagina_atual - 1 : 0; 



    $lista_inicio = $limite_dados * $pagina_atual;
    //Pesquisar no banco de dados nome do usuario referente a palavra digitada
    $result_documento = "SELECT documento.cod_documento, documento.nome, documento.tamanho, documento.autor, funcionario.nome as autor FROM documento INNER JOIN funcionario ON documento.autor = funcionario.cod_funcionario WHERE documento.nome LIKE '%$palavra%' OR documento.tamanho LIKE '%$palavra%' OR documento.autor LIKE '%$palavra%' LIMIT $lista_inicio, $limite_dados;";
    $resultado_documento = mysqli_query($poti_con, $result_documento) or die(mysqli_error($poti_con));
    if(($resultado_documento) AND ($resultado_documento->num_rows != 0 )){
        while($row_documento = mysqli_fetch_assoc($resultado_documento)){
            echo "<tr>
                    <th><input type='checkbox' id='vehicle3' name='vehicle3' value=".$row_documento['cod_documento']."></th>
                    <td>". utf8_encode($row_documento['nome'])."</td>
                    <td>". utf8_encode ($row_documento['autor']) ."</td>
                    <td>".$row_documento['tamanho']."</td>
                    <td> <img class='icons_opcoes'  data-comunicado=".$row_documento['cod_documento']." src='../../img/icons8-mais-zoom-52.png' alt='Ilustração para opção de ver mais detalhes'  data-toggle='modal' data-target='#exampleModalCenter'> <img class='icons_opcoes' src='../../img/icons8-editar-52.png' alt='Ilustração para opção de editar'> <img class='icons_opcoes' src='../../img/icons8-excluir-52.png' alt='Ilustração para opção de apagar'></td>
                </tr>
                ";
        }
    }else{
        echo "Nenhum documento encontrado ...";
    }
    ?>