<?php
include_once 'Modelo/clsAdmin.php';

class controladorAdmin
{
    public function verProductos()
    {
        $admin = new clsAdmin();
        $productos = $admin->consulta_productos();

        // Incluir la vista para mostrar los productos
        $vista = ('Vistas/Admin/productos.php');
        include_once 'Vistas/Admin/frmplantillaAdmin.php';
    }

    public function agregarProducto()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $sabor = $_POST["sabor"];
            $nombre = $_POST["nombre"];
            $stock = $_POST["stock"];
            $precio = $_POST["precio"];
            $imagen = file_get_contents($_FILES['imagen']['tmp_name']);

            // Instanciar el modelo
            $admin = new clsAdmin();

            // Llamar al proceso almacenado para agregar el producto
            $resultado = $admin->agregar_producto($sabor, $nombre, $imagen, $stock, $precio);

            if ($resultado === TRUE) {
                echo "Producto agregado correctamente.";
            } else {
                echo "Error al agregar el producto: " . $admin->conectar->error;
            }
        }

        // Incluir la vista para agregar productos
        include 'Vistas/Admin/agregar_producto.php';
    }

    public function editarProducto()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $producto_id = $_POST["id"];
            $sabor = $_POST["sabor"];
            $nombre = $_POST["nombre"];
            $stock = $_POST["stock"];
            $precio = $_POST["precio"];

            // Instanciar el modelo
            $admin = new clsAdmin();

            // Llamar al proceso almacenado para actualizar el producto
            $resultado = $admin->actualizar($sabor, $nombre, $stock, $precio, $producto_id);

            if ($resultado === TRUE) {
                echo "Producto actualizado correctamente.";
            } else {
                echo "Error al actualizar el producto: " . $admin->conectar->error;
            }
        }

        // Obtener el ID del producto a editar desde los parámetros de la URL
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            // Si no se proporciona un ID válido, redirigir a la página de ver productos
            header("Location: /SistemaBH/index.php?pagina=productos");
            exit;
        }

        // Obtener los datos del producto a editar desde el modelo
        $admin = new clsAdmin();
        $producto = $admin->consulta_producto_por_id($producto_id);

        // Incluir la vista para editar productos
        include 'Vistas/Admin/editar_producto.php';
    }

    public function eliminarProducto()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $producto_id = $_GET['id'];

            // Instanciar el modelo
            $admin = new clsAdmin();

            // Llamar al proceso almacenado para eliminar el producto
            $resultado = $admin->eliminar($producto_id);

            if ($resultado === TRUE) {
                echo "Producto eliminado correctamente.";
            } else {
                echo "Error al eliminar el producto: " . $admin->conectar->error;
            }
        }

        // Redirigir a la página de ver productos
        header("Location: /SistemaBH/index.php?pagina=productos");
        exit;
    }

}
?>