<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Estilos/stiloadmin.css">
    <title>Productos</title>
</head>
<body>    
    <h2>Agregar producto</h2>
    <form action="SistemaBH/Admin/agregar_producto.php" method="post">
        <label>Sabor:</label>
        <input type="text" name="sabor" required>
        <br>
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label>Stock:</label>
        <input type="number" name="stock" required>
        <br>
        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" required>
        <br>
        <label>Imagen:</label>
        <input type="file" name="imagen" accept="image/*" required>
        <br>
        <input type="submit" value="Agregar">
    </form>
    
    <h1>Productos</h1>

    <?php
include_once 'Modelo/clsAdmin.php';

// Instanciamos la clase clsAdmin
$admin = new clsAdmin();

// Obtener los productos desde la base de datos
$productos = $admin->consulta_productos();

if ($productos->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Sabor</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>";

    while ($fila = $productos->fetch_assoc()) {
        echo "<tr>";
        // Campos editables con formulario
        echo "<td><input type='text' name='sabor' value='" . $fila['Sabor'] . "'></td>";
        echo "<td><input type='text' name='nombre' value='" . $fila['Nombre'] . "'></td>";
        echo "<td><input type='number' name='stock' value='" . $fila['stock'] . "'></td>";
        echo "<td><input type='number' step='0.01' name='precio' value='" . $fila['precio'] . "'></td>";
        echo "<td><img src='data:image/jpeg;base64," . base64_encode($fila['Imagen']) . "' height='50' width='50'></td>";
        // Formulario para enviar datos actualizados al servidor
        echo "<td><form action='/SistemaBH/actualizar_producto.php' method='post' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='id_producto' value='" . $fila['Sabor'] . "'>";
        echo "<input type='file' name='nueva_imagen' accept='image/*'>";
        echo "<input type='submit' name='actualizar' value='Actualizar'>";
        echo "</form>";
        // Formulario para eliminar el registro
        echo "<form action='/SistemaBH/eliminar_producto.php' method='post'>";
        echo "<input type='hidden' name='id_producto' value='" . $fila['Sabor'] . "'>";
        echo "<input type='submit' name='eliminar' value='Eliminar'>";
        echo "</form></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay productos disponibles.";
}
?>


</body>
</html>