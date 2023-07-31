<?php
include_once 'Modelo/clsClientes.php';

class controladorcliente
{
	private $vista;

	public function iniciaformulario()
	{	
		$vista="Vistas/Acceso/frmLogin.php";
        include_once("Vistas/Publico/frmplantilla.php");
    }

	public function iniciarsesion()
	{
		$cliente=new clsClientes();

		if(!empty($_POST))
		{
		$usuario=$_POST['txtUsuario'];
		$contraseña=$_POST['txtContraseña'];
		$cliente->iniciarsesion($usuario,$contraseña);
		$Consulta=$cliente->ConsultaClientes();
		$vista="Vistas/Acceso/frmLogin.php";
		include_once("Vistas/Publico/frmplantilla.php");
		}
		else
		{
		$Consulta=$cliente->ConsultaClientes();
		$vista="Vistas/Acceso/frmLogin.php";
        include_once("Vistas/Publico/frmplantilla.php");
		}
	}

	public function insertar_clientes()
	{
		$cliente = new clsClientes();
		
		if (!empty($_POST))
		{
			$nombre = $_POST['txtNombre'];
			$Apaterno = $_POST['txtApaterno'];
			$Amaterno = $_POST['txtAmaterno'];
			$edad = $_POST['txtEdad'];
			$telefono = $_POST['txtTelefono'];
	
			// Verificar si la edad es mayor o igual a 18 años
			if (intval($edad) >= 18)
			{
				$cliente->insertar_clientes($nombre, $Apaterno, $Amaterno, $edad, $telefono);
				$Consulta = $cliente->ConsultaClientes();
				$vista = "Vistas/Cliente/frmCliente.php";
				include_once("Vistas/Cliente/frmdireccion.php");
			}
			else
			{
				// Mostrar un mensaje de error en caso de ser menor de edad
				echo "Usted no puede entrar a la pagina es menor de edad.";
			}
		}
		else
		{
			$Consulta = $cliente->ConsultaClientes();
			$vista = "Vistas/Cliente/frmCliente.php";
			include_once("Vistas/Publico/frmplantilla.php");
		}
	}
	public function insertar_direccion()
	{
		$cliente=new clsClientes();
		
		if(!empty($_POST))
		{
			$calle=$_POST['txtCalle'];
			$colonia=$_POST['txtColonia'];
			$municipio=$_POST['txtMunicipio'];
			$estado=$_POST['txtEstado'];
			$cliente->insertar_direccion($calle,$colonia,$municipio,$estado);

			$Consulta=$cliente->ConsultaClientes();
			$vista="Vistas/Cliente/frmusuario.php";
        	include_once("Vistas/Publico/frmplantilla.php");
		}
	}
	public function insertar_usuario()
	{
		$cliente = new clsClientes();
		
		if (!empty($_POST)) {
			$usuario = $_POST['txtusuario'];
			$password = $_POST['txtpassword'];
			$cliente->insertar_usuario($usuario, $password);
	
			$Consulta=$cliente->ConsultaClientes();
			$vista="Vistas/Cliente/frmCervezas.php";
        	include_once("Vistas/Cliente/frmplantillausuario.php");
		}
	}
}