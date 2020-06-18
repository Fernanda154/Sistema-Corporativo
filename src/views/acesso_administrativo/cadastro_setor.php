<?php
    include("../../controle/preenchimentos/funcionarios.php")
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potigás</title>
</head>
<body>
    <form action="crud_setor.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">

        <label for="sigla">Sigla:</label>
        <input type="text" name="sigla" id="sigla">

        <label for="gerente">Gerente:</label>
         <select name="gerente" id="gerente">
            <option value="0">Selecione:</option>
            <?php
              while ($array_funcionarios = mysqli_fetch_assoc($result_funcionario)) {
                  echo "<option value='".$array_funcionarios['cod_funcionario']."'>".utf8_encode($array_funcionarios['nome'])."</option>";
              }
            ?>
          </select>
          <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
</body>
</html>