<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Criar Novo Usuário</h2>

<form action="v1/Api.php?apicall=criarTutor" method="post">
    <input type="hidden" name="apicall" value="criarUsuario">

    <label for="Nome">Nome:</label>
    <input type="text" name="Nome" id="Nome" required><br><br>

    <label for="Email">Email:</label>
    <input type="email" name="Email" id="Email" required><br><br>

    <label for="Senha">Senha:</label>
    <input type="password" name="Senha" id="Senha" required><br><br>

    <label for="Celular">Celular:</label>
    <input type="text" name="Celular" id="Celular" required><br><br>



    <input type="submit" value="Criar Usuário">
</form>
</body>
</html>