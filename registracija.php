<?php
require('glava.php');
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
    height: 600px;
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


</style>
<?php
                if (isset($_GET['error1_Register'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:50px;">Nismo mogli pridobiti vaših podatkov. Poskusite še enkrat!</div>
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
                if (isset($_GET['error2_Register'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:50px;">Niste izpolnili vseh polij. Poskusite še enkrat!</div>
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
                if (isset($_GET['error3_Register'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:50px;">Geslo mora biti dolgo vsaj 8 znakov!</div>
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
                if (isset($_GET['error4_Register'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:50px;">Ime ne sme biti daljše od 20 znakov!</div>
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
                if (isset($_GET['error5_Register'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:50px;">Priimek ne sme biti daljše od 40 znakov!</div>
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
                if (isset($_GET['error6_Register'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:50px;">Gesla se morata ujemati</div>
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
                if (isset($_GET['error7_Register'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:50px;">Email je že v uporabi</div>
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
                if (isset($_GET['error8_Register'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:50px;">Vaše ime vsebuje nedovoljene znake!</div>
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
                if (isset($_GET['error9_Register'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:50px;">Vaše priimek vsebuje nedovoljene znake!</div>
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
                if (isset($_GET['error10_Register'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:50px;">Uspešno ste registrirali račun. Prosimo da se prijavite!</div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>
<div class="body_prijava">
<div class="container_prijava">
	<form action="registracija_racuna.php" method="post" autocomplete="off">
		<h1 style="text-align:center; color: #1ea78d">Ustvarite račun</h1>
        <br />
		<!-- <label for="ime">
		Ime
		</label> -->
		<div class="form__input-group">
			<input type="text" name="ime" class = "form__input" placeholder="Ime" id="ime" required>
		</div>
		<!--<label for="priimek">
		<i class="fas fa-user"></i>
		Priimek -->
		<div class="form__input-group">
			<input type="text" name="priimek" class="form__input" placeholder="Priimek" id="priimek" required>
		</div>
	<!-- <label for="geslo">
	Geslo
	</label> -->
		<div class="form__input-group">
			<input type="password" name="geslo"  class="form__input" placeholder="Geslo" id="geslo" required>
		</div>
	<!--<label for="email">
	<label for="geslo_preverjanje">
	Ponovno vpišite geslo 
	</label> -->
		<div class="form__input-group">
			<input type="password" name="geslo_preverjanje" class="form__input" placeholder="Ponovno vpišite geslo" id="geslo_preverjanje" required>
		</div>
	<!-- <label for="email">
	Email
	</label> -->
	<div class="form__input-group">
		<input type="email" name="email" class="form__input" placeholder="Email" id="email" required>
	</div>
    <div class="form__input-group">
 	<label class="form__text" for="choice">Ali imaš svoj računalnik?</label>
    <select class="form__input" id = "svoj_pc" name = "svoj_pc">
        <option value = "0">Ne</option>
        <option value = "1">Da</option>
    </select>
    </div>
  <div class="form__input-group">
  	<select id="razred" name="razred" class="form__input">
	<?php
	$sql = "SELECT ime_razreda FROM razredi";
		$rezultat = mysqli_query($link, $sql);
		while($data = mysqli_fetch_array($rezultat)){
		echo "<option value='". $data['ime_razreda'] ."'>" .$data['ime_razreda'] ."</option>"; 
		} 
	?>
	</select>
	</div>
<input type="submit" value="Registracija" class = "btngreen">
<br />
		<p class = "form__text">
        Že imate račun? <a href="prijava.php" class="form__link"> <u>Prijavi se tukaj.</u> </a>
		</p>
</form>
</div>
</div>
<?php
require('noga.php');
?>