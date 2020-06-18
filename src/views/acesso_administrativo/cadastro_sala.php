<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potigás</title>
</head>
<body>
    <form action="crud_sala.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">

        <label for="especificacoes">Especificações:</label>
        <input type="text" name="especificacoes" id="especificacoes">

        <label for="status">Status de funcionamento:</label>
        <select name="status" id="status">
            <option value="0">Selecione o status</option>
            <option value="Ativa">Ativa</option>
            <option value="Em manutenção">Em manutenção</option>
            <option value="Desativada">Desativada</option>
        </select>
        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
</body>
</html>