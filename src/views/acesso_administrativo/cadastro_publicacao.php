<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potigás</title>
</head>
<body>
    <form action="crud_publicacao.php" method="POST">
        <label for="titulo">Tíulo: </label>
        <input type="text" name="titulo" id="titulo">

        <label for="texto">Texto:</label>
        <textarea id="texto"></textarea>

        <label for="comentario">Comentário</label>
        <textarea id="comentario"></textarea>

        <input type="submit" name="publicar" value="Publicar">
    </form>
</body>
</html>