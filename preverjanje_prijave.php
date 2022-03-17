<?php
require_once 'povezava.php';
include_once 'seja.php';
require_once 'glava.php';
?>
<div style="height:500px;">
<?php
if(!isset($_POST['email'], $_POST['geslo'])){
	echo '<div>';
	echo '<p >Niste vpisali podatkov. Poskusite še enkrat!</p>';
	echo '</div>';
	header("Location: prijava.php?error3_Login");
}
else{
$email = mysqli_real_escape_string($link, $_POST["email"]);  
$geslo = mysqli_real_escape_string($link, $_POST["geslo"]);  
$query = "SELECT * FROM uporabniki WHERE email = '$email'";
$result = mysqli_query($link, $query);  
if(mysqli_num_rows($result) > 0) 
	{
while($row = mysqli_fetch_array($result))  
		{  
			if(password_verify($geslo, $row['geslo']))  
			{			

			$_SESSION['prijavljen'] = true;
			$_SESSION['id_u'] = $row['id'];
			$_SESSION['emailu'] = $row['email'];
			$_SESSION['u_rang'] = $row['u_rang']; 
			echo '<div class="sporocilo">';
			echo '<p>Uspešno ste prijavljeni z emailom '.$_SESSION['emailu'].' </p>';
			echo '</div>';
			header("Location: index.php?success_Login");
			}
			else
			{
			echo '<div class="sporocilo">';
			echo '<p>Niste vpisali pravilno geslo ali email!</p>';
			header("Location: prijava.php?error1_Login");
			echo '</div>';
			}
		}
	}
	else{
		echo '<div class="sporocilo">';
		echo '<p>Email še ni v uporabi. Poskusite še enkrat vpisati podatke ali pa se registrirajte.</p>';
		header("Location: prijava.php?error2_Login");
		echo '</div>';
	}
}
?>
<script>
const targetDiv = document.getElementById("navbar-links");
 if (targetDiv.style.display == "block") {
    targetDiv.style.display = "none";
 }
</script>
</div>
</div>
<?php require_once 'noga.php'; ?>