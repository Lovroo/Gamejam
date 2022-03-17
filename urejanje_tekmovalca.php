<?php
require_once 'povezava.php';
include_once 'seja.php';
require_once 'glava.php';
if(isset($_SESSION['prijavljen']) && $_SESSION['prijavljen'] == true)
{
$urejanje_id = $_GET['id'];
$sql_podatki = "SELECT Ime,Priimek,email,svoj_pc,razred_id FROM tekmovalci WHERE (id = $urejanje_id);";
$rezultat = mysqli_query($link, $sql_podatki);
while($row = mysqli_fetch_array($rezultat)){
$ime = $row['Ime'];
$priimek = $row['Priimek'];
$email = $row['email'];
$svojpc = $row['svoj_pc'];
$razredid = $row['razred_id'];
}
?>
	<style>
		.table{
			margin-left: auto;
			margin-right: auto;
			width: 70%;
			vertical-align: middle;
			margin-top: 100px;
			margin-bottom: 100px;
		}
		
		.btngreen{
			color: #fff;
			background-color: #1ea78d;
			padding: 10px;
			width: 30%;
			border: none;
			border-radius: 6px;
		}

		.btngreen:hover{
			background-color:#1A9C77;
		}

	</style>
<form action="menjava_tekmovalec_info.php" method="POST" onSubmit="return confirm('Ali ste prepričani, da hočete spremini podatke tekmovalca?');">
	<table class = "table table-hover">
		<input type="hidden" value="<?php echo "$urejanje_id"; ?>" name="t_id" id="t_id"/>
			<tr>
				<th colspan="2">
					Podatki tekmovalca
				</th>
			</tr>
			<tr>
				<td class = "center">
					Email 
				</td>
				<td>
					<input type="email" class = "form-control" name="email" placeholder="Email" id="email" value="<?php echo "$email"; ?>">
				</td>
			</tr>
			<tr>
				<td class = "center">
					Ime
				</td>
				<td>
					<input type="text"  class = "form-control" name="ime" placeholder="Ime" id="ime" value="<?php echo "$ime"; ?>">
				</td>
			</tr>
			<tr>
				<td class = "center">
					Priimek
				</td>
				<td>
					<input type="text" class = "form-control"  name="priimek" placeholder="Priimek" id="priimek" value="<?php echo "$priimek"; ?>">
				</td>
			</tr>
			<tr>
				<td class = "center">
					<label class="screen-reader-only" for="choice">Svoj računalnik?</label>
				</td>
				<td>
				<select class = "form-control"  id = "svoj_pc" name = "svoj_pc">
					<option value = "0">Ne</option>
					<option value = "1">Da</option>
				</select>
				</td>
			</tr>
			<tr>
				<td class = "center">
					<label for="razred">Razred</label>
				</td>
					<?php 
					$sql = "SELECT ime_razreda FROM razredi WHERE (id = '$razredid');";
					$rez = mysqli_query($link, $sql);
					$razred1 = mysqli_fetch_array($rez);
					$razred = $razred1[0];
					?>
				<td>
					<select id="razred" class = "form-control"  name="razred">
						<option value="<?php echo "$razred"; ?>" selected hidden><?php echo "$razred"; ?></option>
						<?php
						$sql = "SELECT ime_razreda FROM razredi";
							$rezultat = mysqli_query($link, $sql);
							while($data = mysqli_fetch_array($rezultat)){
							echo "<option value='". $data['ime_razreda'] ."'>" .$data['ime_razreda'] ."</option>"; 
							} 
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;"><input type="submit" value="Spremeni podatke" class="btngreen">
				</td>
			</tr>
	</table>
</form>
<?php
}
else{
header("Refresh:0 url=prijava.php");	
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php require_once 'noga.php'; ?>