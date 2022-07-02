<?php
include_once 'SO.php';

class SODAO {
    public function inserirSODAO( $Serv_codServico, $OS_codOS) {
        $so = new SO();
        $so->setServ_codServico($Serv_codServico);
        $so->setOS_codOS($OS_codOS);

        include_once '../Model/ConectaBd.php';
        $conectaBd = new ConectaBd();
        $mensagem = "<p class='msgResp bg-success text-center'>Dados inseridos com sucesso.</p>";
        if($conectaBd->_construct() == true) {
            $sql = "insert into servico_os values ('".$so->getServ_codServico()."', '".$so->getOS_codOS()."')";
            mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            //$linha = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $sql = "select vlrServico from servico where codServico = '".$so->getServ_codServico()."'";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            $linha = mysqli_fetch_array($query);
            $ValorServico = $linha['vlrServico'];
            $sql = "update os set vlrTotalServico = (vlrTotalServico + $ValorServico) where codOS = '".$so->getOS_codOS()."'";
            mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
        }else{
            $mensagem = "<p class='msgResp bg-warning text-center'>Problemas na conexão com o banco de dados.</p>";
        }
        $conectaBd->_destruct();
        return $mensagem;
    }
    
    public function pesquisaSODao() {
        include_once '../Model/ConectaBd.php';
        $conectaBd = new ConectaBd();
        $linhaNova = array();
        if($conectaBd->_construct() === true) {
            $sql = "SELECT * FROM os INNER JOIN servico_os ON codOS = OS_codOS INNER JOIN servico ON codServico = Serv_codServico";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            while($linha = mysqli_fetch_array($query)) {
                array_push($linhaNova, $linha);
            }
            $conectaBd->_destruct();
        }
        return $linhaNova;
    }
    
    
     public function excluiSODao($Serv_codServico, $OS_codOS) {

        include_once 'ConectaBd.php';
        $conectaBd = new ConectaBd();
        $mensagem = "<p class='msgResp bg-success text-center'>Dados excluídos com sucesso.</p>";
        if ($conectaBd->_construct() === true) {
            $sql = "delete from servico_os where Serv_codServico = '". $Serv_codServico . "' and OS_codOS = '". $OS_codOS ."'";
            mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));

        } else {
            $mensagem = "<p class='msgResp bg-warning text-center'>Problemas na conexão com o banco de dados.</p>";
        }
        $conectaBd->_destruct();
        return $mensagem;
    }

    

}