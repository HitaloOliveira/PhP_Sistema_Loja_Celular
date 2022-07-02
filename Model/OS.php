

<?php

class OS {
    
    private $codOS;
    private $dataOS;
    private $horaOS;
    private $qtdServico;
    private $horaEntrega;
    private $dtEntrega;
    private $vlrTotalServico;
    private $formaPagamento;
    private $codEstorno;
    private $descEstorno;
    private $fk_Cliente;
    private $fk_Usuario;
    
    function getCodOS() {
        return $this->codOS;
    }

    function getDataOS() {
        return $this->dataOS;
    }

    function getHoraOS() {
        return $this->horaOS;
    }

    function getQtdServico() {
        return $this->qtdServico;
    }

    function getHoraEntrega() {
        return $this->horaEntrega;
    }

    function getDtEntrega() {
        return $this->dtEntrega;
    }

    function getVlrTotalServico() {
        return $this->vlrTotalServico;
    }

    function getFormaPagamento() {
        return $this->formaPagamento;
    }

    function getCodEstorno() {
        return $this->codEstorno;
    }

    function getDescEstorno() {
        return $this->descEstorno;
    }

    function setCodOS($codOS) {
        $this->codOS = $codOS;
    }

    function setDataOS($dataOS) {
        $this->dataOS = $dataOS;
    }

    function setHoraOS($horaOS) {
        $this->horaOS = $horaOS;
    }

    function setQtdServico($qtdServico) {
        $this->qtdServico = $qtdServico;
    }

    function setHoraEntrega($horaEntrega) {
        $this->horaEntrega = $horaEntrega;
    }

    function setDtEntrega($dtEntrega) {
        $this->dtEntrega = $dtEntrega;
    }

    function setVlrTotalServico($vlrTotalServico) {
        $this->vlrTotalServico = $vlrTotalServico;
    }

    function setFormaPagamento($formaPagamento) {
        $this->formaPagamento = $formaPagamento;
    }

    function setCodEstorno($codEstorno) {
        $this->codEstorno = $codEstorno;
    }

    function setDescEstorno($descEstorno) {
        $this->descEstorno = $descEstorno;
    }       
    
    function getFk_Cliente() {
        return $this->fk_Cliente;
    }

    function getFk_Usuario() {
        return $this->fk_Usuario;
    }

    function setFk_Cliente($fk_Cliente) {
        $this->fk_Cliente = $fk_Cliente;
    }

    function setFk_Usuario($fk_Usuario) {
        $this->fk_Usuario = $fk_Usuario;
    }


    
}







