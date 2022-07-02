<?php
include_once 'Usuario.php';
class usuarioDAO {
    public function inserirUsuarioDAO($login, $senha, $perfil, $descUsuario) {
        $usuario = new Usuario();
        $usuario->setLogin($login);
        $usuario->setSenha($senha);
        $usuario->setPerfil($perfil);
        $usuario->setDescUsuario($descUsuario);
        include_once '../Model/ConectaBd.php';
        $conectaBd = new ConectaBd();
        $mensagem = "<p class='msgResp bg-success text-center'>Dados inseridos com sucesso.</p>";
        if($conectaBd->_construct() == true) {
            $sql = "insert into usuario values ('".$usuario->getLogin()."', md5('".$usuario->getSenha()."'), '".$usuario->getPerfil()."', '".$usuario->getDescUsuario()."')";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            //$linha = mysqli_fetch_array($query, MYSQLI_ASSOC);
        }else{
            $mensagem = "<p class='msgResp bg-warning text-center'>Problemas na conexão com o banco de dados.</p>";
        }
        $conectaBd->_destruct();
        return $mensagem;
    }
    
    public function pesquisaUsuarioDao() {
        include_once 'ConectaBd.php';
        $conectaBd = new ConectaBd();
        $linhaNova = array();
        if($conectaBd->_construct() === true) {
            $sql = "select * from usuario";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            while($linha = mysqli_fetch_array($query)) {
                array_push($linhaNova, $linha);
            }
            $conectaBd->_destruct();
        }
        return $linhaNova;
    }
    
    
    public function editarUsuarioDao($login, $senha, $perfil, $descUsuario) {
        $usuario = new Usuario();
        $usuario->setLogin($login);
        $usuario->setSenha($senha);
        $usuario->setPerfil($perfil);
        $usuario->setDescUsuario($descUsuario);
        include_once '../Model/ConectaBd.php';
        $conectaBd = new ConectaBd();
        $mensagem = "<p class='msgResp bg-success text-center'>Dados alterados com sucesso.</p>";
        if($conectaBd->_construct() === true) {
            $sql = "update usuario set login = '".$usuario->getLogin()."', '".$usuario->getSenha()."', '".$usuario->getPerfil()."', '".$usuario->getDescUsuario()."'";
            mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            //$linha = mysqli_fetch_array($query, MYSQLI_ASSOC);
        }else{
            $mensagem = "<p class='msgResp bg-warning text-center'>Problemas na conexão com o banco de dados.</p>";
        }
        $conectaBd->_destruct();
        return $mensagem;
    }
    
    public function excluiUsuarioDao($login) {
        $usuario = new Usuario();
        $usuario->setLogin($login);
        include_once 'ConectaBd.php';
        $conectaBd = new ConectaBd();
        $mensagem = "<p class='msgResp bg-success text-center'>Dados excluídos com sucesso.</p>";
        if($conectaBd->_construct() === true) {
            $sql = "delete from usuario where login = '".$usuario->getLogin()."'";
            mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            //$linha = mysqli_fetch_array($query, MYSQLI_ASSOC);
        }else{
            $mensagem = "<p class='msgResp bg-warning text-center'>Problemas na conexão com o banco de dados.</p>";
        }
        $conectaBd->_destruct();
        return $mensagem;
    }
    
  
    
}
