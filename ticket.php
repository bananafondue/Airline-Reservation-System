<?php 
include 'config.php';
include 'fpdf.php';

session_start();

if (!isset($_SESSION['U_Email_ID'])) {
    header("Location: index.php");
}

$flightno = $_SESSION['flightno'];
$P_Email = $_SESSION['P_Email'];

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('https://cdn-icons-png.flaticon.com/512/187/187820.png',10,10,50);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'User Airplane Ticket',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
$display_heading = array('P_ID' => 'ID','P_Firstname'=>'First Name', 'P_Lastname'=> 'Last Name', 'P_Email'=> 'Email','P_Phonenumber'=> 'Number','P_Age'=> 'Age', 'P_Gender'=> 'Gender','P_Address'=> 'Address',);
 
$result = mysqli_query($conn, "SELECT * FROM passenger where `P_Email` = '$P_Email'");
$header = mysqli_query($conn, "SHOW columns FROM passenger WHERE field != 'flightno'");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',16);
foreach($header as $heading) {
$pdf->Cell(35,10,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->SetFont('Arial','',10);
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(35,10,$column,1);
}
$pdf->Output();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="signup.css" />
    <link rel="preconnect" href="https://fonts.goog leapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Signika:wght@500&display=swap"
      rel="stylesheet"
    />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airplane Booking System</title>
</head>
<body>

</body>
</html>