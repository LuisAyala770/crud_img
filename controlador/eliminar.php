<?php
if (!empty($_GET["id"]) and !empty($_GET["nombre"])) {
    $id = $_GET["id"];
    $nombre = $_GET["nombre"];

    //Eliminar imagen en el servidor...
    try {
        unlink($nombre);
    } catch (\Throwable $th) {
        //throw $th;
    }

    $eliminar = $conexion->query("DELETE FROM img WHERE id=$id");

    if ($eliminar == 1) {
        echo "<div class='alert alert-success'> Correcto, la imagen se ha eliminado con exito</div>";
    } else {
        echo "<div class='alert alert-danger'> Error al eliminar la imagen en el servidor</div>";
    } ?>
    <script>
        history.replaceState(null, null, location.pathname);
    </script>
<?php }
