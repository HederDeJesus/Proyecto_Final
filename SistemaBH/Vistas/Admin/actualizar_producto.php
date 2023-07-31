<?php
include_once 'clsAdmin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto_id = $_POST["id"];
    $sabor = $_POST["sabor"];
    $nombre = $_POST["nombre"];
    $stock = $_POST["stock"];
    $precio = $_POST["precio"];

    $admin = new clsAdmin();
    
    // Llamar al método actualizar
    $resultado = $admin->actualizar($producto_id, $sabor, $nombre, $stock, $precio);

    if ($resultado === TRUE) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "Error al actualizar el producto: " . $admin->conectar->error;
    }
}
?>