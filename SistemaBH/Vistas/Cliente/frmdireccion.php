<head>
  <link rel="stylesheet" href="Estilos/stilologin.css">
</head>
<form class="form" action="/SistemaBH/index?clase=controladorcliente&metodo=insertar_direccion" method="POST">
    <h2>Proporcione su direccion por favor</h2>

<body>
    <form action="index.php" method="post">
        <label for="calle">Calle:</label>
        <input type="text" name="txtCalle" required><br>

        <label for="colonia">Colonia:</label>
        <input type="text" name="txtColonia" required><br>

        <label for="municipio">Municipio:</label>
        <input type="text" name="txtMunicipio" required><br>

        <label for="estado">Estado:</label>
        <input type="tel" name="txtEstado" required><br>

        <input type="submit" value="Guardar">
    </form>
</body>
