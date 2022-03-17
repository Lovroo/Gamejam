<?php
include_once('glava.php');
require_once 'povezava.php';
if(isset($_SESSION['prijavljen']) && $_SESSION['prijavljen'] == true){
header("Location:index.php");	
}
?>
<style>
.body_prijava {
    --color-primary: #cc0000;
    --color-primary-dark: #f50909;
    --color-secondary: #252c6a;
    --color-green: #1ea78d;
    --color-error: #cc3333;
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


.form__button:hover {
    background: var(--color-primary-dark);
}

.form__button:active {
    transform: scale(0.98);
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
                if (isset($_GET['error1_Login'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:50px;">Niste vpisali pravilno geslo ali email!</div>
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
                if (isset($_GET['success_Register'])) {
                ?>
                    <div class="alert alert-success" id="msg_error" role="alert" style="margin-top:50px;">Uspešno ste registrirali račun. Prosimo da se prijavite!</div>
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
                if (isset($_GET['error2_Login'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:50px;">Email še ni v uporabi. Poskusite še enkrat vpisati podatke ali pa se registrirajte.</div>
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
                if (isset($_GET['error3_Login'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:50px;">   Niste vpisali podatkov. Poskusite še enkrat!</div>
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
	<form action="preverjanje_prijave.php" method="POST" class = "form" id = "login">
	<h1 class="form__title" style = "color: #1ea78d;">Login</h1>
            <div class="form__input-group">
				 <!-- <label for="email">Email</label> -->
				<input type="email" class ="form__input" name="email" required placeholder="Vnesite email"/>
			</div>
			<div class="form__input-group">
				 <!--<label for="password">Geslo</label>-->
				<input type="password" class = "form__input" name="geslo" required placeholder="Vnesite geslo"/>
			</div>
		<input type="submit" value="Prijava" class = "btngreen"/>
        <br />
		<p class = "form__text">
			<a href="registracija.php" class="form__link"> Še nimate računa?</a>
		</p>
        <br />
	</form>
</div>
</div>
<?php
require_once('noga.php');
?>