<?php
    include('conexao.php');
    if (!isset($_SESSION)) {
        session_start();
    }
    $responsavel = $_SESSION['cod_funcionario'];
    $autor = $_POST['autor'];
    $data_publicacao = date("Y-m-d H:i:s");
    $comentario = $_POST['comentario'];

    $nome_banner = $_FILES['banner']['name'];
    $tamanho_banner =  $_FILES['banner']['size'];

    if(isset($_POST['inserir'])){
        $banner = $_FILES["banner"];
        $nome_banner = $banner["name"];
        if($nome_banner != NULL And $nome_banner != "") {
            $pasta_dir = "../includes/anexos/banners/";  //diretorio dos arquivos onde serão salvos os banners.

            $data ="".date('Y/m/d H:i:s');
            $data_processada = preg_replace("/[^0-9]+/", "", $data);

            //se nao existir a pasta ele cria uma
            if(!file_exists($pasta_dir)){
                mkdir($pasta_dir);
            }

            $arquivo_dir = $pasta_dir.$data_processada."_".$nome_banner;
            // Faz o upload da imagem
            move_uploaded_file($banner["tmp_name"], $arquivo_dir);
            $tamanho = $banner["size"];
            $caminhoArquivo = $arquivo_dir;
            $nome_banner = $data_processada."_".$nome_banner;
            $insert_banner = "INSERT INTO banner (nome, tamanho, caminho, autor, responsavel, comentario, data_insercao) VALUES ('$nome_banner', $tamanho,'$caminhoArquivo', $autor, $responsavel, '$comentario', '$data_publicacao')";
            $result_banner = mysqli_query($poti_con, $insert_banner) or die(mysqli_error($poti_con));
    }
}

    ?>