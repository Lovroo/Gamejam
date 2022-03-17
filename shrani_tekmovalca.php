<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php
require_once 'povezava.php';
require 'glava.php';

$u_ime = $_POST['ime_tekmovalca'];
$u_priimek = $_POST['priimek_tekmovalca'];
$dolzina_uime = strlen($u_ime);
$dolzina_upriimek = strlen($u_priimek);
$u_svoj_pc = $_POST['svoj_pc_tekmovalca'];
$u_razred_ime = $_POST['razred'];
$sql_razred = "SELECT id FROM razredi WHERE (ime_razreda = '$u_razred_ime');";
$raz_rezultat = mysqli_query($link, $sql_razred);
$row = mysqli_fetch_array($raz_rezultat);
$u_razred = $row[0];
$u_email = $_POST['email_tekmovalca'];
$preverjanje = 0;
$u_ekipa = $_POST['ekipa_id'];
$u_id = $_SESSION['id_u'];
if(isset($_SESSION['prijavljen']) && $_SESSION['prijavljen'] == true)
{
if (!isset($_POST['email_tekmovalca'], $_POST['ime_tekmovalca'], $_POST['priimek_tekmovalca'], $_POST['svoj_pc_tekmovalca'],$_POST['razred'])) 
{
	$preverjanje = 1;
	echo '<div>';
	echo '</p>Nismo mogli pridobiti vaših podatkov. Poskusite še enkrat!</p>';
	echo '</div>';
	header("Location: registracija_ekipe.php?error1_tekmovalec");
}
if (empty($_POST['email_tekmovalca'] || $_POST['ime_tekmovalca'] || $_POST['priimek_tekmovalca'] || $_POST['svoj_pc_tekmovalca'] || $_POST['razred'])) 
{
	$preverjanje = 1;
	echo '<div>';
	echo '<p >Niste izpolnili vseh polij. Poskusite še enkrat!</p>';
	echo '</div>';
	header("Location: registracija_ekipe.php?error2_tekmovalec");
}
if ($dolzina_uime > 20) 
{
	$preverjanje = 1;
	echo '<div>';
	echo '<p> Ime tekmovalca ne sme biti daljše od 20 znakov! </p>';
	echo '</div>';
	header("Location: registracija_ekipe.php?error3_tekmovalec");
}
if ($dolzina_upriimek > 40) 
{
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Priimek tekmovalca ne sme biti daljše od 40 znakov!</p>';
	echo '</div>';
	header("Location: registracija_ekipe.php?error4_tekmovalec");
}
	$sql1 = "SELECT * FROM tekmovalci WHERE (email = '$u_email');";
	$result1 = mysqli_query($link, $sql1);
	$st = mysqli_num_rows($result1);
	$sql_email = "SELECT * FROM uporabniki WHERE (email = '$u_email');";
	$result_email = mysqli_query($link, $sql_email);
	$st_email = mysqli_num_rows($result_email);
if ($st == 1 || $st_email == 1) {
	echo '<div>';
	echo '<p>Email tekmovalca je že v uporabi</p>';
	echo '</div>';
	$preverjanje = 1;
	header("Location: registracija_ekipe.php?error5_tekmovalec");
}
if(!preg_match('/^\p{L}+$/ui', $u_ime)){
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Ime tekmovalca vsebuje nedovoljene znake!</p>';
	echo '</div>';
	header("Location: registracija_ekipe.php?error6_tekmovalec");
}
if(!preg_match('/^\p{L}+$/ui', $u_priimek)){
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Priimek tekmovalca vsebuje nedovoljene znake!</p>';
	echo '</div>';
	header("Location: registracija_ekipe.php?error7_tekmovalec");
}
if (!filter_var($u_email, FILTER_VALIDATE_EMAIL)) {
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Email tekmovalca ni veljaven!</p>';
	echo '</div>';
	header("Location: registracija_ekipe.php?error8_tekmovalec");
}
if ($preverjanje == 0) {
	$sqlRegistracija = "INSERT INTO tekmovalci (Ime, Priimek, email, svoj_pc, razred_id, ekipa_id) VALUES('$u_ime','$u_priimek','$u_email','$u_svoj_pc','$u_razred','$u_ekipa');";
	mysqli_query($link, $sqlRegistracija);

	//echo "<script> alert('Uspešno ste registrirali tekmovalca. Preusmerjam nazaj na urejanje ekipe!'); window.location.href='registracija_ekipe.php'; </script>";
	Header( 'Location: registracija_ekipe.php?success_tekmovalec' );
}
}
?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>