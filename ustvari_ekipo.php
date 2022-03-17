<?php
require_once 'povezava.php';
require 'glava.php';
if(!isset($_SESSION['prijavljen']) || $_SESSION['prijavljen'] == false){
header("Location:prijava.php");		
}
if(empty($_POST['ime_ekipe'])){
$preverjanje = 1;
echo '<div>';
echo '<p>Ne moremo pridobiti imena ekipe!</p>';
echo '</div>';
header("Location: registracija_ekipe.php?error1_ekipa");			
}
$ime_ekipe = $_POST['ime_ekipe'];
$id_voditelja = $_SESSION['id_u'];
$dolzina_ime = strlen($ime_ekipe);
$preverjanje = 0;
$sql = "SELECT * FROM uporabniki WHERE (id = '$u_id');";
$rezultat = mysqli_query($link, $sql);
while($row = mysqli_fetch_array($rezultat)){
$st_ekipe = $row['stevilo_ustvarjenih_ekip'];
}
if($st_ekipe != 0){
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Že ste ustvarili eno ekipo!</p>';
	echo '</div>';
	header("Location: registracija_ekipe.php?error2_ekipa");			
}
if (!isset($_POST['ime_ekipe'])){
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Niste vtipkali imena ekipe!</p>';
	echo '</div>';
	header("Location: registracija_ekipe.php?error3_ekipa");			
}
if ($dolzina_ime < 3) 
{
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Ime ekipe je prekratko!</p>';
	echo '</div>';
	header("Location: registracija_ekipe.php?error4_ekipa");			
}
if ($dolzina_ime > 25) 
{
	$preverjanje = 1;
	echo '<div>';
	echo '<p>Ime ekipe je predolgo!</p>';
	echo '</div>';
	header("Location: registracija_ekipe.php?error5_ekipa");			
}
if($preverjanje == 0){
$sql_st_ekip = "UPDATE uporabniki SET stevilo_ustvarjenih_ekip = '1' WHERE (id = '$id_voditelja');";
mysqli_query($link, $sql_st_ekip) or die(mysqli_error($link));
$sql_ustvari = "INSERT INTO ekipe (ime_ekipe,voditelj_ekipe) VALUES('$ime_ekipe','$id_voditelja');";
mysqli_query($link, $sql_ustvari) or die(mysqli_error($link));
echo '<div class="sporocilo">';
echo '<p>Uspešno ste ustvarili ekipo '.$ime_ekipe.'!</p>';
header("Location: registracija_ekipe.php?success_ekipa");			
echo '</div>';
}
require_once 'noga.php';
?>