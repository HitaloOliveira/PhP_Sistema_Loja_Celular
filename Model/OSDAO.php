<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once 'OS.php';
include_once 'Usuario.php';
include_once 'Cliente.php';
class OSDAO {
    public function inserirOSDAO( $codOS, $dataOS, $horaOS, $horaEntrega, $dtEntrega, $formaPagamento,$fk_Cliente, $fk_Usuario) {
        $os = new OS();
        $cl = new Cliente();
        $us = new Usuario();
        $os->setCodOS($codOS);
        $os->setDataOS($dataOS);
        $os->setHoraOS($horaOS);
        $os->setHoraEntrega($horaEntrega);
        $os->setDtEntrega($dtEntrega);
        $os->setFormaPagamento($formaPagamento);
        $cl->setCodCliente($fk_Cliente);
        $us->setLogin($fk_Usuario);
        //$mensagem = $cl->getCodCliente() . " - ". $us->getLogin();
        
        include_once '../Model/ConectaBd.php';
        $conectaBd = new ConectaBd();
        $mensagem = "<p class='msgResp bg-success text-center'>Dados inseridos com sucesso.</p>";
        if($conectaBd->_construct() == true) {
            $sql = "insert into os values ('".$os->getCodOS()."', '".$os->getDataOS()."', '".$os->getHoraOS()."', '".$os->getHoraEntrega()."', '".$os->getDtEntrega()."', '0', '".$os->getFormaPagamento()."', 0, '', '".$cl->getCodCliente()."', '".$us->getLogin()."')";
            mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            //$linha = mysqli_fetch_array($query, MYSQLI_ASSOC);
        }else{
            $mensagem = "<p class='msgResp bg-warning text-center'>Problemas na conexão com o banco de dados.</p>";
        }
        $conectaBd->_destruct();
        return $mensagem;
    }
    
    public function pesquisaOSDao() {
        include_once '../Model/ConectaBd.php';
        $conectaBd = new ConectaBd();
        $linhaNova = array();
        if($conectaBd->_construct() === true) {
            $sql = "select * from os";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            while($linha = mysqli_fetch_array($query)) {
                array_push($linhaNova, $linha);
            }
            $conectaBd->_destruct();
        }
        return $linhaNova;
    }
    
    public function pesquisaOSDaoAtivo() {
        include_once '../Model/ConectaBd.php';
        $conectaBd = new ConectaBd();
        $linhaNova = array();
        if($conectaBd->_construct() === true) {
            $sql = "SELECT * FROM os INNER JOIN servico_os ON codOS = OS_codOS INNER JOIN servico ON codServico = Serv_codServico group by codOS";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            while($linha = mysqli_fetch_array($query)) {
                array_push($linhaNova, $linha);
            }
            $conectaBd->_destruct();
        }
        return $linhaNova;
    }
    
    public function pesquisaOSPorPeriodoDao($dtInicio, $dtFim) {
        include_once 'ConectaBd.php';
        $conectaBd = new ConectaBd();
        $linhaNova = array();
        if($conectaBd->_construct() === true) {
            $sql = "select * from cliente inner join os on fk_Cliente = codCliente "
                    . "inner join servico_os on Os_codOs = codOs inner join servico "
                    . "on Serv_codServico = codServico where dataOs between '$dtInicio'"
                    . " and '$dtFim'";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            while($linha = mysqli_fetch_array($query)) {
                array_push($linhaNova, $linha);
            }
            $conectaBd->_destruct();
        }
        return $linhaNova;
    }
    
    public function pesquisaOSGeralDao() {
        include_once 'ConectaBd.php';
        $conectaBd = new ConectaBd();
        $linhaNova = array();
        if($conectaBd->_construct() === true) {
            $sql = "select * from cliente inner join os on fk_Cliente = codCliente "
                    . "inner join servico_os on Os_codOs = codOs inner join servico "
                    . "on Serv_codServico = codServico";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            while($linha = mysqli_fetch_array($query)) {
                array_push($linhaNova, $linha);
            }
            $conectaBd->_destruct();
        }
        return $linhaNova;
    }
    
    /* public function excluiOSDao($codOS, $dataOS, $horaOS, $qtdServico, $horaEntrega, $dtEntrega, $vlrTotalServico, $formaPagamento,$fk_Cliente, $fk_Usuario) {

        include_once 'ConectaBd.php';
        $conectaBd = new ConectaBd();
        $mensagem = "<p class='msgResp bg-success text-center'>Dados excluídos com sucesso.</p>";
        if ($conectaBd->_construct() === true) {
            $sql = "delete from os where fk_Cliente = '". $fk_Cliente . "' and fk_Usuario = '". $fk_Usuario . "' and codOS = '". $codOS . "' and dataOS = '" . $dataOS . "' and horaOS = '". $horaOS . "' and qtdServico = '". $qtdServico . "' and horaEntrega = '". $horaEntrega . "' and dtEntrega = '". $dtEntrega . "' and vlrTotalServico = '". $vlrTotalServico. "' and formaPagamento = '". $formaPagamento ."'";
            mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));

        } else {
            $mensagem = "<p class='msgResp bg-warning text-center'>Problemas na conexão com o banco de dados.</p>";
        }
        $conectaBd->_destruct();
        return $mensagem;
    }
  
     */
    
     public function excluiOSDao($codOS, $descEstorno, $valorOs, $formaPgto, $fkCliente) {
        include_once 'ConectaBd.php';
        $conectaBd = new ConectaBd();
        $mensagem = "<p class='msgResp bg-success text-center'>Dados excluídos com sucesso.</p>";
        if($conectaBd->_construct() === true) {
            $fkUsuario = $_SESSION['login'];
            //echo "<script>alert('Usuário: $fkUsuario, Os: $codOS, Motivo: $descEstorno, Valor: $valorOs, FormaPgto: $formaPgto, Cliente: $fkCliente');</script>";
       
            $sql = "insert into os values (null, current_date(), current_time(), current_time(), current_date(), -'$valorOs', '$formaPgto', null, null, '$fkCliente','$fkUsuario')";
            mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            $sql = "select codOS from os where dataOS = current_date() and horaOS = current_time() limit 1";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            $linha = mysqli_fetch_array($query);
            $codEstorno = $linha['codOS'];
            $sql = "update os set codEstornoServico = '$codEstorno', descEstorno = '$descEstorno' where codOS = '$codOS'";
            mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            //$linha = mysqli_fetch_array($query, MYSQLI_ASSOC);
        }else{
            $mensagem = "<p class='msgResp bg-warning text-center'>Problemas na conexão com o banco de dados.</p>";
        }
        $conectaBd->_destruct();
        return $mensagem;
    }

    
    public function proximoCodigoOSDao(){
        include_once '../Model/ConectaBd.php';
        $conectaBd = new ConectaBd();
        $codigo = 0;
        if($conectaBd->_construct() === true) {
            $sql = "select codOS from OS order by codOS asc";
            $query = mysqli_query($conectaBd->db, $sql) or die(mysqli_error($conectaBd->db));
            $linha = mysqli_fetch_array($query, MYSQLI_ASSOC);
            if($linha){
                $n = 1;
                do{
                    if($n < $linha['codOS']){
                        $usuario = $n;
                        break;
                    }else{
                        $usuario = $n + 1;
                    }
                    $n++;
                }while($linha = mysqli_fetch_array($query, MYSQLI_ASSOC));
            }else{
                $usuario = 1;
            }
        }
        $conectaBd->_destruct();
        return $usuario;
    }
}


