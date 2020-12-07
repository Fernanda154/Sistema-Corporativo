<?php
    //Incluir a conexão com banco de dados
    include_once ('conexao.php');

    $cod_documento = filter_input(INPUT_POST, 'cod_documento', FILTER_SANITIZE_STRING);
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
    $result_documento = "SELECT * FROM documento WHERE cod_documento=$cod_documento LIMIT $lista_inicio, $limite_dados;";
    $resultado_documento = mysqli_query($poti_con, $result_documento);
   
    if(($resultado_documento) AND ($resultado_documento->num_rows != 0 )){
        while($row_user = mysqli_fetch_assoc($resultado_documento)){                
                $perfil ="
                </div>
                <div class='dados_modal'>
                    <h4>".$row_user['nome']."</h4>
                    <p><b>Tamanho:</b> ".$row_user['tamanho']."</p>
                    <p><b>Autor:</b> ".$row_user['autor']."</p>
                    <p><b>Responsável:</b> ". $row_user['responsavel'] ."</p>
                    <embed src=\"../../includes/anexos/documentos/documentos/". $row_user['nome'] ."\">
                    
                </div>
                ";
                echo $perfil;

        }
    }else{
        echo "Falha ao carregar os dados";
    }
    ?>