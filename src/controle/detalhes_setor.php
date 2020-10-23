<?php
    //Incluir a conexão com banco de dados
    include_once ('conexao.php');

    $cod_setor = filter_input(INPUT_POST, 'cod_setor', FILTER_SANITIZE_STRING);
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
    $result_setor = "SELECT setor.nome as setor, setor.sigla, setor.gerente, funcionario.nome FROM setor INNER JOIN funcionario ON setor.gerente = funcionario.cod_funcionario WHERE cod_setor = $cod_setor LIMIT $lista_inicio, $limite_dados;";
    $resultado_setor = mysqli_query($poti_con, $result_setor);
   
    if(($resultado_setor) AND ($resultado_setor->num_rows != 0 )){
        while($row_setor = mysqli_fetch_assoc($resultado_setor)){
                $perfil ="
                </div>
                <div class='dados_modal'>
                    <h4>".$row_setor['setor']."</h4>
                    <p><b>Sigla:</b> ".$row_setor['sigla']."</p>
                    <p><b>Gerente:</b> ".$row_setor['nome']."</p>
                </div>
                ";
                echo $perfil;

        }
    }else{
        echo "Falha ao carregar os dados";
    }
    ?>