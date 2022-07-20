<?php
    require 'conexion.php';
    $punt=0;
    $list=[];
    function borra($conexion,$list,$punt){

        $borrar = "DELETE FROM news WHERE id=".$list[$punt];
        $query  = $conexion->query($borrar);
        if($query){
            "se ha eliminado la noticia";
        }else{
            "no se ha podido eliminar la noticia";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/inicio.css">
    <title>inicio</title>
</head>
<body>
    
    <div class="con">
        <div class="navbar">
            <h1>Noticias</h1>
            <div class="nav">
                <button class="btnv" id="crear" onclick="location.href='noticias.php'">crear</button>
                
            </div>
        </div>
        <div class="not" id="cosa">
                <?php
                    $data="SELECT * FROM news ORDER BY id DESC";
                    $result= mysqli_query($conexion,$data);
                    while($row= mysqli_fetch_assoc($result)){
                        if($row >0){
                            array_push($list,$row["id"]);
                            $punt++;

                ?>
                <div class="noticias">
                
                <button class="btnv" id="modificar" onclick="">modificar</button>
                <button class="btnv" id="borrar" onclick="document.write('<?php borra($conexion,$list,$punt); ?>')" >borrar</button>

                    <div class="conImg">
                    <?php if($row["img"]){
                        echo "<img class='imagen' src='data:image/jpeg;base64,"
                         . base64_encode($row['img'] ) . "' />"; 
                        };?>
                    </div>
                    <div class="title"><h3 class="title"><?php echo $row["title"] ?></h3></div>
                    <div class="texto"><p><?php echo $row["text"] ?></p></div>
                </div>
                <?php
                    };
                };

                ?> 
        </div>
        
    </div>

</body>
</html>