<?php
class FuncoesControllerServico {
    
    public function inserirServico($codServico, $statusServico, $descricaoServico, $vlrServico ) {
        include_once '../Model/ServicoDAO.php';
        $vlrServico = str_replace(',', '.', $vlrServico);
        $servicoDao = new ServicoDAO();
        $mensagem = $servicoDao->inserirServicoDAO($codServico, $statusServico, $descricaoServico, $vlrServico);
        return $mensagem;
    }
    
    
    public function pesquisaServico() {
        include_once '../Model/ServicoDAO.php';
         $servicoDao = new ServicoDAO();
        $linhaNova = $servicoDao->pesquisaServicoDao();
        return $linhaNova;
    }
    public function pesquisaServicoAtivo() {
        include_once '../Model/ServicoDAO.php';
         $servicoDao = new ServicoDAO();
        $linhaNova = $servicoDao->pesquisaServicoAtivoDao();
        return $linhaNova;
    }
    
    public function editarServico($codServico, $statusServico, $descricaoServico, $vlrServico) {
        include_once '../Model/ServicoDAO.php';
        $servicoDao = new ServicoDAO();
        $mensagem = $servicoDao->editarServicoDao($codServico, $statusServico, $descricaoServico, $vlrServico);
        return $mensagem;
    }
    
  
    public function excluiServico($codServico) {
        include_once '../Model/ServicoDAO.php';
        $servicoDao = new ServicoDAO();
        $mensagem = $servicoDao->excluiServicoDao($codServico);
        return $mensagem;
    }
    
    public function proximoCodServico(){
        include_once '../Model/ServicoDAO.php';
        $servicoDao = new ServicoDAO();
        $mensagem = $servicoDao->proximoCodServicoDao();
        return $mensagem;
    }
}