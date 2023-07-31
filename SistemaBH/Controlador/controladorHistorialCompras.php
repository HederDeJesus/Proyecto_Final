<?php
session_start();
include_once 'Modelo/clsHistorialCompras.php';

class controladorHistorialCompras
{
    public function mostrarHistorialCompras()
    {
        // Verificar si el usuario ha iniciado sesión y obtener su ID de usuario
        if (isset($_SESSION['ID_usuario'])) {
            $idUsuario = $_SESSION['ID_usuario'];

            // Obtener el historial de compras del usuario desde el modelo
            $historialCompras = clsHistorialCompras::obtenerHistorialComprasPorUsuario($idUsuario);

            // Incluir la vista para mostrar el historial de compras
            $vista = 'Vistas/Cliente/frmHistorialCompras.php';
            include_once 'Vistas/Cliente/frmplantillausuario.php';
        } 
        //  else {
        //     // Si el usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
        //     header('Location: /SistemaCervezas/index.php?pagina=login');
        //     exit;
        // }
    }
}
?>