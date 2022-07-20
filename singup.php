
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/sing.css">
    <title>Creacion de usuario</title>
</head>
<body>
    <div class="con">
            <h1>SingUp</h1>
            <form action="creacion.php" method="post">
                <p class="param">Username</p>
                <input type="text" name="username" class="param">
                <p class="param">Nombre</p>
                <input type="text" name="name" class="param">
                <p class="param">Apellido</p>
                <input type="text"  name="last_name" class="param">
                <p class="param">Correo</p>
                <input type="email" name="mail" class="param">
                <p class="param">Password</p>
                <input type="password" name="password" class="param">
                </br>
                </br>
                <input type="submit" value="Enviar" class="param" id="enviar">
            </form>
    </div>
</body>
</html>