<?php

include_once 'Modelo/clsconexion.php';

class clsClientes extends clsconexion
{

	public function insertar_clientes($nombre, $apaterno, $amaterno, $telefono)
	{
		$sql="CALL sp_insertar_cliente('$nombre', '$apaterno', '$amaterno', $telefono);";
		$resultado = $this->conectar->query($sql);
		
		return $resultado;
	}
	
	public function insertar_direccion($calle, $colonia, $municipio, $estado)
	{
		$sql= "CALL sp_insertar_direccion('$calle', '$colonia', '$municipio', '$estado');";
		$resultado = $this->conectar->query($sql);
		
		return $resultado;
	}
	
    public function insertar_usuario($usuario, $password)
    {
        $sql = "CALL sp_insertar_usuarios('$usuario', '$password');";
        $resultado = $this->conectar->query($sql);
        
        return $resultado;
    }

	public function ConsultaClientes()
	{
		$sql = "select * from usuarios;";

		$resultado = $this->conectar->query($sql);
		
		return $resultado;
	}

	public function Vista_de_los_productos()
	{
		$sql = "SELECT * FROM tblproductos;";
		$resultado = $this->conectar->query($sql);
		
		return $resultado;

	}
}
?>