<?php
if (!empty($_POST["btnregistrar"])) {
    $imagen = $_FILES["imagen"]["tmp_name"];
    $nombreimagen = $_FILES["imagen"]["name"];
    $tipoimagen = strtolower(pathinfo($nombreimagen, PATHINFO_EXTENSION));
    $sizeimagen = $_FILES["imagen"]["size"];
    $directorio = "archivos/";

    if ($tipoimagen == "jpg" or $tipoimagen == "jpeg" or $tipoimagen == "png" or $tipoimagen == "webp" or $tipoimagen == "gif") {
        $registro = $conexion->query("INSERT INTO img(foto) VALUES('')");
        $idregistro = $conexion->insert_id;
        $ruta = $directorio . $idregistro . "." . $tipoimagen;
        $actualizarimagen = $conexion->query("UPDATE img SET foto='$ruta' WHERE id=$idregistro");

        //Almacenando la imagen
        if (move_uploaded_file($imagen, $ruta)) {
            echo "<div class='alert alert-info'>Imagen guardada exitosamente</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al guardar la imagen</div>";
        }

        //echo "<div class='alert alert-info'>$sizeimagen</div>";
    } else {
        echo "<div class='alert alert-danger'>No se acepta dicho formato</div>";
        //echo "<div class='alert alert-info'>$tipoimagen</div>";
    } ?>

    <script>
        history.replaceState(null,null,location.pathname) //Quitar el recuadro de reenvio de formulario
    </script>

<?php }
?>
