<?php


class SO {
     private $Serv_codServico;
    private $OS_codOS;
    
    function getServ_codServico() {
        return $this->Serv_codServico;
    }

    function getOS_codOS() {
        return $this->OS_codOS;
    }

    function setServ_codServico($Serv_codServico) {
        $this->Serv_codServico = $Serv_codServico;
    }

    function setOS_codOS($OS_codOS) {
        $this->OS_codOS = $OS_codOS;
    }


}
