<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero - Create</title>
    <link rel="stylesheet" href="../css/Style.css">
</head>

<body>
    <Form action="v1/Api.php?apicall=criarUsuario" method="post">
        <div class="Formulario">
            <h1>Nome</h1>
            <div class="label">
                <label for="usu_nome">Nome:</label>
                <input class="input" type="text" name="usu_nome" id="usu_nome" placeholder="Insira o nome">
            </div>

            <div>
                <label for="usu_email">Email:</label>
                <input type="text" name="usu_email" id="usu_email" placeholder="Insira o email">

            </div>
            <div>
                <label for="usu_senha">Senha</label>
                <input type="text" name="usu_senha" id="usu_senha" placeholder="Senha">

            </div>
    
            <div>
                <label for="usu_telefone">Telefone</label>
                <input type="text" name="usu_telefone" id="usu_telefone" placeholder="telefone">

            </div>
            <button type="submmit">Enviar</button>
</div>
    </Form>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>