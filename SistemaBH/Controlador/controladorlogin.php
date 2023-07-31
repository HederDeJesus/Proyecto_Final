<?php
session_start();
include_once 'Modelo/clsLogin.php';

class controladorlogin
{
    private $vista;

    public function inicio()
    {
        $vista = "Vistas/Publico/frmcontenidopublico.php";
        include_once("Vistas/Publico/frmplantilla.php");
    }

    public function Acceder()
    {
        $login = new clsLogin();

        if (!empty($_POST)) {
            $usuario = $_POST['txtusuario'];
            $password = $_POST['txtpassword'];
            $datos = $login->buscausuario($usuario, $password);
            $usuario = $datos->fetch_object();

            if ($datos->num_rows > 0) 
            {
                $_SESSION['Tipo_usuario'] = $usuario->Tipo_usuario;

                if ($_SESSION['Tipo_usuario'] === "Administrador") {
                    $vista = "Vistas/Admin/frmHistorialVentas.php";
                    include_once("Vistas/Admin/frmplantillaAdmin.php"); 

                } else if ($_SESSION['Tipo_usuario'] === "Normal") { 
                    $vista = "Vistas/Cliente/frmCervezas.php";
                    include_once("Vistas/Cliente/frmplantillausuario.php");
                }
            } else {
                echo ('Los datos son incorrectos');
                $vista = "Vistas/Acceso/frmDenegado.php"; 
                include_once("Vistas/Publico/frmplantilla.php"); 
            }
        }
    }
    

    public function cerrarsesion()
    {
        session_destroy();
        $vista = "Vistas/Publico/frmcontenidopublico.php";
        include_once("Vistas/Publico/frmplantilla.php");
    }
}