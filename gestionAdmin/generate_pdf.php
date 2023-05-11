








<?php
//include connection file
include_once("connection.php");
include_once('../../../../libs/fpdf.php');
 
class PDF extends FPDF
{


}

 
$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('idA'=>'IDA', 'nomUser'=> 'nomUser', 'prenomUser'=> 'prenomUser','addresse'=> 'addresse','mail'=> 'mail','status'=> 'status',);
 
$result = mysqli_query($connString, "SELECT idA, nomUser, prenomUser, addresse, mail, status FROM admin") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM admin");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}
$pdf->Output();
?>