<?php
include("./config.php");

// Compruebe si se ha hecho clic en el botón de editar o no
if (isset($_POST['editar_datos'])) {
    // recuperar datos del formulario
    $id_envio = $_POST['id_envio'];
    $edit_id_producto = $_POST['edit_id_producto'];
    $edit_direccion_envio = $_POST['edit_direccion_envio'];
    $edit_pais_envio = $_POST['edit_pais_envio'];
    $edit_envio_coste = $_POST['edit_envio_coste'];
    $edit_total = $_POST['edit_total'];
    $edit_paqueteria = $_POST['edit_paqueteria'];
    $edit_nombre_cuenta = $_POST['edit_nombre_cuenta'];


    // Consulta
    $query = "UPDATE envio SET id_producto='$edit_id_producto', direccion_envio='$edit_direccion_envio', pais_envio='$edit_pais_envio', envio_coste='$edit_envio_coste', total='$edit_total', paqueteria='$edit_paqueteria', nombre_cuenta='$edit_nombre_cuenta' WHERE id_envio = '$id_envio'";
    $resultado = mysqli_query($conexion, $query);

    // ¿Comprueba si la consulta se guardó correctamente?
    if ($resultado)
        header('Location: ./index.php?eliminar=exito');
    else
        header('Location: ./index.php?eliminar=error');
} else
    die("Acceso prohibido...");
