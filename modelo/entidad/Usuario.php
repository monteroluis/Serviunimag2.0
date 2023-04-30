<?php


/**
 * Usuario
 */
class Usuario
{
    private $usu_id;
    private $nombre;
    private $username;
    private $password;
    public $rol_id;

    public function __construct($usu_id, $nombre, $username, $password, $rol_id){
        $this->usu_id = $usu_id;
        $this->nombre = $nombre; 
        $this->username = $username;
        $this->password = $password;
        $this->rol_id = $rol_id;  
    }
    

    public function getUsu_id()
    {
        return $this->usu_id;
    }
    
   
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }


    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }


    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }



    


    public function esRol_id(){
        return $this->rol_id;
    }
    
    public function setRol_id($rol_id)
    {
        $this->rol_id = $rol_id;

        return $this;
    }


        
    public function toArray() {
        $vars = get_object_vars ( $this );
        $array = array ();
        foreach ( $vars as $key => $value ) {
            $array [ltrim ( $key, '_' )] = $value;
        }
        return $array;
    }
}

