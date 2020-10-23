<?php
    include('conexao.php');
    if (!isset($_SESSION)) {
        session_start();
    }
    $responsavel = $_SESSION['cod_funcionario'];
    $autor = $_POST['autor'];
    $data_publicacao = date('Y/m/d');
    $setor = $_POST['setor'];
    $comentario = $_POST['comentario'];

    $nome_documento = $_FILES['documento']['name'];
    $tamanho_documento =  $_FILES['documento']['size'];

    if(isset($_POST['inserir'])){
        $documento = $_FILES["documento"];
        $nome_documento = $documento["name"];
        if($nome_documento != NULL And $nome_documento != "") {
            $pasta_dir = "../includes/anexos/documentos/";  //diretorio dos arquivos onde serão salvos os anexos.

            $data ="".date('Y/m/d H:i:s');
            $data_processada = preg_replace("/[^0-9]+/", "", $data);

            //se nao existir a pasta ele cria uma
            if(!file_exists($pasta_dir)){
                mkdir($pasta_dir);
            }

            $arquivo_dir = $pasta_dir.$data_processada."_".$nome_documento;
            // Faz o upload da imagem
            move_uploaded_file($documento["tmp_name"], $arquivo_dir);
            $tamanho = $documento["size"];
            $caminhoArquivo = $arquivo_dir;
            $nome_documento = $data_processada."_".$nome_documento;
            $insert_documento = "INSERT INTO documento (nome, tamanho, caminho, autor, responsavel, comentario, setor) VALUES ('$nome_documento', $tamanho,'$caminhoArquivo', $autor, $responsavel, '$comentario', $setor)";
            $result_documento = mysqli_query($poti_con, $insert_documento) or die(mysqli_error($poti_con));
    }
}

    ?>