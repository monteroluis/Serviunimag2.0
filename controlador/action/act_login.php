<?php
        session_start();
       
       
       
       
        require_once (__DIR__."/../mdb/mdbUsuario.php");

	if(isset($_POST['submit'])){
		$errMsg = '';
		//username and password sent from Form
		$username = $_POST['username'];
		$password = $_POST['password'];
                
                $usuario = autenticarUsuario($username, $password);

                
		if($usuario != null){ // Puede iniciar sesión
                        $_SESSION['ID_USUARIO'] = $usuario->getUsu_id();
                        $_SESSION['NOMBRE'] = $usuario->getNombre();
                        $_SESSION['CORREO'] = $usuario->getUsername();
                        $_SESSION['PASSWORD'] = $usuario->getPassword();
                        $_SESSION['ADMIN'] = $usuario->esRol_id();  
                        
                        echo "<script>
                                alert('Inicio de sesión exitoso');
                                window.location.href = '../../vista/dashboards.php';
                        </script>";

                     
                if($usuario->esRol_id() == 1){
                        
                        header("Location: ../../vista/dashboardAdmin.php");                
                }else{
                        header("location: ../../vista/dashboard.php");
                } 
                }

        }
        if($usuario == null){
                echo "<script>
                                alert('efe papi');
                                
                        </script>";
                       header("Location: ../../vista/sesion.php");
        }
        

               
                
              
                
	
        
        
    
        
?>
