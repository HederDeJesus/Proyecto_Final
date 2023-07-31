<head>
  <link rel="stylesheet" href="Estilos/stilologin.css">
</head>
<form class="form" action="/SistemaBH/index?clase=controladorcliente&metodo=insertar_clientes" method="POST">
    <h2>Crear Clientes</h2>

<body>
    <form action="index.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="txtNombre" required><br>

        <label for="ap">Apellido paterno:</label>
        <input type="text" name="txtApaterno" required><br>

        <label for="am">Apellido materno:</label>
        <input type="text" name="txtAmaterno" required><br>

        <label for="am">Edad:</label>
        <input type="text" name="txtEdad" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="tel" name="txtTelefono" required><br>

        <input type="submit" value="Guardar">
    </form>
</body>
