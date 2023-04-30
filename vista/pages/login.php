<?php
 session_start();
 if(isset($_SESSION['ID_USUARIO'])){
   header('location: ../vista/dashboard.php');

 }
 
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styles.css" />
    <title>ServiUnimag</title>
  </head>
  <body>
    <main>
      <div class="container" id="container">
        <div class="form-container">
          <form action="#">
            <h1>Iniciar Sesión</h1>
            <span>usa tu correo institucional</span>
            <input type="email" placeholder="Email" id="Email" name="username" id=" validationCustomUsername"  aria-describedby="inputGroupPrepend" required />
            <input type="password" placeholder="Contraseña" type="password" id="Password" name="password" id="validationCustom01"  required/>
            <a href="#">¿Olvidaste tu contraseña?</a>
            <button name="submit" value="submit" id="btnlogin">Iniciar sesión</button>
          </form>
        </div>
        <div class="overlay-panel">
          <h1>Hola, Bienvenido!</h1>
          <p>Aquí encontrarás las herramientas necesarias que te ayudarán en tu camino al éxito </p>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </main>
  </body>
</html>
