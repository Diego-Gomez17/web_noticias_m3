<?php
    require 'conexion.php';
    $err="";
    if ($_REQUEST){
        $titulo=$_POST['titulo'];
        $texto=$_POST['texto'];
        if(isset($_FILES['imagen']['name'])){
        
            $image = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
            $query="INSERT INTO news(title,text,img) VALUES('$titulo','$texto','$image')"; 
            $result= mysqli_query($conexion,$query)
                or die("problemas con la insercion".mysqli_error($conexion));
            if($result){
                echo "se logro guardar la noticia";
?>
            <script type="text/javascript" >
                let inicio= ()=>{location.href='inicio.php'}
                setTimeout(inicio,2500)
            </script>
<?php

            } else{
                echo "no se ha podido subir la noticia";
            }
        }      
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/noticias.css">
    <title>Creacion de usuario</title>
</head>
<body>
    <div class="con">
            <h1>Noticia</h1>
            <form method="post" enctype="multipart/form-data" >
                <p class="param">Titulo</p>
                <input type="text" name="titulo" class="param" id="titulo">
                <p class="param">Texto</p>
                <textarea type="text" name="texto"  id="texto"></textarea>
                </br>
                <input type="file" name="imagen" id="file">
                </br>
                <button type="submit" value="guardar" id="enviar">Guardar</button>
                <button type="button" onclick="location.href='inicio.php'">Salir</button>
            </form>
    </div>
</body>
</html>