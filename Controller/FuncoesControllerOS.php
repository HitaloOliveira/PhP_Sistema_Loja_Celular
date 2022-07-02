<?php
class FuncoesControllerOS {
    
    public function inserirOS($codOS, $dataOS, $horaOS, $horaEntrega, $dtEntrega, $formaPagamento,$fk_Cliente, $fk_Usuario) {
        include_once '../Model/OSDAO.php';
        $osDao = new OSDAO();
        $mensagem = $osDao->inserirOSDAO($codOS, $dataOS, $horaOS, $horaEntrega, $dtEntrega, $formaPagamento, $fk_Cliente, $fk_Usuario );
        return $mensagem;
    }
    
    public function pesquisaOS() {
        include_once '../Model/OSDAO.php';
        $osDao = new OSDAO();
        $linhaNova = $osDao->pesquisaOSDao();
        return $linhaNova;
    }
    
    public function pesquisaOSPorPeriodo($dtInicio, $dtFim){
        include_once '../Model/OSDAO.php';
        $osDao = new OSDAO();
        $linhaNova = $osDao->pesquisaOSPorPeriodoDao($dtInicio, $dtFim);
        return $linhaNova;
    }
    public function pesquisaOSGeral(){
        include_once '../Model/OSDAO.php';
        $osDao = new OSDAO();
        $linhaNova = $osDao->pesquisaOSGeralDao();
        return $linhaNova;
    }
    
    public function pesquisaOSAtivo() {
        include_once '../Model/OSDAO.php';
        $osDao = new OSDAO();
        $linhaNova = $osDao->pesquisaOSDaoAtivo();
        return $linhaNova;
    }
    
  
    public function excluiOS($codOS, $descEstorno, $valorOs, $formaPgto, $fkCliente) {
        include_once '../Model/OSDAO.php';
        $osDao = new OSDAO();
        $mensagem = $osDao->excluiOSDao($codOS, $descEstorno, $valorOs, $formaPgto, $fkCliente);
        return $mensagem;
    }
    
    public function proximoCodOS(){
        include_once '../Model/OSDAO.php';
        $osDao = new OSDAO();
        $mensagem = $osDao->proximoCodigoOSDao();
        return $mensagem;
    }
}