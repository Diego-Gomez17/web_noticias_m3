<?php
        $estado=0; #se utiliza esta variable para renderizar la respuesta del servidor
        require 'conexion.php';
        if ($_REQUEST){
            $username=$_REQUEST['username'];
            $password=$_REQUEST['password'];
            $login="SELECT * FROM users WHERE username= '$username' AND password='$password'";
            $result= mysqli_query($conexion,$login);
            if ($row = $result->num_rows)
            echo $row;
                if($row==0){
                    $estado=1;
                }
                if($row==1){
                    $estado=2;
                }
                
            $result->close();
        };
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/index.css">
    <title>Login</title>
</head>
<body>
    <div class="con">
        <div >
            <div class="resp">
                <p class="query"></p>
                <?php  
                if ($estado==2):    ?>
                    <p class="query"> se ha ingresado correctamente!</p>
                    <script type="text/javascript" >
                        let inicio= ()=>{location.href='inicio.php'}
                        setTimeout(inicio,2000)
                    </script>
                <?php  elseif($estado==1):   ?>  
                    <p class="query"> el usuario o la clave no son correctos</p>
                <?php endif ?>
            </div>
            
            <form class="login" action="index.php" method="post">
                <h1>Login</h1>
                <input class="param" name="username" type="text" placeholder="Ingresa tu usuario">
                <input class="param" name="password" type="password" placeholder="Ingresa tu clave">
                </br>
                <input class="param" type="submit" value="ingresar">
                </br>
                <input class="param" type="button" value="Crea tu cuenta!" onclick="location.href='singup.php'">
            </form>
        </div>

    </div>
</body>
</html>