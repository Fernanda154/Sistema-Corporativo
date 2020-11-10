<?php
    //Incluir a conexão com banco de dados
    include_once ('conexao.php');

    $cod_cip = filter_input(INPUT_POST, 'cod_cip', FILTER_SANITIZE_STRING);
    
    //Pesquisar no banco de dados nome do usuario referente a palavra digitada
    $query_modal = "SELECT comunicado_cip.titulo, comunicado_cip.data_emissao,comunicado_cip.texto, comunicado_cip.autor, comunicado_cip.cod_comunicado, funcionario.nome FROM comunicado_cip INNER JOIN funcionario ON comunicado_cip.autor = funcionario.cod_funcionario WHERE comunicado_cip.cod_comunicado = $cod_cip";
    $resultado_user = mysqli_query($poti_con, $query_modal);

    if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
        while($row_user = mysqli_fetch_assoc($resultado_user)){
            $conteudo = "
                <div class='dados_modal'>
                    <h4>".$row_user['titulo']."</h4>
                    <p><b>Autor:</b> ".$row_user['nome']."</p>
                    <p><b>Data:</b> ".$row_user['data_emissao']."</p>
                    <p><b>Ramal:</b> ".$row_user['texto']."</p>
                </div>
                ";
                echo $conteudo;
        }
    }else{
        echo "Falha ao carregar os dados";
    }
    ?>
