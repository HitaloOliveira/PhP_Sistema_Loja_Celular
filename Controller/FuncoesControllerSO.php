<?php
class FuncoesControllerSO {
    
    public function inserirSO($Serv_codServico, $OS_codOS ) {
        include_once '../Model/SODAO.php';
        $soDao = new SODAO();
        $mensagem = $soDao->inserirSODAO($Serv_codServico, $OS_codOS);
        return $mensagem;
    }
    
    public function pesquisaSO() {
        include_once '../Model/SODAO.php';
        $soDao = new SODAO();
        $linhaNova = $soDao->pesquisaSODao();
        return $linhaNova;
    }
    
  
    public function excluiSO($Serv_codServico, $OS_codOS) {
        include_once '../Model/SODAO.php';
        $soDao = new SODAO();
        $mensagem = $soDao->excluiSODao($Serv_codServico, $OS_codOS);
        return $mensagem;
    }
   
}