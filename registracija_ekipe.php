<?php
require_once 'povezava.php';
include_once 'seja.php';
require_once 'glava.php';
?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registracija ekipe</title>
	<style>
		#demo{
			text-align: center;
			border: solid 1px;
			width: 40%;
			background-color: #1ea78d;
			color: #fff;
			border-radius: 6px;
			margin-top: 20px;
			margin-bottom: 20px;
			margin-left: auto;
			margin-right: auto;
			vertical-align: middle;
		}

		#naslov1{
			margin-top: 50px;
		}

		.table{
			margin-left: auto;
			margin-right: auto;
			width: 70%;
			vertical-align: middle;
		}

		
		input[type="text"] {
             display: block;
             margin : 0 auto;
        }

		input[type="file"] {
             display: block;
             margin : 0 auto;
			 width: 40%;
			 color: #1ea78d;
			 border-radius: 3px;
        }

		.btngreen{
			color: #fff;
			background-color: #1ea78d;
			padding: 10px;
			width: 70%;
			border: none;
			border-radius: 6px;
		}

		.btngreen:hover{
			background-color:#1A9C77;
		}

		input[type="submit"] {
             display: block;
             margin : 0 auto;
			 width: 20%;
        }


		h1{
			text-align: center;
			margin-bottom: 10px;
			margin-top: 10px;
		}

		h2{
			text-align: center;
			margin-top: 10px;
			color: red;
		}

		#toggle{
			width: 40%;
			margin-left: 30%;
			margin-right: 30%;
		}

	.obvestilo{
		text-align: center;
			width: 40%;
			color: red;
			font-size: 20px;
			border-radius: 6px;
			margin-top: 20px;
			margin-bottom: 20px;
			margin-left: auto;
			margin-right: auto;
			vertical-align: middle;
	}

	.form-label{
		width: 40%;
		margin-left: 30%;
		margin-right: 30%;
	}

	.alert{
		width: 70%;
		width: 40%;
		margin-left: 30%;
		margin-right: 30%;
	}

	#ime_ekipe{
	}

	/* iPads (landscape) ----------- */
@media only screen 
and (min-device-width : 768px) 
and (max-device-width : 1024px) 
and (orientation : landscape) {
/* Styles */
}

/* iPads (portrait) ----------- */
@media only screen 
and (min-device-width : 768px) 
and (max-device-width : 1024px) 
and (orientation : portrait) {
/* Styles */
}

/* Desktops and laptops ----------- */
@media only screen 
and (min-width : 1224px) {
/* Styles */
}

/* Large screens ----------- */
@media only screen 
and (min-width : 1824px) {
/* Styles */
}

/* iPhone 4 ----------- */
@media
only screen and (-webkit-min-device-pixel-ratio : 1.5),
only screen and (min-device-pixel-ratio : 1.5) {
/* Styles */
}
All of the areas that say /* Styles */ are where you would place the separate CSS components for the different devices you are supporting.

**PLEASE NOTE: this is a pretty convoluted media query sheet. I would normally delete the landscape stuff, and the iPhone media query takes care of most smartphones, so there's normally no need to have two separate ones for that. Here is what I usually use:

/* Smartphones (portrait and landscape) ----------- */
@media only screen 
and (min-device-width : 320px) 
and (max-device-width : 480px) {
/* Styles */
}

/* iPads (portrait and landscape) ----------- */
@media only screen 
and (min-device-width : 768px) 
and (max-device-width : 1024px) {
/* Styles */
}

/* Desktops and laptops ----------- */
@media only screen 
and (min-width : 1224px) {
/* Styles */
}

/* iPhone 4 ----------- */
@media
only screen and (-webkit-min-device-pixel-ratio : 1.5),
only screen and (min-device-pixel-ratio : 1.5) {
/* Styles */
}
	</style>
