<?php

class Servico {
    
   private $codServico; 
   private $statusServico;
   private $descricaoServico;
   private $vlrServico;
   
   
   function getCodServico() {
       return $this->codServico;
   }

   function getStatusServico() {
       return $this->statusServico;
   }

   function getDescricaoServico() {
       return $this->descricaoServico;
   }

   function getVlrServico() {
       return $this->vlrServico;
   }

   function setCodServico($codServico) {
       $this->codServico = $codServico;
   }

   function setStatusServico($statusServico) {
       $this->statusServico = $statusServico;
   }

   function setDescricaoServico($descricaoServico) {
       $this->descricaoServico = $descricaoServico;
   }

   function setVlrServico($vlrServico) {
       $this->vlrServico = $vlrServico;
   }


   
}

