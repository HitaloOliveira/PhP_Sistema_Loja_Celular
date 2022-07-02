<?php
include_once 'Servico.php';
class ServicoDAO {
    public function inserirServicoDAO($codServico, $statusServico, $descricaoServico, $vlrServico ) {
        $servico = new Servico();
        $servico->setCodServico($codServico);
        $servico->setStatusServico($statusServico);
        $servico->setDescricaoServico($descricaoServico);
        $servico->setVlrServico($vlrServico);
        include_once '../Model/ConectaBd.php';
        $conectaBd = new ConectaBd();
        $mensagem = "<p class='msgResp bg-success text-center'>Dados inseridos com sucesso.</p>";
        if($conectaBd->_construct() == true) {
            $sql = "insert into servico values ('".$servico->getCodServico()."', '".$servico->getStatusServico()."', '".$servico->getDescricaoServico()."', '".$servico->getVlrServico()."')";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            //$linha = mysqli_fetch_array($query, MYSQLI_ASSOC);
        }else{
            $mensagem = "<p class='msgResp bg-warning text-center'>Problemas na conexão com o banco de dados.</p>";
        }
        $conectaBd->_destruct();
        return $mensagem;
    }
    
    public function pesquisaServicoDao() {
        include_once 'ConectaBd.php';
        $conectaBd = new ConectaBd();
        $linhaNova = array();
        if($conectaBd->_construct() === true) {
            $sql = "select * from servico";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            while($linha = mysqli_fetch_array($query)) {
                array_push($linhaNova, $linha);
            }
            $conectaBd->_destruct();
        }
        return $linhaNova;
    }
    
    public function pesquisaServicoAtivoDao() {
        include_once 'ConectaBd.php';
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
    
    
    public function editarServicoDao($codServico, $statusServico, $descricaoServico, $vlrServico) {
        $servico = new Servico();
        $servico->setCodServico($codServico);
        $servico->setStatusServico($statusServico);
        $servico->setDescricaoServico($descricaoServico);
        $servico->setVlrServico($vlrServico);
        include_once '../Model/ConectaBd.php';
        $conectaBd = new ConectaBd();
        $mensagem = "<p class='msgResp bg-success text-center'>Dados alterados com sucesso.</p>";
        if($conectaBd->_construct() === true) {
            $sql = "update servico set statusServico = '".$servico->getStatusServico()."', descricaoServico = '".$servico->getDescricaoServico()."', vlrServico = '".$servico->getVlrServico()."' where codServico = '".$servico->getCodServico()."'";
            mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            //$linha = mysqli_fetch_array($query, MYSQLI_ASSOC);
        }else{
            $mensagem = "<p class='msgResp bg-warning text-center'>Problemas na conexão com o banco de dados.</p>";
        }
        $conectaBd->_destruct();
        return $mensagem;
    }
    
    public function excluiServicoDao($codServico) {
        $servico = new Servico();
        $servico->setCodServico($codServico);
        include_once 'ConectaBd.php';
        $conectaBd = new ConectaBd();
        $mensagem = "<p class='msgResp bg-success text-center'>Dados excluídos com sucesso.</p>";
        if($conectaBd->_construct() === true) {
            $sql = "delete from servico where codServico = '".$servico->getCodServico()."'";
            mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            //$linha = mysqli_fetch_array($query, MYSQLI_ASSOC);
        }else{
            $mensagem = "<p class='msgResp bg-warning text-center'>Problemas na conexão com o banco de dados.</p>";
        }
        $conectaBd->_destruct();
        return $mensagem;
    }
    
    public function proximoCodServicoDao(){
        include_once 'ConectaBd.php';
        $conectaBd = new ConectaBd();
        $codigo = 0;
        if($conectaBd->_construct() === true) {
            $sql = "select codServico from servico order by codServico asc";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            $linha = mysqli_fetch_array($query, MYSQLI_ASSOC);
            if($linha){
                $n = 1;
                do{
                    if($n < $linha['codServico']){
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
