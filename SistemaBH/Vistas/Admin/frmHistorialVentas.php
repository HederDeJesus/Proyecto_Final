<!DOCTYPE html>
<html>
<head>
    <title>Historial de Ventas</title>
    <link rel="stylesheet" href="Estilos/stiloventasadmin.css">
</head>
<body>
    <h1>Historial de Ventas</h1>

    <div class="grid-container">
        <?php
        include_once 'Modelo/clsAdmin.php';

        // Crear una instancia del modelo clsVentas
        $ventas = new clsAdmin();

        // Obtener las ventas utilizando la función obtenerVentas()
        $historial_ventas = $ventas->VerVentas();

        // Verificar si hay ventas para mostrar
        if ($historial_ventas && mysqli_num_rows($historial_ventas) > 0) {
            // Iterar sobre las ventas y mostrar cada una
            while ($venta = mysqli_fetch_assoc($historial_ventas)) {
                ?>
                <div class="item">
                    <h2>ID de Venta: <?php echo $venta['id_PD']; ?></h2>
                    <p>ID del Producto Fabricado: <?php echo $venta['id_PF']; ?></p>
                    <p>Precio: $<?php echo $venta['Precio']; ?></p>
                    <p>Cantidad Vendida: <?php echo $venta['Cantidad']; ?></p>
                </div>
                <?php
            }
        } else {
            // Si no hay ventas, mostrar un mensaje
            echo "<p>No hay ventas registradas</p>";
        }
        ?>
    </div>

</body>
</html>