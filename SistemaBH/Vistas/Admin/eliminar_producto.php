<?php
include_once 'clsAdmin.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $producto_id = $_GET['id'];

    $admin = new clsAdmin();

    // Llamar al método eliminar
    $resultado = $admin->eliminar($producto_id);

    if ($resultado === TRUE) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . $admin->conectar->error;
    }
}
?>