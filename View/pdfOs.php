<?php

include_once '../pdf/fpdf.php';
include_once '../Controller/FuncoesControllerOS.php';
include_once '../Controller/fdatas.php';
$fdatas = new fdatas();
$fco = new FuncoesControllerOS();
$linhasOS = $fco->pesquisaOS();

$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, utf8_decode('Relatório da OS'), 0, 0, "C");
$pdf->Ln(15);

$pdf->SetFont("Arial", "I", 10);
$pdf->Cell(30, 7, "Data", 1, 0, "C");
$pdf->Cell(30, 7, "Hora", 1, 0, "C");
$pdf->Cell(30, 7, "Data Entrega", 1, 0, "C");
$pdf->Cell(30, 7, "Hora Entrega", 1, 0, "C");
$pdf->Cell(30, 7, utf8_decode("Forma Pagamento"), 1, 0, "C");
$pdf->Cell(40, 7, utf8_decode("Motivo"), 1, 0, "C");
$pdf->Ln();  
 
foreach ($linhasOS as $linhaOs){
   
   if ($linhaOs ['formaPagamento'] ==='0'){
       $formaPgto = "Cartão de Crédito";
   } elseif ($linhaOs ['formaPagamento']==='1'){
        $formaPgto = "Dinheiro";
   }else{
      $formaPgto = "Cartão de Crédito";
   }
   
    $pdf->Cell(30, 7,$fdatas->vemdata($linhaOs["dataOS"]), 1, 0, "C");
    $pdf->Cell(30, 7, $linhaOs["horaOS"], 1, 0, "C");
    $pdf->Cell(30, 7,$fdatas->vemdata($linhaOs["dtEntrega"]), 1, 0, "C");
    $pdf->Cell(30, 7, $linhaOs["horaEntrega"], 1, 0, "C");
    $pdf->Cell(30, 7, utf8_decode($formaPgto), 1, 0, "C");
    $pdf->Cell(40, 7, utf8_decode($linhaOs["descEstorno"]), 1, 0, "C");
    $pdf->Ln();   
}

$pdf->Output();
?>
