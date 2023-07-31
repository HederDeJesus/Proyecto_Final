<?php
include_once 'Modelo/clsconexion.php';

class clsLogin extends clsconexion
{

	public function buscausuario($usuario,$passw)
	{
		$sql = "CALL sp_buscarusuario('$usuario','$passw');";

		$resultado = $this->conectar->query($sql);

		return $resultado;
	}	

}

?>