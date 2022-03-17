<?php
include('glava.php');
include('povezava.php');
?>
<style>
.body_prijava {
    --color-primary: #cc0000;
    --color-primary-dark: #f50909;
    --color-secondary: #252c6a;
    --color-error: #cc3333;
    --color-green: #1ea78d;
    --color-success: #4bb544;
    --border-radius: 4px;

    margin: 0;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
	padding-top: 100px;
	padding-bottom: 100px;
}
.container_prijava {
    width: 400px;
    max-width: 400px;
    margin: 1rem;
    padding: 2rem;
    box-shadow: 0 0 40px rgba(0, 0, 0, 0.2);
    border-radius: var(--border-radius);
    background: #ffffff;
}

.container_prijava,
.form__input,
.form__button {
    font: 500 1rem 'Quicksand', sans-serif;
}

.form--hidden {
    display: none;
}

.form > *:first-child {
    margin-top: 0;
}

.form > *:last-child {
    margin-bottom: 0;
}

.form__title {
    margin-bottom: 2rem;
    text-align: center;
}


.form__input-group {
    margin-bottom: 1rem;
}

.form__input {
    display: block;
    width: 100%;
    padding: 0.75rem;
    box-sizing: border-box;
    border-radius: var(--border-radius);
    border: 1px solid #dddddd;
    outline: none;
    background: #eeeeee;
    transition: background 0.2s, border-color 0.2s;
}

.form__input:focus {
    border-color: var(--color-green);
    background: #ffffff;
}

.form__text {
    text-align: center;
}

.form__link {
    color: var(--color-secondary);
    text-decoration: none;
    cursor: pointer;
}

.form__link:hover {
    text-decoration: underline;
}



input[type="submit"] {

        color: #fff;
        background-color: #1ea78d;
        padding: 10px;
        width: 70%;
        border: none;
        border-radius: 6px;
        display: block;
        margin : 0 auto;
    }

    .btngreen:hover{
        color: #fff;
        background-color:#1A9C77;
    }
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

</style>
<section id="features" class="features">
<div class="container">
<div class="sec-title text-center wow bounceInDown animated" data-wow-duration="500ms">
<h1>Arhiv iger</h1>
<div class="devider"><i class="fa-solid fa-gamepad-modern"></i></i></div>
</div>
<div class="body_prijava">
<div class="container_prijava">
		<h3 style="text-align:center; color: #1ea78d">Izberite leto</h3>
		<form action="arhiv.php" method="GET" autocomplete="off">
			<div class="form__input-group">
			<select id="leto" name="leto" class="form__input">
			<?php
			$sql = "SELECT DISTINCT Leto FROM igre";
				$rezultat = mysqli_query($link, $sql);
				while($data = mysqli_fetch_array($rezultat)){
				echo "<option value='". $data['Leto'] ."'>" .$data['Leto'] ."</option>"; 
				} 
			?>
			</select>
			</div>	
		<input type="submit" value="Išči igre" class = "btngreen">			
		</form>
	</div>
</div>
</div>
<?php 
if(!empty($_GET['leto'])) :?>
<table class="table table-hover" border="1" rules=none>
<thead><th>Ime igre</th><th>Ime ekipe</th><th>Prenos</th></thead>
<tbody>
<?PHP
$leto_iger = $_GET['leto'];
$sql = "SELECT i.ime AS igra, i.upload_path AS path, e.ime_ekipe AS ekipa FROM igre i INNER JOIN ekipe e on i.ekipa_id=e.id WHERE (i.Leto = $leto_iger) AND (i.upload_path != '');";
$rezultat = mysqli_query($link, $sql);
while($row = mysqli_fetch_array($rezultat)){
$download = $row['path'];
echo 	'<tr><td>'.$row['igra'].'</td>'
		.'<td>'.$row['ekipa'].'</td>'
		.'<td><a style="color:gray" href='.$download.' download>'.$row['igra'].'</a></td></tr>';
} 
?>
<?php endif; ?>
</tbody>
</table>
</section>
<?php
require('noga.php');
?>