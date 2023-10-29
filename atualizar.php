<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Atualizar Usuário</h2>

<form action="v1/Api.php?apicall=updateTutor" method="post">
  

    <label for="idTutor">ID do Usuário:</label>
    <input type="text" name="idTutor" id="idTutor" required><br><br>

    <label for="Nome">Novo Nome:</label>
    <input type="text" name="Nome" id="Nome" required><br><br>

    <label for="Email">Novo Email:</label>
    <input type="email" name="Email" id="Email" required><br><br>

    <label for="Senha">Nova Senha:</label>
    <input type="password" name="Senha" id="Senha" required><br><br>

    <label for="Celular">Celular:</label>
    <input type="text" name="Celular" id="Celular" required><br><br>
    
    

    <input type="submit" value="Atualizar Usuário">
</form>
</body>
</html>