<?php 

    if (!empty($_GET)){

        include "conexion.php";
        $borrar = "DELETE FROM news WHERE id=".$_GET["id"];
        $query= $conexion->query($borrar);
        if($query!=null){
            print "<script>alert(\"Noticia Eliminada Correctamente.\");window.location='inicio.php';</script>";
        }
        else{
            print "<script>alert(\"No Se Ha Logrado Borrar La Noticia.\");window.location='inicio.php';</script>";
            }

    }


?>