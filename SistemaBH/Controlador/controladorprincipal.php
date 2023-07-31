<?php

class controladorprincipal
{
	private $vista;
	
	public function inicio()
	{	
		$vista="Vistas/Publico/frmcontenidopublico.php";
        include_once("Vistas/Publico/frmplantilla.php");
    }

	public function interfazAdministrador()
	{

		$vista = "Vistas/Admin/frmHistorialVentas.php";
		include_once("Vistas/Admin/frmplantillaAdmin.php"); 
	}

	public function publico()
	{
		$vista = "Vistas/Publico/frmproductos.php";
		include_once("Vistas/Publico/frmplantilla.php");
	}

	public function iniciousuario()
    {
        $vista = "Vistas/Cliente/frmCervezas.php";
        include_once("Vistas/Cliente/frmplantillausuario.php");
    }
}

?>