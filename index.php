<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud de Imagenes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center text-secondary font-weight-bold p-4">CRUD DE IMAGENES EN PHP MYSQL</h1>
    <?php
    require("modelo/conexion.php");
    require("controlador/registrar.php");
    require("controlador/editar.php");
    $sql = $conexion->query("SELECT * FROM img");
    ?>
    <div class="p-3 table-responsive">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Registrar
        </button>

        <!-- Modal Nuevo Registro-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Registro</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" enctype="multipart/form-data" method="POST">
                            <input type="file" class="form-control mb-2" name="imagen">
                            <input type="submit" value="Registrar" name="btnregistrar" class="form-control btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-hover table-striped">
            <thead class="table table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Foto</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($datos = $sql->fetch_object()) { ?>
                    <tr>
                        <th scope="row"><?php echo $datos->id ?></th>
                        <td>
                            <img width="80" src="<?= $datos->foto ?>" alt="">
                        </td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#modaleditar<?= $datos->id ?>" class="btn btn-warning">Editar<a>
                                    <a href="" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <!-- Modal Editar-->
                    <div class="modal fade" id="modaleditar<?= $datos->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Imagen N° <?= $datos->id ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" enctype="multipart/form-data" method="POST">
                                        <input type="text" value="<?= $datos->id ?>" name="id">
                                        <input type="text" value="<?= $datos->foto ?>" name=nombre>
                                        <input type="file" class="form-control mb-2" name="imagen">
                                        <input type="submit" value="Guardar" name="btneditar" class="form-control btn btn-success">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>

            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>