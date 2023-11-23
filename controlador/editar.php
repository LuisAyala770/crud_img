<?php
if (!empty($_POST["btneditar"])) {
    //echo "boton de editar oprimido";
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    //Datos de la imagen
    $imagen = $_FILES["imagen"]["tmp_name"];
    $nombreimagen = $_FILES["imagen"]["name"];
    $tipoimagen = strtolower(pathinfo($nombreimagen, PATHINFO_EXTENSION));
    $directorio = "archivos/";

    if (is_file($imagen)) {
        if ($tipoimagen == "jpg" or $tipoimagen == "jpeg" or $tipoimagen == "png" or $tipoimagen == "webp" or $tipoimagen == "gif") {
            //Eliminar la imagen anterior...
            try {
                unlink($nombre);
            } catch (\Throwable $th) {
                echo "<div class='alert alert-danger'> Error, imagen no encontrada</div>";
            }
            //Almacenar en la BD...
            $ruta = $directorio . $id . "." . $tipoimagen;
            if (move_uploaded_file($imagen, $ruta)) {
                $editar = $conexion->query("UPDATE img SET foto = '$ruta' WHERE id=$id");

                if ($editar == 1) {
                    echo "<div class='alert alert-success'> Correcto, la imagen se ha modificado con exito</div>";
                } else {
                    echo "<div class='alert alert-danger'> Error al editar la imagen</div>";
                }
            } else {
                echo "<div class='alert alert-info'> Error al subir la imagen al servidor</div>";
            }
        } else {
            echo "<div class='alert alert-info'> Solo se permiten formatos JPG, JPEG, PNG, WEBP y GIF</div>";
        }
    } else {
        echo "<div class='alert alert-info'> Debes seleccionar una imagen</div>";
    } ?>
    <script>
        history.replaceState(null, null, location.pathname)
    </script>
<?php }
