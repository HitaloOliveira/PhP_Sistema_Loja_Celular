<?php

include_once '../pdf/fpdf.php';
include_once '../Controller/FuncoesControllerServico.php';

$fcs = new FuncoesControllerServico();
$linhasSer = $fcs->pesquisaServico();

$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, utf8_decode('Relatório da OS'), 0, 0, "C");
$pdf->Ln(15);

$pdf->SetFont("Arial", "I", 10);
$pdf->Cell(45, 7, "Codigo", 1, 0, "C");
$pdf->Cell(50, 7, utf8_decode("Status"), 1, 0, "C");
$pdf->Cell(50, 7, utf8_decode("Descricao"), 1, 0, "C");
$pdf->Cell(45, 7, "Valor", 1, 0, "C");
$pdf->Ln();

foreach ($linhasSer as $linhaSer) {
    if ($linhaSer['statusServico'] === '1'){
        $serSta = "Ativo";
    }else{
        $serSta = "Inativo";     
    }
    $pdf->Cell(45, 7, $linhaSer["codServico"], 1, 0, "C");
    $pdf->Cell(50, 7, utf8_decode($serSta), 1, 0, "C");
    $pdf->Cell(50, 7, utf8_decode($linhaSer["descricaoServico"]), 1, 0, "C");
    $pdf->Cell(45, 7, $linhaSer["vlrServico"], 1, 0, "C");
    $pdf->Ln();
}

$pdf->Output();
?>

