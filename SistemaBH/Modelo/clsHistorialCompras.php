<?php
include_once 'clsconexion.php';

class clsHistorialCompras extends clsconexion
{
    public static function obtenerHistorialComprasPorUsuario($idUsuario)
    {
        // Evitar posibles ataques de inyección de SQL utilizando prepared statements
        $stmt = $this->conectar->prepare("SELECT * FROM pedido_detalle WHERE id_usuario = ?");
        $stmt->bind_param("i", $idUsuario);
        $stmt->execute();
        $result = $stmt->get_result();

        // Crear un array para almacenar el historial de compras
        $historialCompras = array();

        // Obtener los datos de compras y almacenarlos en el array
        while ($row = $result->fetch_assoc()) {
            $historialCompras[] = $row;
        }

        // Cerrar la consulta y la conexión a la base de datos
        $stmt->close();
        $this->conectar->close();

        return $historialCompras;
    }
}
?>