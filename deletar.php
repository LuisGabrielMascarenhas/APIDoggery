<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Deletar Usuário</h2>

<form action="v1/Api.php?apicall=deleteTutor" method="post">
  

    <label for="idTutor">ID do Usuário a Deletar:</label>
    <input type="text" name="idTutor" id="idTutor" required><br><br>

    <input type="submit" value="Deletar Usuário">
</form>
</body>
</html>