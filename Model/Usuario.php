<?php

class Usuario {
    
    private $login;
    private $senha;
    private $perfil;
    private $descUsuario;
    
    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function getDescUsuario() {
        return $this->descUsuario;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }          
}