<?php

$verificaclase=!empty($_GET['clase']);//checa si en la url se pone la clase
$verificametodo=!empty($_GET['metodo']);//checa si en la url se pone la función

if($verificaclase && $verificametodo){
    $clase = $_GET['clase'];//toma la clase de la url
    $metodo = $_GET['metodo'];//toma la funcion de la url
    $rutaArchivo = "Controlador/".$clase.".php";//concatena la clase con la carpeta para ubicar el archivo a usar
    require_once $rutaArchivo;
    
    $objeto = new $clase; //Crea el objeto de la clase
    $objeto->$metodo();// llama a la función desde el objeto
}
else
{
    //Aqui entra en caso de que no se ponga nada en la URL
	require_once("Controlador/controladorlogin.php");//ubica el archivo a usar
    $iniciar=new controladorlogin();//crea el objeto de la clase a usar
    $iniciar->inicio();//llama la función
}

?>