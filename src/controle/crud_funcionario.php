<?php
    include('conexao.php');
    if ($_POST['img'] == 'Cortar'){
        $targ_w = $targ_h = 150;
        $jpeg_quality = 90;
    
        $src = 'demo_files/pool.jpg';
        $img_r = imagecreatefromjpeg($src);
        $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
    
        imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
        $targ_w,$targ_h,$_POST['w'],$_POST['h']);
    
        header('Content-type: image/jpeg');
        imagejpeg($dst_r,null,$jpeg_quality);
    }
    if($_POST['crud_funcionario'] == "Cadastrar"){
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $ramal = $_POST['ramal'];
        $senha = $_POST['senha'];
        $conf_senha = $_POST['conf_senha'];
        $login = $_POST['login'];
        $foto = $_FILES['foto'];
        $cargo = $_POST['cargo'];
        $setor = $_POST['setor'];
        $data_nascimento = $_POST['data_nascimento'];
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

        $query = "INSERT INTO `intranet_corporativa`.`funcionario`(`nome`, `telefone`, `email`, `data_nascimento`, `ramal`, `senha`, `login`, `permissao`, `cargo`, `setor`)
                    VALUES('$nome', '$telefone', '$email', '$data_nascimento', '$ramal', '$senha', '$login', '$permissoes', $cargo, $setor);";
        $result_funcionario = mysqli($poti_con, $query) or die(mysqli_error($poti_con));
        
    }
?>