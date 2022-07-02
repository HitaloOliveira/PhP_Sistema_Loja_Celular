<?php

class Cliente {

    private $codCliente;
    private $nomeCliente;
    private $cpfcnpj;
    private $telefone;
    private $celular;
    private $email;

    function setCodCliente($codCliente) {
        $this->codCliente = $codCliente;
    }

    function getCodCliente() {
        return $this->codCliente;
    }

    function setNomeCliente($nomeCliente) {
        $this->nomeCliente = $nomeCliente;
    }

    function getNomeCliente() {
        return $this->nomeCliente;
    }

    function setCpfcnpj($cpfcnpj) {
        $this->cpfcnpj = $cpfcnpj;
    }

    function getCpfcnpj() {
        return $this->cpfcnpj;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function getCelular() {
        return $this->celular;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function getEmail() {
        return $this->email;
    }

}
