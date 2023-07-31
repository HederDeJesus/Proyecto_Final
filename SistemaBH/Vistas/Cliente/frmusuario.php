<head>
  <link rel="stylesheet" href="Estilos/stilologin.css">
</head>
<form class="form" action="/SistemaCervezas/index?clase=controladorcliente&metodo=insertar_usuario" method="POST">
    <h2>Cree su usuario</h2>

<body>
    <form action="index.php" method="post">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" name="txtusuario" required><br>

        <label for="contra">Contraseña:</label>
        <input type="text" name="txtpassword" required><br>

        <input type="submit" value="Guardar">
    </form>
</body>
