<?php
include('dbconnect.php');
if(!empty($_POST['submit'])){
    $name = $_POST['stu_name'];
    $address = $_POST['address'];
    

    require("fpdf/fpdf.php");
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","B","16");
    $pdf->Cell(0,10, "welcome {$name} ",1,0,'C');
    $pdf->Output();
}
?>