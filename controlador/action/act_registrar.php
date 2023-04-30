<?php
   
    session_start();
    
    require_once (__DIR__."/../mdb/mdbUsuario.php");
    require_once (__DIR__."/../../modelo/entidad/usuario.php");

        $nombre = $_POST['nombre'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $rol_id = $_POST['rol_id'];
        
        
 

        
        

        
            
        $usuarioExistente = buscarUsuarioPorId($username);
        if($usuarioExistente) {
            $_SESSION['error'] = 'El nombre de usuario ya está registrado.';
            header("Location: ../../vista/dashboardAdmin.php");
            exit;
        }
            
            $usuario = new Usuario(null,$nombre, $username, $password,2);
            $registro = insertarUsuario($usuario);
        
          
        


        if(isset($_POST['administrador'])) {
            $usuario = new Usuario(null,$nombre, $username, $password,1);
            
            $registro = insertarUsuario($usuario);
            header("Location: ../../vista/dashboardAdmin.php");
        }else{
            if($registro)
            header("Location: ../../vista/dashboardAdmin.php");
            else
            header("Location: ../../dashboardAdmin.php");
        }
?>
            
        