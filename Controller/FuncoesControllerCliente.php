<?php
class FuncoesControllerCliente {
    
    public function inserirCliente($codCliente, $nomeCliente, $cpfcnpj, $telefone, $celular, $email ) {
        include_once '../Model/clienteDAO.php';
        $clienteDao = new clienteDAO();
        $mensagem = $clienteDao->inserirClienteDAO($codCliente, $nomeCliente, $cpfcnpj, $telefone, $celular, $email);
        return $mensagem;
    }
    
    public function pesquisaCliente() {
        include_once '../Model/clienteDAO.php';
        $clienteDao = new clienteDAO();
        $linhaNova = $clienteDao->pesquisaClienteDao();
        return $linhaNova;
    }
    
    public function editarCliente($codCliente, $nomeCliente, $cpfcnpj, $telefone, $celular, $email) {
        include_once '../Model/clienteDAO.php';
        $clienteDao = new clienteDAO();
        $mensagem = $clienteDao->editarClienteDao($codCliente, $nomeCliente, $cpfcnpj, $telefone, $celular, $email);
        return $mensagem;
    }
    
    public function excluiCliente($codCliente) {
        include_once '../Model/clienteDAO.php';
        $clienteDao = new clienteDAO();
        $mensagem = $clienteDao->excluiClienteDao($codCliente);
        return $mensagem;
    }
    
    public function proximoCodCliente(){
        include_once '../Model/clienteDAO.php';
        $clienteDao = new clienteDAO();
        $mensagem = $clienteDao->proximoCodClienteDao();
        return $mensagem;
    }
}