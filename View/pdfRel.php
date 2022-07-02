<?php
include_once '../pdf/fpdf.php';
include_once '../Controller/FuncoesControllerOS.php';
include_once '../Controller/fdatas.php';
$fdatas = new fdatas();
$fco = new FuncoesControllerOS();
$linhasRe = $fco->pesquisaOSGeral();

$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, utf8_decode('Relatórios'), 0, 0, "C");
$pdf->Ln(15);

$pdf->SetFont("Arial", "I", 10);
$pdf->Cell(40, 7, utf8_decode("Descrição"), 1, 0, "C");
$pdf->Cell(30, 7, "Data", 1, 0, "C");
$pdf->Cell(30, 7, "Hora", 1, 0, "C");
$pdf->Cell(30, 7, "Data Entrega", 1, 0, "C");
$pdf->Cell(30, 7, "Hora Entrega", 1, 0, "C");
$pdf->Ln();  
 
foreach ($linhasRe as $linhaRe){
    
    $pdf->Cell(40, 7, utf8_decode($linhaRe["descricaoServico"]), 1, 0, "C");
    $pdf->Cell(30, 7,$fdatas->vemdata($linhaRe["dataOS"]), 1, 0, "C");
    $pdf->Cell(30, 7, $linhaRe["horaOS"], 1, 0, "C");
    $pdf->Cell(30, 7,$fdatas->vemdata($linhaRe["dtEntrega"]), 1, 0, "C");
    $pdf->Cell(30, 7, $linhaRe["horaEntrega"], 1, 0, "C");
    $pdf->Ln();   
}

$pdf->Output();
?>

