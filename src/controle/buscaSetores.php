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
    $result_user = "SELECT setor.nome, setor.sigla, setor.gerente FROM  Setor INNER JOIN funcionarios ON setor.gerente = funcionario.cod_funcionario WHERE setor.nome LIKE '%$palavra%' OR setor.cod_setor LIKE '%$palavra%' OR setor.nome LIKE '%$palavra%' OR setor.sigla OR setor.gerente LIKE '%$palavra%' LIMIT $lista_inicio, $limite_dados;";
    $resultado_user = mysqli_query($poti_con, $result_user);
    if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
        while($row_user = mysqli_fetch_assoc($resultado_user)){
            echo "<tr>
                    <th><input type='checkbox' id='vehicle3' name='vehicle3' value=".$row_user['cod_funcionario']."></th>
                    <td>". utf8_encode($row_user['nome'])."</td>
                    <td>". utf8_encode ($row_user['setor']) ."</td>
                    <td>".$row_user['login']."</td>
                    <td> <img class='icons_opcoes' src='../../img/icons8-mais-zoom-52.png' alt='Ilustração para opção de ver mais detalhes'  data-toggle='modal' data-target='#exampleModalCenter'> <img class='icons_opcoes' src='../../img/icons8-editar-52.png' alt='Ilustração para opção de editar'> <img class='icons_opcoes' src='../../img/icons8-excluir-52.png' alt='Ilustração para opção de apagar'></td>
                </tr>
                ";
        }
    }else{
        echo "Nenhum usuário encontrado ...";
    }
    ?>