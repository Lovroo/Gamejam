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
$u_id = $_SESSION['id_u'];
if(isset($_SESSION['prijavljen']) && $_SESSION['prijavljen'] == true)
{
	if (!isset($_POST['ime'], $_POST['priimek'], $_POST['svoj_pc'], $_POST['razred'])) 
	{
		$preverjanje = 1;
		echo '<div>';
		echo '<p>Nismo mogli pridobiti vaših podatkov. Poskusite še enkrat!</p>';
		echo '</div>';
		header("Location: uporabnik.php?error1_uporabnik");
	}
	if (empty($_POST['ime'] || $_POST['priimek'] || $_POST['svoj_pc'] || $_POST['razred'])) 
	{
		$preverjanje = 1;
		echo '<div>';
		echo '<p >Niste izpolnili vseh polij. Poskusite še enkrat!</p>';
		echo '</div>';
		header("Location: uporabnik.php?error2_uporabnik");
	}
	if ($dolzina_uime > 20) 
	{
		$preverjanje = 1;
		echo '<div>';
		echo '<p>Ime ne sme biti daljše od 20 znakov!</p>';
		echo '</div>';
		header("Location: uporabnik.php?error3_uporabnik");
	}
	if ($dolzina_upriimek > 40) 
	{
		$preverjanje = 1;
		echo '<div>';
		echo '<p>Priimek ne sme biti daljše od 40 znakov!</p>';
		echo '</div>';
		header("Location: uporabnik.php?error4_uporabnik");
	}
	if(!preg_match('/^\p{L}+$/ui',$u_ime)){
		$preverjanje = 1;
		echo '<div>';
		echo '<p>Vaše ime vsebuje nedovoljene znake!</p>';
		echo '</div>';
		header("Location: uporabnik.php?error5_uporabnik");
	}
	if(!preg_match('/^\p{L}+$/ui',$u_priimek)){
		$preverjanje = 1;
		echo '<div>';
		echo '<p>Vaše priimek vsebuje nedovoljene znake!</p>';
		echo '</div>';
		header("Location: uporabnik.php?error6_uporabnik");
	}
	if ($preverjanje == 0) {
	$razred_sql = "SELECT id FROM razredi WHERE (ime_razreda = '$u_razred')";
	$razred_res = mysqli_query($link ,$razred_sql);
	$row = mysqli_fetch_row($razred_res);
	$razred_id = $row[0];
	$sql = "UPDATE uporabniki SET ime = '$u_ime', priimek = '$u_priimek', svoj_pc = '$u_svoj_pc', razred_id = '$razred_id' WHERE (id = '$u_id');";
	$result = mysqli_query($link, $sql) or die(mysqli_error($link));
	header("Location: uporabnik.php?success_uporabnik");
	}
}
else{
header("Location:prijava.php");	
}