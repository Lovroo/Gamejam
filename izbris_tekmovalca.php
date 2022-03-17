<?php
include_once 'seja.php';
require_once 'povezava.php';

if(isset($_SESSION['prijavljen']) && $_SESSION['prijavljen'] == true)
{
$izbris_id = $_GET['id'];

$sql = "DELETE FROM tekmovalci WHERE (id = $izbris_id);";
mysqli_query($link, $sql) or die(mysqli_error($link));
header("Refresh:0 url=registracija_ekipe.php");
}
else{
header("Refresh:0 url=prijava.php");	
}
?>