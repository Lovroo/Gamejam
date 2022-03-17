<?php
require_once 'povezava.php';
include_once 'seja.php';

if(!isset($_SESSION['prijavljen']) || $_SESSION['prijavljen'] == false){
header("Location:index.php");	
}
if($_SESSION['u_rang'] != '2'){
header("Location:index.php");	
}
if(isset($_POST['id_igre'], $_POST['izgled_igre'], $_POST['funkcionalnost'], $_POST['diskvalifikacija'],$_POST['komentar'])) 
{
$id_igre = $_POST['id_igre'];
$izgled = $_POST['izgled_igre'];
$funkcionalnost = $_POST['funkcionalnost'];
$diskvalifikacija = $_POST['diskvalifikacija'];
$komentar = $_POST['komentar'];
$sql_oceni = "INSERT INTO ocenjevanje (izgled, funkcionalnost, diskvalifikacija, komentarji, igra_id) VALUES('$izgled','$funkcionalnost','$diskvalifikacija','$komentar','$id_igre');";
$result = mysqli_query($link, $sql_oceni) or die(mysqli_error($link));
$sql_ocenjeno = "UPDATE igre SET ocenjeno=1 WHERE (id = '$id_igre');";
$result = mysqli_query($link, $sql_ocenjeno) or die(mysqli_error($link));
header("Location:admin.php");
}
else{
header("Location:admin.php");
}
?>