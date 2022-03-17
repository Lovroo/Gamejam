<?php
require_once 'povezava.php';
require 'glava.php';
$u_email = $_POST['email'];
$u_geslo = $_POST['geslo'];
$u_preverjanje_geslo = $_POST['geslo_preverjanje'];
$u_ime = $_POST['ime'];
$u_priimek = $_POST['priimek'];
$dolzina = strlen($u_geslo);
$dolzina_uime = strlen($u_ime);
$dolzina_upriimek = strlen($u_priimek);
$u_svoj_pc = $_POST['svoj_pc'];
$u_razred = $_POST['razred'];
$razred_sql = "SELECT id FROM razredi WHERE (ime_razreda = '$u_razred')";
$razred_res = mysqli_query($link ,$razred_sql);
$row = mysqli_fetch_row($razred_res);
$razred_id = $row[0];
$preverjanje = 0;
$sql_email = "SELECT * FROM uporabniki WHERE (email = '$u_email');";
$result_email = mysqli_query($link, $sql_email);
$st_email = mysqli_num_rows($result_email);

if (!isset($_POST['email'], $_POST['geslo'], $_POST['ime'], $_POST['priimek'],$_POST['svoj_pc'],$_POST['razred'])) 
{
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Nismo mogli pridobiti vaših podatkov. Poskusite še enkrat!</p>';
	echo '</div>';
	header("Location: registracija.php?error1_Register");
}
if (empty($_POST['email'] || $_POST['geslo'] || $_POST['ime'] || $_POST['priimek'] || $_POST['svoj_pc'] ||	 $_POST['razred'])) 
{
	$preverjanje = 1;
	echo '<div>';
	echo '<p >Niste izpolnili vseh polij. Poskusite še enkrat!</p>';
	echo '</div>';
	header("Location: registracija.php?error2_Register");
}
if ($dolzina < 8) 
{
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Geslo mora biti dolgo vsaj 8 znakov!</p>';
	echo '</div>';
	header("Location: registracija.php?error3_Register");
}
if ($dolzina_uime > 20) 
{
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Ime ne sme biti daljše od 20 znakov!</p>';
	echo '</div>';
	header("Location: registracija.php?error4_Register");
}
if ($dolzina_upriimek > 40) 
{
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Priimek ne sme biti daljše od 40 znakov!</p>';
	echo '</div>';
	header("Location: registracija.php?error5_Register");
}
if($u_geslo != $u_preverjanje_geslo)
{
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Gesla se morata ujemati</p>';
	echo '</div>';
	header("Location: registracija.php?error6_Register");
}
if ($st_email != 0) {
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Email je že v uporabi</p>';
	echo '</div>';
	header("Location: registracija.php?error7_Register");
}
if(!preg_match('/^\p{L}+$/ui', $u_ime)){
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Vaše ime vsebuje nedovoljene znake!</p>';
	echo '</div>';
	header("Location: registracija.php?error8_Register");
}
if(!preg_match('/^\p{L}+$/ui', $u_priimek)){
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Vaše priimek vsebuje nedovoljene znake!</p>';
	echo '</div>';
	header("Location: registracija.php?error9_Register");
}
if (!filter_var($u_email, FILTER_VALIDATE_EMAIL)) {
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Vaš email ni veljaven!</p>';
	echo '</div>';
	header("Location: registracija.php?error10_Register");
}
if ($preverjanje == 0) {
	$hashed_password = password_hash($u_geslo, PASSWORD_DEFAULT);
	$sqlRegistracija = "INSERT INTO uporabniki (email,geslo,ime,priimek,svoj_pc,razred_id) VALUES('$u_email','$hashed_password','$u_ime','$u_priimek','$u_svoj_pc','$razred_id');";
	mysqli_query($link, $sqlRegistracija);
	echo '<div>';
	echo '<p>Uspešno ste registrirali račun. Prosimo da se prijavite!</p>';
	echo '</div>';

	header("Location: prijava.php?success_Register");
}
require_once 'noga.php';
?>
<script>
const targetDiv = document.getElementById("navbar-links");
 if (targetDiv.style.display == "block") {
    targetDiv.style.display = "none";
 }
</script>