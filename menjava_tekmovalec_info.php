<?php
require_once 'povezava.php';
require 'glava.php';

$u_ime = $_POST['ime'];
$u_priimek = $_POST['priimek'];
$dolzina_uime = strlen($u_ime);
$dolzina_upriimek = strlen($u_priimek);
$u_svoj_pc = $_POST['svoj_pc'];
$u_razred = $_POST['razred'];
$preverjanje = 0;
$t_id = $_POST['t_id'];
$email = $_POST['email'];
if(isset($_SESSION['prijavljen']) && $_SESSION['prijavljen'] == true)
{
	if (!isset($_POST['ime'], $_POST['priimek'], $_POST['svoj_pc'], $_POST['razred'],$_POST['email'])) 
	{
		$preverjanje = 1;
		echo '<div>';
		echo '<p>Nismo mogli pridobiti vaših podatkov. Poskusite še enkrat!</p>';
		echo '</div>';
		header("Location: registracija_ekipe.php?error1_tekmovalec_edit");
	}
	if (empty($_POST['ime'] || $_POST['priimek'] || $_POST['svoj_pc'] || $_POST['razred'] || $_POST['email'])) 
	{
		$preverjanje = 1;
		echo '<div>';
		echo '<p >Niste izpolnili vseh polij. Poskusite še enkrat!</p>';
		echo '</div>';
		header("Location: registracija_ekipe.php?error2_tekmovalec_edit");
	}
	if ($dolzina_uime > 20) 
	{
		$preverjanje = 1;
		echo '<div>';
		echo '<p>Ime ne sme biti daljše od 20 znakov!</p>';
		echo '</div>';
		header("Location: registracija_ekipe.php?error3_tekmovalec_edit");
	}
	if ($dolzina_upriimek > 40) 
	{
		$preverjanje = 1;
		echo '<div>';
		echo '<p>Priimek ne sme biti daljše od 40 znakov!</p>';
		echo '</div>';
		header("Location: registracija_ekipe.php?error4_tekmovalec_edit");
	}
	if(!preg_match('/^\p{L}+$/ui',$u_ime)){
		$preverjanje = 1;
		echo '<div>';
		echo '<p>Vaše ime vsebuje nedovoljene znake!</p>';
		echo '</div>';
		header("Location: registracija_ekipe.php?error5_tekmovalec_edit");
	}
	if(!preg_match('/^\p{L}+$/ui',$u_priimek)){
		$preverjanje = 1;
		echo '<div>';
		echo '<p>Vaše priimek vsebuje nedovoljene znake!</p>';
		echo '</div>';
		header("Location: registracija_ekipe.php?error6_tekmovalec_edit");
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$preverjanje = 1;
		echo '<div>';
		echo '<p>Email tekmovalca ni veljaven!</p>';
		echo '</div>';
		header("Location: registracija_ekipe.php?error7_tekmovalec_edit");
	}
	if ($preverjanje == 0) {
	$razred_sql = "SELECT id FROM razredi WHERE (ime_razreda = '$u_razred')";
	$razred_res = mysqli_query($link ,$razred_sql);
	$row = mysqli_fetch_row($razred_res);
	$razred_id = $row[0];
	$sql = "UPDATE tekmovalci SET Ime = '$u_ime', Priimek = '$u_priimek', svoj_pc = '$u_svoj_pc', email = '$email', razred_id = '$razred_id' WHERE (id = '$t_id');";
	$result = mysqli_query($link, $sql) or die(mysqli_error($link));
	echo "$sql";
	header("Location: registracija_ekipe.php?success_tekmovalec_edit");
}
}
else{
header("Location:prijava.php");	
}
?>