<?php

include_once '../pdf/fpdf.php';
include_once '../Controller/FuncoesControllerCliente.php';

$fcc = new FuncoesControllerCliente();
$linhasCl = $fcc->pesquisaCliente();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, utf8_decode('Relatório de Clientes'), 0, 0, "C");
$pdf->Ln(15);

$pdf->SetFont("Arial", "I", 10);
$pdf->Cell(20, 7, utf8_decode("Código"), 1, 0, "C");
$pdf->Cell(40, 7, utf8_decode("Nome"), 1, 0, "C");
$pdf->Cell(30, 7, "CPF", 1, 0, "C");
$pdf->Cell(30, 7, "Telefone", 1, 0, "C");
$pdf->Cell(30, 7, "Celular", 1, 0, "C");
$pdf->Cell(40, 7, utf8_decode("Email"), 1, 0, "C");
$pdf->Ln();

foreach ($linhasCl as $linhaCl) {
    $pdf->Cell(20, 7, $linhaCl["codCliente"], 1, 0, "C");
    $pdf->Cell(40, 7, utf8_decode($linhaCl["nomeCliente"]), 1, 0, "C");
    $pdf->Cell(30, 7, $linhaCl["cpfcnpj"], 1, 0, "C");
    $pdf->Cell(30, 7, $linhaCl["telefone"], 1, 0, "C");
    $pdf->Cell(30, 7, $linhaCl["celular"], 1, 0, "C");
    $pdf->Cell(40, 7, utf8_decode($linhaCl["email"]), 1, 0, "C");
    $pdf->Ln();
}

$pdf->Output();
?>

