<?php
include_once 'Modelo/clsconexion.php';

class clsAdmin extends clsconexion
{
    public function VerVentas()
    {
        $sql = "SELECT * FROM pedido_detalle";

        $resultado = $this->conectar->query($sql);

        return $resultado;
    }

    public function agregar_producto($sabor,$nombre,$img,$stock,$precio)
    {
        $sql = "CALL sp_agregarproducto('$sabor','$nombre',$img,'$stock','$precio');";

        $resultado = $this->conectar->query($sql);
		
		return $resultado;
    }

    public function actualizar($sabor,$nombre,$stock,$precio,$img)
    {
        $sql = "CALL sp_update('$sabor','$nombre','$stock','$precio',$img)";

        $resultado = $this->conectar->query($sql);
        
        return $resultado;
    }

    public function eliminar($sabor)
    {
        $sql = "CALL sp_delete('$sabor');";

        $resultado = $this->conectar->query($sql);
		
		return $resultado;
    }

    public function consulta_productos()
    {
        $sql = "SELECT * FROM tblproductosadmin;";

        $resultado = $this->conectar->query($sql);
		
		return $resultado;
    }
}
?>