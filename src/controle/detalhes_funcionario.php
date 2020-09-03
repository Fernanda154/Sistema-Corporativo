<?php
    //Incluir a conexão com banco de dados
    include_once ('C:\xampp\htdocs\poticorp\Sistema-Corporativo\src\controle\conexao.php');

    $cod_funcionario = filter_input(INPUT_POST, 'cod_funcionario', FILTER_SANITIZE_STRING);
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
    $result_user = "SELECT funcionario.nome, funcionario.telefone, funcionario.email, funcionario.ramal, funcionario.data_nascimento, funcionario.cod_funcionario, funcionario.login, setor.nome as setor, cargo.nomenclatura, foto.caminho, foto.nome as nomeFoto FROM funcionario INNER JOIN Setor ON funcionario.setor = Setor.cod_setor INNER JOIN Cargo ON funcionario.cargo = Cargo.cod_cargo LEFT JOIN Foto ON funcionario.cod_funcionario = Foto.funcionario WHERE cod_funcionario=$cod_funcionario LIMIT $lista_inicio, $limite_dados;";
    $resultado_user = mysqli_query($poti_con, $result_user);
   
    if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
        while($row_user = mysqli_fetch_assoc($resultado_user)){
            $perfil = "
                <div class='foto_modal'>";
                if($row_user['caminho'] != null){
                    $perfil .= " 
                        <img class='foto_funcionario' src=../../img/colaboradores/".$row_user['nomeFoto']." alt='Ilustração para opção de editar'>";
                }
                else{
                    $perfil .= " 
                    <img class='foto_funcionario' src='../../img/blank-profile-picture-973460_1280.png' alt='Ilustração para opção de editar'>";
                }
                $perfil .="
                </div>
                <div class='dados_modal'>
                    <h4>".$row_user['nome']."</h4>
                    <p><b>Setor:</b> ".$row_user['setor']."</p>
                    <p><b>Cargo:</b> ".$row_user['nomenclatura']."</p>
                    <p><b>Ramal:</b> ".$row_user['ramal']."</p>
                    <p><b>Email:</b> ".$row_user['email']."</p>
                    <p><b>Telefone:</b> ".$row_user['telefone']."</p>
                    <p><b>Data de nascimento:</b> ". date('d-m-Y', strtotime($row_user['data_nascimento'])) ."</p>
                    <p><b>Login:</b> ".$row_user['login']."</p>
                </div>
                ";
                echo $perfil;

        }
    }else{
        echo "Falha ao carregar os dados";
    }
    ?>