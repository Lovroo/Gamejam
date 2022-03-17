<?php
require_once 'povezava.php';
include_once 'seja.php';
require_once 'glava.php';
?>	
	<style>

		.text{
			text-align: center;
		}

		#desno{
			margin-left: auto;
			margin-right: auto;
			margin-bottom: 8px;
			width: 40%;
			vertical-align: middle;
		}
		.center{
			text-align: center;
			padding-top: 100px;
			color: red;
			margin-bottom: 20px;
		}

		.center2{
			text-align: center;
			padding-top: 10px;
			color: red;
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
			 width: 40%;
        }
		input[type="submit"] {
             display: block;
             margin : 0 auto;
			 width: 150px;
        }

		td[colspan="6"] {
    		text-align: center;
			color: red;
			vertical-align: middle;
		}

		.rahlocrna{
			font-weight: 500;
		}

		.top{
			vertical-align: top;
		}
		.alert{position:relative;padding:1rem 1rem;margin-bottom:1rem;border:1px solid transparent;border-radius:.25rem}
		.alert-primary{color:#084298;background-color:#cfe2ff;border-color:#b6d4fe}
	</style>
<?php
	if(!isset($_SESSION['prijavljen']) || $_SESSION['prijavljen'] == false){
		header("Location:index.php");	
	}
	if($_SESSION['u_rang'] != '2'){
		header("Location:index.php");		
	}
	?>
	<div id="st_racunalnikov" class="alert alert-primary" style="margin-top:50px;">
		<?php 
			$sql_st_pc = "SELECT COUNT(svoj_pc) FROM tekmovalci WHERE (svoj_pc = '0')";
			$rezultat_pc = mysqli_query($link, $sql_st_pc);
			$row_pc = mysqli_fetch_array($rezultat_pc);
			$st_t_pc = $row_pc[0];	

			$sql_st_pc_u = "SELECT COUNT(svoj_pc) FROM uporabniki WHERE (svoj_pc = '0')";
			$rezultat_pc_u = mysqli_query($link, $sql_st_pc_u);
			$row_u = mysqli_fetch_array($rezultat_pc_u);
			$st_pc_u = $row_u[0];	

			$skupaj = $st_t_pc + $st_pc_u;
		?>
	<p class = "text">Treba je sposoditi <b><?php echo "$skupaj"; ?></b> računalnikov od šole</p>
	</div>
	<button class="btn btn-primary" id = "desno"  onClick="document.getElementById('vse_ekipe').scrollIntoView();">Pregled vseh ekip</button>
	<button class="btn btn-danger" id = "desno"  onClick="document.getElementById('ocenjevanje').scrollIntoView();">Ocenjevanje ekip</button>
	<div id="vse_ekipe">
		<h2 class = "center" >Upravljanje ekip</h2>
		<br />
		<form action="admin.php" method="POST" id="vse_ekipe">
			<input type="text" name="iskanje" placeholder =  "vpisi ime ekipe." />
			<br />
			<input type="submit" id = "isci" class="btn btn-primary" value="Išči ekipo" />
			<br />
	<?php
		$iskanje = "";
		$filters = "";
		if(isset($_POST['iskanje'])){
		$iskanje = $_POST['iskanje'];
		$filters = "WHERE (e.ime_ekipe LIKE '%$iskanje%') OR (i.ime LIKE '%$iskanje%')";
		echo $filters;
		}
	?>
	<?php
		$sql_ekipa = "SELECT i.ime, i.upload_path,e.ime_ekipe,e.st_tekmovalcev,e.stevilo_uploadov,e.id FROM ekipe e LEFT JOIN igre i ON i.ekipa_id= e.id $filters";
		$rezultat = mysqli_query($link, $sql_ekipa);
		while($row = mysqli_fetch_array($rezultat)){
			$download = $row['upload_path'];
			$e_id = $row['id'];
			$st_tekmovalcev_sql = "SELECT COUNT(Ime) FROM tekmovalci t INNER JOIN ekipe e ON t.ekipa_id = e.id WHERE (t.ekipa_id = $e_id);";
			$st_query = mysqli_query($link, $st_tekmovalcev_sql);
			$st_tekmovalcev_row = mysqli_fetch_array($st_query);
			$st_tekmovalcev = $st_tekmovalcev_row[0] + 1;
			echo '<table class="table table-hover" border="1" rules=none>'
			.'<thead>'
				.'<tr>
					<th>
						Ime ekipe
					</th>
					<th>
						Ime igre
					</th>
					<th>
						Število tekmovalcev
					</th>
					<th>
						Število uploadov
					</th>
					<th>
						Prenos igre
					</th>
					<th>

					</th>
				</tr>
				<br />'
			.'</thead>'
				.'<td>'.$row['ime_ekipe'].'</td>'
				.'<td>'.$row['ime'].'</td>'
				.'<td>'.$st_tekmovalcev.'</td>'
				.'<td>'.$row['stevilo_uploadov'].'</td>'
				.'<td><a href='.$download.' download>'.$row['ime'].'</a></td>'
				.'<td></td>'
				.'</tr>'
			.'<tr>
				<td colspan="6">
					<b id = "rdeca">Tekmovalci '.$row['ime_ekipe'].'</b>
				</td>
			 </tr>'
			.'<tr>
			<td>
				<h5 class = "rahlocrna">Vloga tekmovalca</h5>
			</td>
			<td>
				<h5 class = "rahlocrna">Ime tekmovalca</h5>
			</td>
			<td>
				<h5 class = "rahlocrna">Priimek tekmovalca</h5>
			</td>
			<td>
				<h5 class = "rahlocrna">Email tekmovalca</h5>
			</td>
			<td>
				<h5 class = "rahlocrna">Ima tekmovalec pc?</h5>
			</td>
			<td>
				<h5 class = "rahlocrna" >Razred tekmovalca</h5>
			</td>';
			$sql_vodja = "SELECT * FROM uporabniki u INNER JOIN ekipe e on u.id=e.voditelj_ekipe WHERE (e.id='$e_id');";
			$rezultat_vodja = mysqli_query($link, $sql_vodja);
			while($row = mysqli_fetch_array($rezultat_vodja)){
			$razred_id = $row['razred_id'];
			$sql = "SELECT ime_razreda FROM razredi WHERE (id = $razred_id)";
			$rezultat_razred = mysqli_query($link, $sql);
			$row_razred = mysqli_fetch_array($rezultat_razred);
			$ime_razred = $row_razred[0];
			$pc_tekmovalca = $row['svoj_pc'];
			if($pc_tekmovalca == 1)
			{
				$pc_tekmovalca = 'Da';
			}
			else
			{
				$pc_tekmovalca = 'Ne';
			}
			echo '<tr><td>Vodja ekipe</td>'
			.'<td>'.$row['ime'].'</td>'
			.'<td>'.$row['priimek'].'</td>'	
			.'<td>'.$row['email'].'</td>'
			.'<td>'.$pc_tekmovalca.'</td>'
			.'<td>'.$ime_razred.'</td></tr>';
			}
			$sql_tekmovalci= "SELECT t.ime AS ime_tekmovalca,t.priimek AS priimek_tekmovalca, t.email AS email_tekmovalca, t.svoj_pc AS pc_tekmovalca, t.razred_id as razred_tekmovalca 
			FROM tekmovalci t LEFT JOIN ekipe e ON t.ekipa_id=e.id LEFT JOIN  uporabniki u ON u.id=e.voditelj_ekipe WHERE (e.id = '$e_id');";
			$rezultat_tekmovalci = mysqli_query($link, $sql_tekmovalci);
			while($row = mysqli_fetch_array($rezultat_tekmovalci)){
				$razred_id = $row['razred_tekmovalca'];
				$sql = "SELECT ime_razreda FROM razredi WHERE (id = $razred_id)";
				$rezultat_razred = mysqli_query($link, $sql);
				$row_razred = mysqli_fetch_array($rezultat_razred);
				$ime_razred = $row_razred[0];
				$pc_tekmovalca = $row['pc_tekmovalca'];
				if($pc_tekmovalca == 1)
				{
					$pc_tekmovalca = 'Da';
				}
				else
				{
					$pc_tekmovalca = 'Ne';
				}
				echo '<tr><td>Tekmovalec</td>'
				.'<td>'.$row['ime_tekmovalca'].'</td>'
				.'<td>'.$row['priimek_tekmovalca'].'</td>'	
				.'<td>'.$row['email_tekmovalca'].'</td>'
				.'<td>'.$pc_tekmovalca.'</td>'
				.'<td>'.$ime_razred.'</td></tr>';
			}
			echo '</table>';
		}
	?>
	</form>
	</div>
	<div id="ocenjevanje">
	<h1 class = "center2" >Ocenjevanje iger</h1>
	<h2 class = "center2" style = "color: blue;">Razvrstitev po točkah</h2>
	<br />
	<table class = "table table-hover" id="koncne_ocene">
		<thead>
			<tr>
				<th>
					Končno mesto
				</th>
				<th>
					Ime igre
				</th>
				<th>
					Ime ekipe
				</th>
				<th>
					Točke za izgled
				</th>
				<th>
					Točke za funkcionalnost
				</th>
				<th>
					Diskvalifikacija
				</th>
				<th>
					Komentarji sodnikov
				</th>
				<th>
					Skupno število točk
				</th>
			</tr>
		</thead>
	<tbody>
	<?php 
		$sql_ocene = "SELECT i.ime, e.ime_ekipe, o.izgled, o.funkcionalnost, o.diskvalifikacija, o.komentarji,(o.izgled + o.funkcionalnost) AS skupno
		FROM igre i INNER JOIN ekipe e ON e.id=i.ekipa_id INNER JOIN ocenjevanje o ON i.id=o.igra_id WHERE (i.ocenjeno = 1)  
		ORDER BY `skupno`  DESC"; 
		$rezultat_ocene = mysqli_query($link, $sql_ocene);
		$mesto = 1;
		while($row = mysqli_fetch_array($rezultat_ocene)){
		if($row['diskvalifikacija'] == 0){$diskvalifikacija = 'Ne';}else{$diskvalifikacija = 'Da';}
		$skupaj_tock = $row['izgled'] + $row['funkcionalnost'];
		echo '<tr>'
			.'<td>'.$mesto.'. Mesto</td>'
			.'<td>'.$row['ime'].'</td>'
			.'<td>'.$row['ime_ekipe'].'</td>'
			.'<td>'.$row['izgled'].'</td>'
			.'<td>'.$row['funkcionalnost'].'</td>'
			.'<td>'.$diskvalifikacija.'</td>'
			.'<td>'.$row['komentarji'].'</td>'
			.'<td>'.$skupaj_tock.'</td>'
			.'</tr>';
			$mesto++;
		}
	?>
	</tbody>
	</table>
	<?php 
		$sql_igre ="SELECT i.id,i.ime,i.upload_path,e.ime_ekipe FROM igre i INNER JOIN ekipe e ON i.ekipa_id=e.id WHERE (i.ocenjeno = 0);";
		$rezultat_ekipe = mysqli_query($link, $sql_igre);
		while($row = mysqli_fetch_array($rezultat_ekipe)){
		$download = $row['upload_path'];
		echo '<form action="oceni_igro.php" method="POST">'
				.'<table class = "table" border="1" rules=none>
				<br />'
					.'<thead>'
						.'<tr>
							<th class = "top">
								Ime igre
							</th>
							<th class = "top">
								Prenos igre
							</th>
							<th class = "top">
								Ime ekipe
							</th>
							<th class = "top">
								Izgled igre (1-10 točk)
							</th>'
							.'<th class = "top">
								Funkcionalnost igre (1-10 točk)
							</th>
							<th class = "top">
								Diskvalifikacija
							</th>
							<th class = "top">
								Komentarji sodnikov (ni obvezno)
							</th>
							<th class = "top">
								Oceni igro
							</th>
						</tr>'
					.'</thead>'
				.'<tbody>'
					.'<tr>'
						.'<input type="hidden" name="id_igre" value="'.$row['id'].'" />'
						.'<td>'
							.$row['ime'].
						'</td>'
						.'<td>
							<a href='.$download.' download>'.$row['ime'].'</a>
						</td>'
						.'<td>'
							.$row['ime_ekipe'].
						'</td>'
						.'<td>
							<input type="number" id="izgled_igre" name="izgled_igre" min="1" max="10" />
						</td>'
						.'<td>
							<input type="number" id="funkcionalnost" name="funkcionalnost" min="1" max="10" />
						</td>'
						.'<td>
									<select class="form-select" id = "diskvalifikacija" name = "diskvalifikacija">
										<option value = "0">Ne</option>
										<option value = "1">Da</option>
									</select>
						</td>'
						.'<td>
							<input type="text" id="komentar" name="komentar"  />
						</td>'
						.'<td>
							<input type="submit" class = "btn btn-danger" value="Oceni"/>
						</td>'
					.'</tr>'
				.'</tbody>'
				.'</table>'
			.'</form>';
		}

	?>
	</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php require 'noga.php'; ?>