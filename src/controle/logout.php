<?php
    session_start();
    $_SESSION['cod_funcionario'] = '';
    $_SESSION['nome'] = '';
    session_destroy();
    header("Location: ../index.php")
?>