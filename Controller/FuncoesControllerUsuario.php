<?php
class FuncoesControllerUsuario {
    
    public function inserirUsuario($login, $senha, $perfil, $descUsuario ) {
        include_once '../Model/UsuarioDAO.php';
        $usuarioDao = new usuarioDAO();
        $mensagem = $usuarioDao->inserirUsuarioDAO($login, $senha, $perfil, $descUsuario);
        return $mensagem;
    }
    
    public function pesquisaUsuario() {
        include_once '../Model/UsuarioDAO.php';
         $usuarioDao = new usuarioDAO();
        $linhaNova = $usuarioDao->pesquisaUsuarioDao();
        return $linhaNova;
    }
    public function editarUsuario($login, $senha, $perfil, $descUsuario) {
        include_once '../Model/UsuarioDAO.php';
        $usuarioDao = new usuarioDAO();
        $mensagem = $usuarioDao->editarUsuarioDao($login, $senha, $perfil, $descUsuario);
        return $mensagem;
    }
    
  
    public function excluiUsuario($login) {
        include_once '../Model/UsuarioDAO.php';
        $usuarioDao = new usuarioDAO();
        $mensagem = $usuarioDao->excluiUsuarioDao($login);
        return $mensagem;
    }
  
}