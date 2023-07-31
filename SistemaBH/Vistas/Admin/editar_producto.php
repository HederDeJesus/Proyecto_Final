<?php
include_once 'clsAdmin.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $producto_id = $_GET['id'];

    // Consultar el producto por su ID
    $admin = new clsAdmin();
    $producto = $admin->consulta_producto_por_id($producto_id);

    if ($producto->num_rows > 0) {
        $fila = $producto->fetch_assoc();
        // Mostrar un formulario con los datos del producto para editarlos
        echo "<h2>Editar producto</h2>";
        echo "<form action='actualizar_producto.php' method='post'>";
        echo "<input type='hidden' name='id' value='".$fila['id_produc']."'>";
        echo "<label>Sabor:</label>";
        echo "<input type='text' name='sabor' value='".$fila['Sabor']."' required>";
        echo "<br>";
        echo "<label>Nombre:</label>";
        echo "<input type='text' name='nombre' value='".$fila['Nombre']."' required>";
        echo "<br>";
        echo "<label>Stock:</label>";
        echo "<input type='number' name='stock' value='".$fila['stock']."' required>";
        echo "<br>";
        echo "<label>Precio:</label>";
        echo "<input type='number' step='0.01' name='precio' value='".$fila['precio']."' required>";
        echo "<br>";
        echo "<input type='submit' value='Actualizar'>";
        echo "</form>";
    } else {
        echo "Producto no encontrado.";
    }
}
?>