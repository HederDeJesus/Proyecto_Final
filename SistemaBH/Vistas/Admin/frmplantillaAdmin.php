<!DOCTYPE html>
<html>

<head>
    <link href="Estilos/stilomenuadmin.css" rel="stylesheet">
</head>

<title>Beer Heart</title>

<body>
    <header>
        <div class="contenedor">
            <h1 class="marca">Bienvenido de vuelta al negocio</h1>
            <div class="menu">
                <nav>
                    <ul class="lista">
                        <li><a href="/SistemaBH/index?clase=controladorAdmin&metodo=verProductos">Ver Productos</a></li>
                        <li><a href="/SistemaBH/index?clase=controladorprincipal&metodo=InterfazAdministrador">Pagina principal</a></li>
                        <li><a href="/SistemaBH/index?clase=controladorlogin&metodo=cerrarsesion">Cerrar sesión</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <?php include_once($vista); ?>

    <div class="footer">
        <p>&copy; <?php echo date('d-m-Y H:i') ?></p>
    </div>

</body>

</html>