</head>
<?php
                if (isset($_GET['success_tekmovalec'])) {
                ?>
                    <div class="alert alert-success" id="msg_error" role="alert" style="margin-top:60px;">Uspešno ste registrirali tekmovalca. </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['success_ekipa'])) {
                ?>
                    <div class="alert alert-success" id="msg_error" role="alert" style="margin-top:60px;">Uspešno ste ustvarili ekipo!</div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['success_upload'])) {
                ?>
                    <div class="alert alert-success" id="msg_error" role="alert" style="margin-top:60px;">Upload je uspel! Ob 13:00 izvete rezultate.</div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['success_tekmovalec_edit'])) {
                ?>
                    <div class="alert alert-success" id="msg_error" role="alert" style="margin-top:50px;">Uspešno ste spremenili podatke tekmovalca!</div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error1_tekmovalec'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Nismo mogli pridobiti vaših podatkov. Poskusite še enkrat! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error2_tekmovalec'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Niste izpolnili vseh polij. Poskusite še enkrat! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error3_tekmovalec'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Ime tekmovalca ne sme biti daljše od 20 znakov! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error4_tekmovalec'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Priimek tekmovalca ne sme biti daljše od 40 znakov! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error5_tekmovalec'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Email tekmovalca je že v uporabi </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error6_tekmovalec'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Ime tekmovalca vsebuje nedovoljene znake! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error7_tekmovalec'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Priimek tekmovalca vsebuje nedovoljene znake! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error8_tekmovalec'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Email tekmovalca ni veljaven! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error1_ekipa'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Ne moremo pridobiti imena ekipe! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error2_ekipa'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Že ste ustvarili eno ekipo! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error3_ekipa'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Niste vtipkali imena ekipe! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error4_ekipa'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Ime ekipe je prekratko!</div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error5_ekipa'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Ime ekipe je predolgo! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error1_upload'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Upload ni uspel. Poskusite še enkrat!</div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error2_upload'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Upload ni uspel. Vaša zip datoteka je prevelika! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error3_upload'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Upload ni uspel. Poskušate oddati prazno datoteko! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error4_upload'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Upload ni uspel. Morate uploadati zip datoteko z vašo igro! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error1_tekmovalec_edit'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Nismo mogli pridobiti vaših podatkov. Poskusite še enkrat! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error2_tekmovalec_edit'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Niste izpolnili vseh polij. Poskusite še enkrat! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error3_tekmovalec_edit'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Ime ne sme biti daljše od 20 znakov! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error4_tekmovalec_edit'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Priimek ne sme biti daljše od 40 znakov! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error5_tekmovalec_edit'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Vaše ime vsebuje nedovoljene znake! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error6_tekmovalec_edit'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Vaše priimek vsebuje nedovoljene znake!</div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
                if (isset($_GET['error7_tekmovalec_edit'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Email tekmovalca ni veljaven!</div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<?php
$st_uploadov = 0;
if(!isset($_SESSION['prijavljen']) || $_SESSION['prijavljen'] == false){
header("Location:prijava.php");		
}
$vidnost_uploada = " display:none";
$u_id = $_SESSION['id_u'];
$sql = "SELECT * FROM uporabniki WHERE (id = '$u_id');";
$rezultat = mysqli_query($link, $sql);
while($row = mysqli_fetch_array($rezultat)){
$st_ekip = $row['stevilo_ustvarjenih_ekip'];
$emailu = $row['email'];
$imeu = $row['ime'];
$priiu = $row['priimek'];
$svojpc = $row['svoj_pc'];
$razredid = $row['razred_id'];
}
if($svojpc == 1)
{
	$svojpc = 'Da';
}
else
{
	$svojpc = 'Ne';
}
$sql = "SELECT ime_razreda FROM razredi WHERE (id = '$razredid');";
$rez = mysqli_query($link, $sql);
$razred1 = mysqli_fetch_array($rez);
$razred = $razred1[0];
?>
<div id="registracija_ekipe" style="padding-top:50px">
<?php
$sql_st_tekmovalcev = "SELECT ( SELECT COUNT(*) FROM uporabniki ) AS count1, ( SELECT COUNT(*) FROM tekmovalci ) AS count2";
$rezultat_st = mysqli_query($link, $sql_st_tekmovalcev);
$row_t = mysqli_fetch_array($rezultat_st);
$st_tek = ($row_t[0] + $row_t[1]) - 1;	
if($st_ekip == 0)
{
echo '<h1>Registrirajte svojo ekipo</h1>';	
echo '<button id="toggle" type="button" class="btngreen">Ustvari ekipo!</button>';
$vidnost = "display:none";
$id_ekipe = "";
}
else
{
echo '<h1 id = "naslov1">Upravljajte vašo ekipo</h1>';
$sql_ime = "SELECT * FROM ekipe WHERE (voditelj_ekipe = '$u_id');";
$rezultat = mysqli_query($link, $sql_ime);
while($row = mysqli_fetch_array($rezultat)){
	$ime_ekipe = $row['ime_ekipe'];
	$id_ekipe = $row['id'];
	$st_uploadov = $row['stevilo_uploadov'];
}
if($st_uploadov == 0 && $st_ekip != 0 && new DateTime() > new DateTime("2022-02-15 10:00:00")){
$vidnost_uploada = " display:block";
}
else{
$vidnost_uploada = " display:none";	
}
$sql_st_admin = "SELECT COUNT(*) from uporabniki WHERE (u_rang = '2')";
$rezultat_admin = mysqli_query($link, $sql_st_admin);
$row_admin = mysqli_fetch_array($rezultat_admin);
$st_admin = $row_admin[0];

$st_tekmovalcev_sql = "SELECT COUNT(Ime) FROM tekmovalci WHERE (ekipa_id = '$id_ekipe');";
$st_query = mysqli_query($link, $st_tekmovalcev_sql);
$st_tekmovalcev_row = mysqli_fetch_array($st_query);
$st_tekmovalcev = $st_tekmovalcev_row[0] + 1;

echo '<h2 class = "obvestilo"> <strong>'.$ime_ekipe.'</strong> Št. Tekmovalcev ('.$st_tekmovalcev.'/4)</h2>';
$vidnost = "display:block";
if($st_tekmovalcev >= 4)
{

$disabled = " disabled";
}
else
{

$disabled =" enabled";
}
}
?>
<?php if($st_tek < 31) : ?>
<form id="ekipa_form" method="POST" style="display:none;" action="ustvari_ekipo.php" onSubmit="return confirm('Ali ste zadovoljni z imenom ekipe?');">
<table class = "table" >
<thead>
<tr><th><input type="text" class="form-control" name="ime_ekipe" placeholder="Najmanj 3 in največ 25 znakov." id="ime_ekipe" required style="width:250px;" aria-label="Default" aria-describedby="inputGroup-sizing-default"></th></tr>
<tr><th><input type="submit" class="btngreen" style="width:250px;" value="Registrirajte ekipo"></th></tr>
</thead>
</table>
</form>
<?php else : ?>
<div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Registracija je zaprta, ker je so zapolnjena vsa mesta! </div>
<?php endif; ?>
<form id="urejanje_ekipe" method="POST" style="<?php echo "$vidnost"?>;" action="registracija_ekipe.php">
<div style="<?php echo "$vidnost_dodajanja" ?>">
<?php
$st_rows = 0;
if ( isset($_GET['p']) && $_GET['p']=="novtekmovalec") {
if($st_rows < 4)
{
$st_rows = $st_rows + 1;
}
else{
	echo "Nemorate dodati več tekmovalcev";
}
}
?>
</form>
<form id="urejanje_tekmovalcev" method="POST" action="shrani_tekmovalca.php">
<table class="table table-hover">
<thead>
<?php
if($st_tekmovalcev < 4){
$izpis_shrani = "Shrani tekmovalca";
}
else{
$izpis_shrani = " ";
}
?>
<tr>
	<th scope = "col">Vrsta tekmovalca</th>
	<th scope = "col">Ime</th>
	<th scope = "col">Priimek</th>
	<th scope = "col">Email</th>
	<th scope = "col">Svoj računalnik?</th>
	<th scope = "col">Razred</th>
	<th scope = "col">Uredi tekmovalca</th>
	<th scope = "col">Izbriši tekmovalca</th>
	<th scope = "col"><?php echo "$izpis_shrani"; ?></th>
</tr>
</thead>
<tbody>
<tr>
	<td>Vodja Ekipe</td>
	<td><?php echo "$imeu";?></td>
	<td><?php echo "$priiu";?></td>
	<td><?php echo "$emailu";?></td>
	<td><?php echo "$svojpc";?></td>
	<td><?php echo "$razred";?></td>
	<td><a href="uporabnik.php"><button type="button" class="btn btn-warning">Uredi</button></a></td>
	<td></td>
	<td></td>
<tr>
<input type="hidden" id="ekipa_id" name="ekipa_id" value="<?php echo $id_ekipe; ?>">
<?php
$sql_vse = "SELECT id,Ime,Priimek,email,svoj_pc,razred_id,ekipa_id FROM tekmovalci WHERE (ekipa_id = '$id_ekipe');";
$rezultat = mysqli_query($link, $sql_vse);
while($row = mysqli_fetch_array($rezultat)){
	$razred_id = $row['razred_id'];
	$sql = "SELECT ime_razreda FROM razredi WHERE (id = $razred_id)";
	$rezultat_razred = mysqli_query($link, $sql);
	$row_razred = mysqli_fetch_array($rezultat_razred);
	$ime_razred = $row_razred[0];
	$pc_tekmovalca = $row['svoj_pc'];
	$Ime = $row['Ime'];
	$Priimek = $row['Priimek'];
	$email = $row['email'];
	if($pc_tekmovalca == 1)
	{
		$pc_tekmovalca = 'Da';
	}
	else
	{
		$pc_tekmovalca = 'Ne';
	}
	echo '<tr>
	  <td>Tekmovalec</td>'
	.'<td>'.$row['Ime'].'</td>'
	.'<td>'.$row['Priimek'].'</td>'
	.'<td>'.$row['email'].'</td>'
	.'<td>'.$pc_tekmovalca.'</td>'
	.'<td>'.$ime_razred.'</td>'
	.'<td><a href="urejanje_tekmovalca.php?id='.$row['id'].'"><button type="button" class="btn btn-warning">Uredi</button></a></td>'
	.'<td><a href="izbris_tekmovalca.php?id='.$row['id'].'"><button type="button" class="btn btn-danger">Izbriši</button></a></td>'
	.'<td> </td>'
	.'</tr>';
}
?>
<?php
if($st_tekmovalcev < 4){
echo '<tr>
	<td scope = "row">
		Tekmovalec
	</td>
	<td>
		<input type="text" class = "form-control" name="ime_tekmovalca" placeholder="Ime tekmovalca" id="ime_tekmovalca" required>
	</td>
	<td>
		<input type="text" class = "form-control" name="priimek_tekmovalca" placeholder="Priimek tekmovalca" id="priimek_tekmovalca" required>
	</td>
	<td>
		<input type="email" class = "form-control" name="email_tekmovalca" placeholder="Email tekmovalca" id="email_tekmovalca" required>
	</td>
	<td>
		<select class="form-select" id = "svoj_pc_tekmovalca" name = "svoj_pc_tekmovalca">
			<option value = "0">Ne</option>
			<option value = "1">Da</option>
		</select>
	</td>
	<td>
		<select id="razred" name="razred" class="form-select" aria-label="Default select example">';
			$sql = "SELECT ime_razreda FROM razredi";
			$rezultat = mysqli_query($link, $sql);
			while($data = mysqli_fetch_array($rezultat)){
			echo "<option value='". $data['ime_razreda'] ."'>" .$data['ime_razreda'] ."</option>"; 
			}
		echo '</select>
	</td>
	<td> </td>
	<td> </td>
	<td> </td>
	</tr>';
}

?>
</tbody>
<tfoot>

<tr><td colspan="9" style="text-align: right;border:0;"><input type="submit"  class="btngreen" value="Shrani tekmovalca" <?php echo $disabled ?>></input></td></tr>
</tfoot>
</table>
</form>
</div>
<div>
<h1>Čas do odprtja oddaje iger!</h1>
<div class="alert alert-primary" id="demo"></div>
</div>
<div id="upload_igre" style="padding-bottom:50px;">
<h1>Tukaj oddajte vašo igro!</h1>
<h2 class = "obvestilo">Pozor! Ime zip datoteke mora biti ime igre. Igro lahko oddate samo enkrat in to verzijo bomo upoštevali.</h2>

<form enctype="multipart/form-data" method="post" action="upload_igre.php" style="<?php echo "$vidnost_uploada"; ?>">
<input type="hidden" name="team_id" value="<?php echo "$id_ekipe"; ?>">
  <div class="form-group" x-data="{ fileName: '' }">
  <label for="formFileSm" name="zip_file" accept="zip/*"  class="form-label">Naložite <b>.zip</b> datoteko vaše igre:</label>
  <input class="form-control form-control-sm" id="formFileSm" type="file" name="zip_file">
</div>
<br />
<input type="submit"class="btngreen"  name="submit_game" value="Upload" class="upload">
</form>
</div>
<?php 
if($st_uploadov == 1){
echo '<div>'
    .'<h2 class = "obvestilo">Naložili ste vašo igro. Prosimo počakajte na rezultate.</h2>'
	.'</div>';
}
else{
echo "";	
}
?>
<script>
var countDownDate = new Date("Feb 15, 2022 10:00:00").getTime();
const upload_div = document.getElementById("upload_igre");
var st_uploadov = <?php Print($st_uploadov); ?>;

var x = setInterval(function() {

  var now = new Date().getTime();
    
  var distance = countDownDate - now;
    
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  if (distance < 0) {
    clearInterval(x);
	document.getElementById("demo").innerHTML = "Oddaja je odprta!";
	if(upload_div.style.display !== "block" && st_uploadov == 0) {
	console.log(st_uploadov);
    upload_div.style.display = "block";
	}else{
    targetDiv.style.display = "none";
  }
  }
}, 1000);
</script>
<script>
const targetDiv = document.getElementById("ekipa_form");
const btn = document.getElementById("toggle");
btn.onclick = function () {
  if (targetDiv.style.display !== "block") {
    targetDiv.style.display = "block";
  } else {
    targetDiv.style.display = "none";
  }
};
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</div>
</div>
<?php require_once 'noga.php'; ?>