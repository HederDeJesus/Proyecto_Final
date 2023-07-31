<!DOCTYPE html>
<html>
<head>
    <title>Beer Heart</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="Estilos/stilomenu.css">
    <h1>Tienda de Cerveza Artesanal</h1>
</head>
<body>
    <div id="main-menu">
        <nav id="menu-area">
            <ul>  
                <li><a href="/SistemaBH/index?clase=controladorprincipal&metodo=iniciousuario">Inicio</a></li>
			    <li><a href="/SistemaBH/index?clase=controladorHistorialCompras&metodo=mostrarHistorialCompras">Ver compras</a></li>
				<li><a href="/SistemaBH/index?clase=controladorlogin&metodo=cerrarsesion">Cerrar sesión</a></li>
                </li>
            </ul>
        </nav>
    </div>

    <?php include_once($vista); ?>

    <br></br>
    <footer>   
        <p>&copy; 2023 Beer Heart. Derechos Reservados. - <?php date('d-m-Y H:i') ?></p>    
    </footer>
</body>
</html>