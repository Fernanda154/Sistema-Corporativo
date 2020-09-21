<?php
    //Incluir a conexão com banco de dados
    include_once ('conexao.php');

    $cod_comunicado = filter_input(INPUT_POST, 'cod_publicacao', FILTER_SANITIZE_STRING);
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
    $result_comunicado = "SELECT * FROM publicacao WHERE cod_publicacao=$cod_comunicado LIMIT $lista_inicio, $limite_dados;";
    $resultado_comunicado = mysqli_query($poti_con, $result_comunicado);
   
    if(($resultado_comunicado) AND ($resultado_comunicado->num_rows != 0 )){
        while($row_user = mysqli_fetch_assoc($resultado_comunicado)){                
                $perfil ="
                </div>
                <div class='dados_modal'>
                    <h4>".$row_user['titulo']."</h4>
                    <p><b>Texto:</b> ".$row_user['texto']."</p>
                    <p><b>Autor:</b> ".$row_user['autor']."</p>
                    <p><b>Data da publicação:</b> ". date('d-m-Y', strtotime($row_user['data_publicacao'])) ."</p>
                    
                </div>
                ";
                echo $perfil;

        }
    }else{
        echo "Falha ao carregar os dados";
    }
    ?>