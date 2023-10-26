<?php
include("./config.php");

// Compruebe si se ha hecho clic en el botón de registro o no
if (isset($_POST['registrar'])) {
    // recuperar datos del formulario
    $id_producto = $_POST['id_producto'];
    $direccion_envio = $_POST['direccion_envio'];
    $pais_envio = $_POST['pais_envio'];
    $envio_coste = $_POST['envio_coste'];
    $total = $_POST['total'];
    $paqueteria = $_POST['paqueteria'];
    $nombre_cuenta = $_POST['nombre_cuenta'];

    // Consulta
    $query = "INSERT INTO envio(id_producto, direccion_envio, pais_envio, envio_coste, total, paqueteria, nombre_cuenta)
    VALUES('$id_producto', '$direccion_envio', '$pais_envio', '$envio_coste', '$total', '$paqueteria', '$nombre_cuenta')";
    $resultado = mysqli_query($conexion, $query);

    // ¿Comprueba si la consulta se guardó correctamente?
    if ($resultado)
        header('Location: ./index.php?resultado=exito');
    else
        header('Location: ./index.php?resultado=error');
} else
    die("Akses dilarang...");
