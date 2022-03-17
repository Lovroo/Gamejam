<!Doctype HTML>
<html lang="sl">
<?php 
require_once 'seja.php';
require_once 'povezava.php';
?>
	<head>
	<meta charset="UTF-8">
	<title>ERŠ GameJam - 2022</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="styling/style.css">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="//fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/media-queries.css">
	<script src="js/modernizr-2.6.2.min.js"></script>
	</head>
<body id="body">
<header id="navigation" class="navbar-fixed-top navbar">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<i class="fa fa-bars fa-2x"></i>
			</button>
                    <a class="navbar-brand" href="index.php">
							<img src="img/gamejam.png" alt="Logo", style="height:50px; width:50px;padding:5px;">
					</a>
        </div>			
	<nav class="collapse navbar-collapse navbar-right">
	<ul id="nav" class="nav navbar-nav">
	<?php
	echo '<li><a href="stream.php">Livestream</a></li>';
	echo '<li><a href="arhiv.php">Igre</a></li>';
	if(isset($_SESSION['prijavljen']) && $_SESSION['prijavljen'] == true)
	{
	$u_id = $_SESSION['id_u'];
	$sql = "SELECT * FROM uporabniki WHERE (id = '$u_id');";
	$rezultat = mysqli_query($link, $sql);
	while($row = mysqli_fetch_array($rezultat)){
	$imeu = $row['ime'];
	$priiu = $row['priimek'];
	$rang_u = $row['u_rang'];
	$st_ekip = $row['stevilo_ustvarjenih_ekip'];
	}
	echo '<li><a class="w3-bar-item w3-button" href="uporabnik.php">'.$imeu.' '.$priiu.'</a></li>';	
	if($st_ekip == 0)
	{
	echo '<li><a href="registracija_ekipe.php">Registracjia ekipe</a></li>';	
	}
	else{
	echo '<li><a href="registracija_ekipe.php">Upravljanje ekipe</a></li>';
	}
		if($rang_u == 2)
		{
		echo '<li><a href="admin.php">Admin in ocenjevanje</a></li>';	
		}
	echo '<li><a href="odjava.php">Odjava</a></li>';
	}
	else
	{
	echo '<li><a href="prijava.php">Prijava</a></li>';
	echo '<li><a href="registracija.php">Registracija</a></li>';
	}
	?>
</ul>
</nav>
</div>
</header>