<?php
include_once 'clsAdmin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sabor = $_POST["sabor"];
    $nombre = $_POST["nombre"];
    $stock = $_POST["stock"];
    $precio = $_POST["precio"];

    $admin = new clsAdmin();
    
    // Manejar el archivo de imagen y obtener su contenido binario
    $imagen = file_get_contents($_FILES['imagen']['tmp_name']);

    // Llamar al método agregar_producto
    $resultado = $admin->agregar_producto($sabor, $nombre, $imagen, $stock, $precio);

    if ($resultado === TRUE) {
        echo "Producto agregado correctamente.";
    } else {
        echo "Error al agregar el producto: " . $admin->conectar->error;
    }
}
?>