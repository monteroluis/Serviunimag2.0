<?php


require_once ("DataSource.php");
require_once (__DIR__."/../entidad/Usuario.php");


/**
 * Description of UsuarioDAO
 *
 * @author Admin
 */
class UsuarioDAO {
    
    public function autenticarUsuario($user, $pass){  // Login
        $data_source = new DataSource();
      
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE username = :user AND password = :pass", 
                                                    array(':user'=>$user,':pass'=>$pass));
        $usuario= null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario(
                        $data_table[$indice]["usu_id"],
                        $data_table[$indice]["nombre"],
                        $data_table[$indice]["username"],
                        $data_table[$indice]["password"],
                        $data_table[$indice]["rol_id"]
                        );
            }
            return $usuario;
        }else{
            return null;
        }
    }
    
    public function buscarUsuarioPorId($username){
        $data_source = new DataSource();
        //password_hash("rasmuslerdorf", PASSWORD_DEFAULT)
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM usuario WHERE username = :username", 
                                                    array(':username'=>$username));
        $usuario=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Usuario(
                    $data_table[$indice]["usu_id"],
                    $data_table[$indice]["nombre"],
                    $data_table[$indice]["username"],
                    $data_table[$indice]["password"],
                    $data_table[$indice]["rol_id"]
                   
                    );
            }
            return $usuario;
        }else{
            return null;
        }
    }    
    
    
    public function verUsuarios(){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM usuario");
        $usuario=null;
        $usuarios=array();
        foreach($data_table as $indice=>$valor){
            $usuario = new Usuario(
                        $data_table[$indice]["usu_id"],
                        $data_table[$indice]["nombre"],
                        $data_table[$indice]["username"],
                        $data_table[$indice]["password"],
                        
                );
                array_push($usuarios,$usuario);
        }
        return $usuarios;   
    }
    
    public function insertarUsuario(Usuario $usuario){
        $data_source= new DataSource();
        $sql = "INSERT INTO usuario VALUES (:usu_id, :nombre, :username, :password, :rol_id)";
        $resultado = $data_source->ejecutarActualizacion($sql, array(
            ':usu_id'=>$usuario->getUsu_id(),
            ':nombre'=>$usuario->getNombre(),
            ':username'=>$usuario->getUsername(),
            ':password'=>$usuario->getPassword(),
            ':rol_id'=>$usuario->esRol_id() 
            )
        );
        return $resultado;
    }
    
    public function modificarUsuario(Usuario $usuario){
        $data_source= new DataSource();
        $sql = "UPDATE usuario SET 
        nombre= :nombre, "
    . " username= :username, "
    . " password= :password, "
                . " WHERE id= :id ";
        $resultado = $data_source->ejecutarActualizacion($sql, array( 
                ':nombre'=>$usuario->getNombre(),      
                ':username'=>$usuario->getUsername(),
                ':password'=>$usuario->getPassword(),
                ':usu_id'=>$usuario->getId(),
                ':rol_id' => $usuario->esRol_id()
            )
        );
        
        return $resultado;
    }
    
    public function borrarUsuario($id){
        $data_source = new DataSource();
        $stmt1 = "DELETE FROM usuario WHERE usu_id = :usu_id";
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':usu_id' => $idUsuario
            )
        ); 
        return $resultado;
    }
    
    
    
}
