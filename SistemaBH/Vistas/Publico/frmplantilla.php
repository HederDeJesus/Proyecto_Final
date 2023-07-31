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
                <li><a href="/SistemaBH/index?clase=controladorprincipal&metodo=inicio">Inicio</a></li>
                <li><a href="/SistemaBH/index?clase=controladorprincipal&metodo=publico">Ver productos</a></li>
                <li><a href="#">Registrarse</a>
                    <ul class="submenu-1">
                        <li><a href="/SistemaBH/index?clase=controladorcliente&metodo=insertar_clientes">Crear Usuario</a></li>
                        <li><a href="/SistemaBH/index?clase=controladorcliente&metodo=iniciarsesion">Inicio Sesion</a></li>
                    </ul>
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