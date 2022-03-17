<?php
require_once 'povezava.php';
require 'glava.php';
if(isset($_SESSION['prijavljen']) && $_SESSION['prijavljen'] == true)
{
$uploadCheck = 0;
if(!isset($_POST["submit_game"])) {
	$uploadCheck = 1;
	echo '<div>';
	echo '<p>Upload ni uspel. Poskusite še enkrat!</p>';
	echo '</div>';
}
else{
$ekipa_id = $_POST['team_id'];
$tarca_dir = "Upload/";
$tarca_file = $tarca_dir . basename($_FILES["zip_file"]["name"]);
$uploadCheck = 0;
$ime_file = substr_replace(basename($_FILES["zip_file"]["name"]),"", -4); 
$velikost = filesize($_FILES["zip_file"]["tmp_name"]);
$tip_datoteke = strtolower(pathinfo($tarca_file,PATHINFO_EXTENSION));
if($velikost > 50000000000000)
{
$uploadCheck = 1;
echo '<div>';
echo '<p>Upload ni uspel. Vaša zip datoteka je prevelika!</p>';
echo '</div>';
header("Location: registracija_ekipe.php?error2_upload");
}
if($velikost == 0)
{
$uploadCheck = 1;
echo '<div>';
echo '<p>Upload ni uspel. Poskušate oddati prazno datoteko!</p>';
echo '</div>';
header("Location: registracija_ekipe.php?error3_upload");
}
if($tip_datoteke != "zip"){
$uploadCheck = 1;
echo '<div>';
echo '<p>Upload ni uspel. Morate uploadati zip datoteko z vašo igro!</p>';
echo '</div>';
header("Location: registracija_ekipe.php?error4_upload");
}
if($uploadCheck == 0){
$SQL_upload = "INSERT INTO igre (ime,upload_path,ekipa_id) VALUES('$ime_file','$tarca_file','$ekipa_id');";
mysqli_query($link, $SQL_upload) or die(mysqli_error($link));
$SQL_st_uploadov = "UPDATE ekipe SET stevilo_uploadov = 1 WHERE(id = '$ekipa_id');";
mysqli_query($link, $SQL_st_uploadov) or die(mysqli_error($link));
move_uploaded_file($_FILES["zip_file"]["tmp_name"], $tarca_file);	
echo '<div>';
echo '<p>Upload je uspel! Ob 13:00 izvete rezultate.</p>';
echo '</div>';
header("Location: registracija_ekipe.php?success_upload");
}
}
}
?>