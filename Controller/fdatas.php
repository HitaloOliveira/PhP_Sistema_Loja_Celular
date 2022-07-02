<?php
class fdatas {

//FORMATA A DATA QUE VEM DO MYSQL
    public function vemdata($qqdata) {
        $tempdata = substr($qqdata, 8, 2) . '/' .
                substr($qqdata, 5, 2) . '/' .
                substr($qqdata, 0, 4);
        return($tempdata);
    }

//FORMATA A DATA PARA O MYSQL
    public function vaidata($qqdata) {
        $tempdata = substr($qqdata, 4, 4) . '/' .
                substr($qqdata, 2, 2) . '/' .
                substr($qqdata, 0, 2);
        return($tempdata);
    }

//FORMATA A DATA PARA O MYSQL
    public function vaidata2($qqdata) {
        $tempdata = substr($qqdata, 6, 4) . '/' .
                substr($qqdata, 3, 2) . '/' .
                substr($qqdata, 0, 2);
        return($tempdata);
    }

//FORMATA A DATA PARA O MYSQL
    public function vaidata3($qqdata) {
        $tempdata = substr($qqdata, 0, 4) . '-' .
                substr($qqdata, 5, 2) . '-' .
                substr($qqdata, 8, 2);
        return($tempdata);
    }

// RETIRA AS '/' DA DATA QUE VEM DO BANCO
    public function semBarras($qqdata) {
        $tempdata = substr($qqdata, 0, 4) .
                substr($qqdata, 5, 2) .
                substr($qqdata, 8, 2);
        return($tempdata);
    }

// Apenas o Ano e Mês para cálculo dos agendamentos realizados
    public function anoMes($qqdata) {
        $tempdata = substr($qqdata, 0, 4) . '/' .
                substr($qqdata, 5, 2);
        return($tempdata);
    }

    public function mesAno($qqdata) {
        $tempdata = substr($qqdata, 5, 2) . '/' .
                substr($qqdata, 0, 4);
        return($tempdata);
    }

    public function dia($qqdata) {
        $tempdata = substr($qqdata, 8, 2);
        return($tempdata);
    }

    public function mes($qqdata) {
        $tempdata = substr($qqdata, 5, 2);
        return($tempdata);
    }

    public function ano($qqdata) {
        $tempdata = substr($qqdata, 0, 4);
        return($tempdata);
    }

    public function hora($qqdata) {
        $tempdata = substr($qqdata, 0, 2);
        return($tempdata);
    }

    public function hora2($qqdata) { /* pega somente a hora do datetime */
        $tempdata = substr($qqdata, 11, 2) . 'h' .
                substr($qqdata, 14, 2) . 'min';
        return($tempdata);
    }

    public function hora3($qqdata) { /* pega somente a hora do datetime */
        $tempdata = substr($qqdata, 11, 2);
        return($tempdata);
    }

    public function horaMin($qqdata) {
        $tempdata = substr($qqdata, 0, 2) . 'h' .
                substr($qqdata, 3, 2) . 'min';
        return($tempdata);
    }

    public function horaMin2($qqdata) {
        $tempdata = substr($qqdata, 0, 2) . ':' .
                substr($qqdata, 3, 2);
        return($tempdata);
    }

}

?>

