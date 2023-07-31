<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="Estilos/stilologin.css">
</head>
<body>
  <br><br>
  <form class="form" action="/SistemaBH/index.php?clase=controladorlogin&metodo=Acceder" method="POST">
    <h2>LOGIN</h2>
    <div class="form-group"> 
      <label for="usuario">Usuario:</label>
      <input type="text" id="usuario" name="txtusuario" required>
    </div>
   
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" id="password" name="txtpassword" required>
    </div>
    
    <div class="form-group">
      <button type="submit">Acceder</button>
    </div>
  </form>
</body>
</html>