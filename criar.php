<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Criar Novo Usuário</h2>

<form action="v1/Api.php?apicall=criarUsuario" method="post">
    <input type="hidden" name="apicall" value="criarUsuario">

    <label for="usu_nome">Nome:</label>
    <input type="text" name="usu_nome" id="usu_nome" required><br><br>

    <label for="usu_email">Email:</label>
    <input type="email" name="usu_email" id="usu_email" required><br><br>

    <label for="usu_senha">Senha:</label>
    <input type="password" name="usu_senha" id="usu_senha" required><br><br>

    <label for="usu_telefone">Telefone:</label>
    <input type="text" name="usu_telefone" id="usu_telefone" required><br><br>

    <input type="submit" value="Criar Usuário">
</form>
</body>
</html>