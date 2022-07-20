<?php
        require 'conexion.php';
        $err="";
        if ($_REQUEST){
            $username=$_REQUEST['username'];
            $name=$_REQUEST['name'];
            $last_name=$_REQUEST['last_name'];
            $mail=$_REQUEST['mail'];
            $password=$_REQUEST['password'];
        };
        if ($username && $name && $last_name && $mail && $password){
            $select="SELECT * FROM users WHERE username='$username'";
            $val= mysqli_query($conexion,$select);
            if($val->num_rows==0){
                $sql= mysqli_query($conexion,"INSERT INTO users(username,name,last_name,mail,password)
                VALUES('$username','$name','$last_name','$mail','$password')") 
                    or die("problemas con la insercion".mysqli_error($conexion));
            }
            else{
                $err="Ese usuario ya existe";
            }

        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/conn.css">
    <title>Singup</title>
</head>
<body>
    <div class="con">
        <?php if($val->num_rows==0): ?>
            <p id='message'>se ha creado el usuario!!</p>
            <script type="text/javascript" >
                let inicio= ()=>{location.href='index.php'}
                setTimeout(inicio,2500)
            </script>
            <button type="button" onclick="location.href='index.php'">Login</button>
    
        <?php else: ?>
            <p id='message'>no se ha logrado crear el usuario intentelo nuevamente</p>
            <p id="err"></p>
            <?php
                echo "<p id='err'> $err </p>" 
            ?> 
            <button type="button" onclick="location.href='singup.php'">Crear Cuenta</button>
        <?php endif ?>
    </div>


</body>
</html>