<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <title>F1_MERCH</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">F1-Merch</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="#">Iniciar sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- form tambah envio -->
        <div class="card mb-5">
            <!-- <div class="card-header">
                Latihan CRUD PHP & MySQL
            </div> -->
            <!-- tambah data -->
            <div class="card-body">
                <h3 class="card-title">Tabla Envio</h3>
                <p class="card-text">En esta tabla de nuestra base de datos F1-Merch guardamos toda la información importante y necesaria para lograr preparar y enrtegar un envío a cualquier parte del mundo donde te encuentres, guardamos datos, como el país dodne se va a enviar nuestro producto, la dirección de tu vivienda y el costo que teien el envio junto con el total que te costaría el prducto y el envío de este</p>

                <!-- mostrar mensaje de éxito -->
                <?php if (isset($_GET['resultado'])) : ?>
                    <?php
                    if ($_GET['resultado'] == 'exito')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Proceso exitoso!</strong> Datos agregados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Oops!</strong> Error al agregar datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>

                <!-- Grupo de inputs -->

                <form class="row g-3" action="tambah.php" method="POST">

                    <div class="col-md-4">
                        <label for="NIM" class="form-label">Id_producto</label>
                        <input type="text" name="id_producto" class="form-control" placeholder="Id_producto" required>
                    </div>

                    <div class="col-md-4">
                        <label for="NIM" class="form-label">Direccion_envio</label>
                        <input type="text" name="direccion_envio" class="form-control" placeholder="Direccion_envio" required>
                    </div>

                    <div class="col-md-4">
                        <label for="NIM" class="form-label">Pais_envio</label>
                        <input type="text" name="pais_envio" class="form-control" placeholder="Pais_envio" required>
                    </div>

                    <div class="col-md-4">
                        <label for="NIM" class="form-label">Envio_coste</label>
                        <input type="text" name="envio_coste" class="form-control" placeholder="Envio_coste" required>
                    </div>

                    <div class="col-md-4">
                        <label for="NIM" class="form-label">Total</label>
                        <input type="text" name="total" class="form-control" placeholder="Total" required>
                    </div>

                    <div class="col-md-4">
                        <label for="Agama" class="form-label">Paqueteria</label>
                        <select class="form-select" name="paqueteria" aria-label="Default select example">
                            <option value="Estafeta">Estafeta</option>
                            <option value="DHL">DHL</option>
                            <option value="FedEx">FedEx</option>
                            <option value="Amazon">Amazon</option>
                            <option value="Mercado">Mercado Libre</option>
                            <option value="Redpack">Redpack</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="Jurusan" class="form-label">Nombre_cuenta</label>
                        <input type="text" name="nombre_cuenta" class="form-control" placeholder="Nombre_cuenta" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="registrar"><i class="fa fa-plus"></i><span class="ms-2">Registrar datos de envio</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- judul tabel -->
        <h5 class="mb-3">Historial de registros de envio</h5>

        <div class="row my-3">
            <div class="col-md-3 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Limite de entradas visibles</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- mostrar mensaje de eliminación exitosa -->
        <?php if (isset($_GET['eliminar'])) : ?>
            <?php
            if ($_GET['eliminar'] == 'exito')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Proceso exitoso!</strong> Datos eliminados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Oops!</strong> No se pudieron eliminar los datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- mostrar un mensaje de edición exitosa -->
        <?php if (isset($_GET['actualizar'])) : ?>
            <?php
            if ($_GET['actualizar'] == 'exito')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Proceso exitoso!</strong> Datos actualizados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Oops!</strong> Los datos no se pudieron actualizar!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabel -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>Id_envio</th>";
            echo "<th scope='col' class='text-center'>Id_producto</th>";
            echo "<th scope='col' class='text-center'>Direccion_envio</th>";
            echo "<th scope='col' class='text-center'>Pais_envio</th>";
            echo "<th scope='col' class='text-center'>Envio_coste</th>";
            echo "<th scope='col' class='text-center'>Total</th>";
            echo "<th scope='col' class='text-center'>Paquetería</th>";
            echo "<th scope='col' class='text-center'>Nombre_cuenta</th>";
            echo "<th scope='col' class='text-center'>Opción</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $limite = 10;
            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $inicio_limite = ($pagina > 1) ? ($pagina * $limite) - $limite : 0;

            $anterior = $pagina - 1;
            $siguiente = $pagina + 1;

            $datos = mysqli_query($conexion, "SELECT * FROM envio");
            $cantidad_de_datos = mysqli_num_rows($datos);
            $paginas_totales = ceil($cantidad_de_datos / $limite);

            $datos_mostrados = mysqli_query($conexion, "SELECT * FROM envio LIMIT $inicio_limite, $limite");
            $id_envio = $inicio_limite + 1;

            // $sql = "SELECT * FROM envio";
            // $query = mysqli_query($conexion, $sql);




            while ($envio = mysqli_fetch_array($datos_mostrados)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $envio['id_envio'] . "</td>";
                echo "<td class='text-center'>" . $id_envio++ . "</td>";
                echo "<td class='text-center'>" . $envio['id_producto'] . "</td>";
                echo "<td class='text-center'>" . $envio['direccion_envio'] . "</td>";
                echo "<td class='text-center'>" . $envio['pais_envio'] . "</td>";
                echo "<td class='text-center'>" . $envio['envio_coste'] . "</td>";
                echo "<td class='text-center'>" . $envio['total'] . "</td>";
                echo "<td class='text-center'>" . $envio['paqueteria'] . "</td>";
                echo "<td class='text-center'>" . $envio['nombre_cuenta'] . "</td>";

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                // tombol hapus
                echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($cantidad_de_datos == 0) {
                echo "<p class='text-center'>No hay datos disponibles en esta tabla.</p>";
            } else {
                echo "<p>Total $cantidad_de_datos entradas</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina > 1) ? "href='?pagina=$anterior'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $paginas_totales; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina < $paginas_totales) ? "href='?pagina=$siguiente'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Modal de editar datos -->
        <div class='modal fade' style="top:58px !important;" id='editar_modal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar datos de envio</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $query = "SELECT * FROM envio";
                    $resultado = mysqli_query($conexion, $query);
                    $envio = mysqli_fetch_array($resultado);
                    ?>

                    <form action='edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='id_envio' id='id_editar'>

                            <div class="col-md-12">
                                <label for="NIM" class="form-label">Id_producto</label>
                                <input type="text" name="edit_id_producto" id="edit_id_producto" class="form-control" placeholder="Id_producto" required>
                            </div>

                            <div class="col-md-12">
                                <label for="NIM" class="form-label">Direccion_envio</label>
                                <input type="text" name="edit_direccion_envio" id="edit_direccion_envio" class="form-control" placeholder="Direccion_envio" required>
                            </div>

                            <div class="col-md-12">
                                <label for="NIM" class="form-label">Pais_envio</label>
                                <input type="text" name="edit_pais_envio" id="edit_pais_envio" class="form-control" placeholder="Pais_envio" required>
                            </div>

                            <div class="col-md-12">
                                <label for="NIM" class="form-label">Envio_coste</label>
                                <input type="text" name="edit_envio_coste" id="edit_envio_coste" class="form-control" placeholder="Envio_coste" required>
                            </div>

                            <div class="col-md-12">
                                <label for="NIM" class="form-label">Total</label>
                                <input type="text" name="edit_total" id="edit_total" class="form-control" placeholder="Total" required>
                            </div>

                            <div class="col-md-12">
                                <label for="Agama" class="form-label">Paqueteria</label>
                                <select class="form-select" name="edit_paqueteria" id="edit_paqueteria" aria-label="Default select example">
                                    <option value="Estafeta">Estafeta</option>
                                    <option value="DHL">DHL</option>
                                    <option value="FedEx">FedEx</option>
                                    <option value="Amazon">Amazon</option>
                                    <option value="Mercado">Mercado Libre</option>
                                    <option value="Redpack">Redpack</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="Jurusan" class="form-label">Nombre_cuenta</label>
                                <input type="text" name="edit_nombre_cuenta" id="edit_nombre_cuenta" class="form-control" placeholder="Nombre_cuenta" required>
                            </div>
                            <br>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='editar_datos' id="editar_datos" class='btn btn-primary'>Editar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- Modal Delete-->
        <div class='modal fade' style="top:58px !important;" id='Borrar_modal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmación</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='hapus.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='id_borrado' id='borrar_id'>
                            <p>¿Estás seguro de que deseas eliminar estos datos?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='Borrar_datos' class='btn btn-primary'>Eliminar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- tutup container -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- edit function -->
    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#editar_modal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_id_producto').val(data[2]);
                $('#edit_direccion_envio').val(data[3]);
                $('#edit_pais_envio').val(data[4]);
                $('#edit_envio_coste').val(data[5]);
                $('#edit_total').val(data[6]);
                $('#edit_paqueteria').val(data[7]);
                $('#edit_nombre_cuenta').val(data[8]);
            });
        });
    </script>

    <!-- delete function -->
    <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#Borrar_modal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#borrar_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>