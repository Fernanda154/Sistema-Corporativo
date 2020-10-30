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
    $result_comunicado = "SELECT publicacao.cod_publicacao, publicacao.titulo, publicacao.data_publicacao, publicacao.autor FROM publicacao WHERE publicacao.titulo LIKE '%$palavra%' OR publicacao.data_publicacao LIKE '%$palavra%' OR publicacao.comentario LIKE '%$palavra%' OR publicacao.status LIKE '%$palavra%' OR publicacao.autor LIKE '%$palavra%' OR publicacao.responsavel LIKE '%$palavra%' LIMIT $lista_inicio, $limite_dados;";
    $resultado_comunicado = mysqli_query($poti_con, $result_comunicado) or die(mysqli_error($poti_con));
    if(($resultado_comunicado) AND ($resultado_comunicado->num_rows != 0 )){
        while($row_comunicado = mysqli_fetch_assoc($resultado_comunicado)){
            echo "<tr>
                    <th><input type='checkbox' id='vehicle3' name='vehicle3' value=".$row_comunicado['cod_publicacao']."></th>
                    <td>". utf8_encode($row_comunicado['titulo'])."</td>
                    <td>". utf8_encode ($row_comunicado['autor']) ."</td>
                    <td>".$row_comunicado['data_publicacao']."</td>
                    <td> <img class='icons_opcoes'  data-comunicado=".$row_comunicado['cod_publicacao']." src='../../img/icons8-mais-zoom-52.png' alt='Ilustração para opção de ver mais detalhes'  data-toggle='modal' data-target='#exampleModalCenter'> <img class='icons_opcoes' src='../../img/icons8-editar-52.png' alt='Ilustração para opção de editar'> <img class='icons_opcoes' src='../../img/icons8-excluir-52.png' alt='Ilustração para opção de apagar'></td>
                </tr>
                ";
        }
    }else{
        echo "Nenhum comunicado encontrado ...";
    }
    ?>