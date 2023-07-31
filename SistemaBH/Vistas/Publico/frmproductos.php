<!DOCTYPE html>
<html>
<head>
    <title>Cervezas</title>
    <link rel="stylesheet" type="text/css" href="Estilos/stilomenucerveza.css">
    <link rel="stylesheet" href="Estilos/stiloproductos.css">
</head>
<body>
    <h1>Lista de Cervezas</h1>

    <div class="grid-container">
        <?php
        // Incluir el modelo clsClientes y clsVentas
        include_once 'Modelo/clsClientes.php';

        // Crear una instancia del modelo clsClientes
        $cliente = new clsClientes();

        // Obtener los productos utilizando la función Vista_de_los_productos()
        $productos = $cliente->Vista_de_los_productos();

        $ruta_imagenes = "SistemaCervezas/img";

        // Verificar si hay productos para mostrar
        if ($productos && mysqli_num_rows($productos) > 0) {
            // Iterar sobre los productos y mostrar cada uno
            while ($producto = mysqli_fetch_assoc($productos)) {
                echo '<div class="item">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($producto['imagen']) . '" height="50" width="50">';
                echo '<h2>' . $producto['Nombre'] . '</h2>';
                echo '<p>Precio: $' . $producto['precio'] . '</p>';
                echo '<p>Sabor: ' . $producto['sabor'] . '</p>';
                echo '<form class="form" action="/SistemaCervezas/index?clase=controladorcliente&metodo=mostrar_productos_y_comprar" method="POST">';
                echo '<input type="hidden" name="id_producto" value="' . $producto['idproducto'] . '">';
                echo '</form>';
                echo '</div>';
            }
        
        } else {
            // Si no hay productos, mostrar un mensaje
            echo "<p>No hay productos disponibles</p>";
        }

        // Procesar el formulario de compra cuando se envíe
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_producto"]) && isset($_POST["cantidad"])) {
            // Crear una instancia del modelo clsVentas
            $ventas = new clsVentas();

            // Obtener el id del producto y la cantidad de cervezas a comprar
            $id_producto = $_POST["id_producto"];
            $cantidad = $_POST["cantidad"];

            // Obtener el precio del producto seleccionado
            $precio_producto = $cliente->obtenerPrecioProducto($id_producto);

            // Calcular el precio total de la venta
            $precio_total = $precio_producto * $cantidad;

            // Insertar la venta en la tabla pedido_detalle
            $ventas->insertarVenta($id_producto, $precio_total, $cantidad);
            sleep(2);
            // Redireccionar para evitar que se vuelva a enviar el formulario
            header("Location: /SistemaCervezas/index?clase=controladorcliente&metodo=mostrar_productos_y_comprar");
            exit;
        }
        ?>
    </div>
    <?php
// Verificar si hay un mensaje de compra exitosa en la URL
if (isset($_GET["compra_exitosa"]) && $_GET["compra_exitosa"] == 1) {
    echo "<p>Gracias por su compra. ¡Que tenga un buen día!</p>";
}
?>

</body>
</html>