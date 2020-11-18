<?php
    include('conexao.php');
    
    if(isset($_POST['inserir'])){
        $nome = $_POST['nome_funcionario'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $ramal = $_POST['ramal'];
        $senha = $_POST['senha'];
        $conf_senha = $_POST['conf_senha'];
        $login = $_POST['login'];
        $cargo = $_POST['cargo'];
        $setor = $_POST['setor'];
        $data_nascimento = $_POST['data_nascimento'];
        $foto = $_FILES['foto'];
        $permissoes = "";
        if(isset($_POST['permissao_banner'])){
            $permissoes = $permissoes."1";
        }
        if(isset($_POST['permissao_documento'])){
            $permissoes = $permissoes."2";
        }
        if(isset($_POST['permissao_publicacao'])){
            $permissoes = $permissoes."3";
        }
        if(isset($_POST['permissao_reserva'])){
            $permissoes = $permissoes."4";
        }

        $query = "INSERT INTO `funcionario`(`nome`, `telefone`, `email`, `data_nascimento`, `ramal`, `senha`, `login`, `permissao`, `cargo`, `setor`)
                    VALUES('$nome', '$telefone', '$email', '$data_nascimento', '$ramal', '$senha', '$login', '$permissoes', $cargo, $setor);";
        $result_funcionario = mysqli_query($poti_con, $query) or die(mysqli_error($poti_con));
        $cod_funcionario = mysqli_insert_id($poti_con);
        if($result_funcionario != false){
            ?>
                <script>
                    setTimeout(function(){ alert('Funcionário cadastrado com sucesso!'); }, 3000);
                </script>
            <?php
        }
        if(isset($_FILES["foto"])){

            $foto = $_FILES["foto"];
            $nome_foto = $foto["name"];
            if($nome_foto != NULL And $nome_foto != "") {
                $pasta_dir = "../img/colaboradores/";  //diretorio dos arquivos onde serão salvos os anexos.

                $data ="".date('Y/m/d H:i:s');
                $data_processada = preg_replace("/[^0-9]+/", "", $data);

                //se nao existir a pasta ele cria uma
                if(!file_exists($pasta_dir)){
                    mkdir($pasta_dir);
                }

                $arquivo_dir = $pasta_dir.$data_processada."_".$nome_foto;
                // Faz o upload da imagem
                move_uploaded_file($foto["tmp_name"], $arquivo_dir);
                $tamanho = $foto["size"];
                $caminhoArquivo = $arquivo_dir;
                $nome_foto = $data_processada."_".$nome_foto;
                $insert_foto = "INSERT INTO foto (nome, tamanho, caminho, funcionario) VALUES ('$nome_foto', $tamanho,'$caminhoArquivo', $cod_funcionario)";
                $result_foto = mysqli_query($poti_con, $insert_foto) or die(mysqli_error($poti_con));
                
            }
        }
        header("Location: ../views/acesso_administrativo/funcionarios.php");
    }
    if(isset($_POST['editar'])){
        
    }
?>