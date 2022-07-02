<?php
include_once 'Cliente.php';
class clienteDAO {
    public function inserirClienteDAO($codCliente, $nomeCliente, $cpfcnpj, $telefone, $celular, $email ) {
        $cliente = new Cliente();
        $cliente->setCodCliente($codCliente);
        $cliente->setNomeCliente($nomeCliente);
        $cliente->setCpfcnpj($cpfcnpj);
        $cliente->setTelefone($telefone);
        $cliente->setCelular($celular);
        $cliente->setEmail($email);
        include_once '../Model/ConectaBd.php';
        $conectaBd = new ConectaBd();
        $mensagem = "<p class='msgResp bg-success text-center'>Dados inseridos com sucesso.</p>";
        if($conectaBd->_construct() == true) {
            $sql = "insert into cliente values ('".$cliente->getCodCliente()."', '".$cliente->getNomeCliente()."', '".$cliente->getCpfcnpj()."', '".$cliente->getTelefone()."','".$cliente->getCelular()."','".$cliente->getEmail()."')";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            //$linha = mysqli_fetch_array($query, MYSQLI_ASSOC);
        }else{
            $mensagem = "<p class='msgResp bg-warning text-center'>Problemas na conexão com o banco de dados.</p>";
        }
        $conectaBd->_destruct();
        return $mensagem;
    }
    
    public function pesquisaClienteDao() {
        include_once 'ConectaBd.php';
        $conectaBd = new ConectaBd();
        $linhaNova = array();
        if($conectaBd->_construct() === true) {
            $sql = "select * from cliente";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            while($linha = mysqli_fetch_array($query)) {
                array_push($linhaNova, $linha);
            }
            $conectaBd->_destruct();
        }
        return $linhaNova;
    }
    
    
    public function editarClienteDao($codCliente, $nomeCliente, $cpfcnpj, $telefone, $celular, $email) {
        $cliente = new Cliente();
        $cliente->setCodCliente($codCliente);
        $cliente->setNomeCliente($nomeCliente);
        $cliente->setCpfcnpj($cpfcnpj);
        $cliente->setTelefone($telefone);
        $cliente->setCelular($celular);
        $cliente->setEmail($email);
        include_once '../Model/ConectaBd.php';
        $conectaBd = new ConectaBd();
        $mensagem = "<p class='msgResp bg-success text-center'>Dados alterados com sucesso.</p>";
        if($conectaBd->_construct() === true) {
            $sql = "update cliente set nomeCliente = '".$cliente->getNomeCliente()."', cpfcnpj = '".$cliente->getCpfcnpj()."', telefone = '".$cliente->getTelefone()."', celular = '".$cliente->getCelular()."', email = '".$cliente->getEmail()."' where codCliente = '".$cliente->getCodCliente()."'";
            mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            //$linha = mysqli_fetch_array($query, MYSQLI_ASSOC);
        }else{
            $mensagem = "<p class='msgResp bg-warning text-center'>Problemas na conexão com o banco de dados.</p>";
        }
        $conectaBd->_destruct();
        return $mensagem;
    }
    
    public function excluiClienteDao($codCliente) {
        $cliente = new Cliente();
        $cliente->setCodCliente($codCliente);
        include_once 'ConectaBd.php';
        $conectaBd = new ConectaBd();
        $mensagem = "<p class='msgResp bg-success text-center'>Dados excluídos com sucesso.</p>";
        if($conectaBd->_construct() === true) {
            $sql = "delete from cliente where codCliente = '".$cliente->getCodCliente()."'";
            mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            //$linha = mysqli_fetch_array($query, MYSQLI_ASSOC);
        }else{
            $mensagem = "<p class='msgResp bg-warning text-center'>Problemas na conexão com o banco de dados.</p>";
        }
        $conectaBd->_destruct();
        return $mensagem;
    }
    
    public function proximoCodClienteDao(){
        include_once 'ConectaBd.php';
        $conectaBd = new ConectaBd();
        $codigo = 0;
        if($conectaBd->_construct() === true) {
            $sql = "select codCliente from cliente order by codCliente asc";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            $linha = mysqli_fetch_array($query, MYSQLI_ASSOC);
            if($linha){
                $n = 1;
                do{
                    if($n < $linha['codCliente']){
                        $codigo = $n;
                        break;
                    }else{
                        $codigo = $n + 1;
                    }
                    $n++;
                }while($linha = mysqli_fetch_array($query, MYSQLI_ASSOC));
            }else{
                $codigo = 1;
            }
        }
        $conectaBd->_destruct();
        return $codigo;
    }
    
}
