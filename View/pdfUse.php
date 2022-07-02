<?php
include_once '../pdf/fpdf.php';
include_once '../Controller/FuncoesControllerUsuario.php';

$fcu = new FuncoesControllerUsuario();
$linhasUs = $fcu->pesquisaUsuario();

$pdf = new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, utf8_decode('Relatório de Usuarios'), 0, 0, "C");
$pdf->Ln(15);

$pdf->SetFont("Arial", "I", 10);
$pdf->Cell(60, 7,utf8_decode("Login"), 1, 0, "C");
$pdf->Cell(60, 7, utf8_decode("Perfil"), 1, 0, "C");
$pdf->Cell(70, 7, utf8_decode("Descricao"), 1, 0, "C");
$pdf->Ln();

foreach ($linhasUs as $linhaUs){
    if ($linhaUs['perfil'] === '2'){
        $usS = "Administrador";
    }else{
        $usS = "Usuário";     
    }
    $pdf->Cell(60, 7,utf8_decode($linhaUs["login"]), 1, 0, "C");
    $pdf->Cell(60, 7, utf8_decode($usS), 1, 0, "C");
    $pdf->Cell(70, 7, utf8_decode($linhaUs["descUsuario"]), 1, 0, "C");
    $pdf->Ln();   
}

$pdf->Output();
?>

