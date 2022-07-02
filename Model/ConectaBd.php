<?php

class ConectaBd {
    private $url;
    private $usuario;
    private $senha;
    private $database;
    public $db;
    
    public function _construct(){
        $this->url = "localhost";
        $this->usuario = "root";
        $this->senha = "";
        $this->database = "tp";
        
        $this->db = mysqli_connect($this->url, $this->usuario, $this->senha, 
                $this->database) or die("Servidor Fora do ar.");
                mysqli_select_db($this->db, $this->database) 
                        or die("Banco fora do ar.");
        return true;
    }
    public function _destruct(){
        mysqli_close($this->db);
        unset($this->url);
        unset($this->usuario);
        unset($this->senha);
        unset($this->database);
        unset($this->db);
    }
    
}












































