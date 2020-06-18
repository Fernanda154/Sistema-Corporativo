<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potigás</title>
</head>
<body>
    <form action="crud_cargo.php" method="POST">
        <label for="nomenclatura">Nomenclatura:</label>
        <input type="text" name="nomenclatura" id="nomenclatura">
        <label for="sigla">Sigla:</label>
        <input type="text" name="sigla" id="sigla">
        <input type="submit" name="cadastrar">
    </form>
</body>
</html>