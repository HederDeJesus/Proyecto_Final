<!DOCTYPE html>
<html>
<head>
    <title>Historial de Compras</title>
</head>
<body>
    <h1>Historial de Compras</h1>
    
    <?php if (count($historialCompras) > 0): ?>
        <table border='1'>
            <tr>
                <th>ID Compra</th>
                <th>ID Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Fecha</th>
            </tr>
            <?php foreach ($historialCompras as $compra): ?>
                <tr>
                    <td><?php echo $compra['id_PD']; ?></td>
                    <td><?php echo $compra['id_PF']; ?></td>
                    <td><?php echo $compra['Precio']; ?></td>
                    <td><?php echo $compra['Cantidad']; ?></td>
                    <td><?php echo $compra['Fecha']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No se encontraron compras.</p>
    <?php endif; ?>
    
    <a href="/SistemaBH/index.php?pagina=inicio">Volver al Inicio</a>
</body>
</html>