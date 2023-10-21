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
    <Form action="v1/Api.php?apicall=deletarUsuario" method="post">
        <div class="Formulario">
        <div class="label">
                <label for="usu_id">ID:</label>
                <input class="input" type="number" name="usu_id" id="usu_id" placeholder="Insira o id ">
            </div>
      
            <button type="submmit">Enviar</button>
</div>
    </Form>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>