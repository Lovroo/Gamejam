<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <style>       				                
        body{margin-top:20px;}
        .avatar{
        width:200px;
        height:200px;
        }
        

        input[type="submit"] {
             display: block;
             margin : 0 auto;
			      width: 150px;
            background-color: #1ea78d;
			      color: #fff;
        }

        .btngreen{
          border: none;
          border-radius: 3px;
          padding: 5px;
        }

        .btngreen:hover{
          color: #fff;
          background-color:#1A9C77;
        }


    </style>
</head>
<body>
<?php
require_once 'povezava.php';
include_once 'glava.php';
include_once 'seja.php';

if(!isset($_SESSION['prijavljen']) || $_SESSION['prijavljen'] == false){
header("Location:Login/prijava.php");		
}
$u_id = $_SESSION['id_u'];
$sql = "SELECT * FROM uporabniki WHERE (id = '$u_id');";
$rezultat = mysqli_query($link, $sql);
while($row = mysqli_fetch_array($rezultat)){
$emailu = $row['email'];
$imeu = $row['ime'];
$priiu = $row['priimek'];
$svojpc = $row['svoj_pc'];
$razredid = $row['razred_id'];
} 
?>
<?php
                if (isset($_GET['success_uporabnik'])) {
                ?>
                    <div class="alert alert-success" id="msg_error" role="alert" style="margin-top:50px;">Uspešno ste spremenili vaše podatke!  </div>
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
                if (isset($_GET['error1_uporabnik'])) {
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
                if (isset($_GET['error2_uporabnik'])) {
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
                if (isset($_GET['error3_uporabnik'])) {
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
                if (isset($_GET['error4_uporabnik'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Priimek ne sme biti daljše od 40 znakov!  </div>
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
                if (isset($_GET['error5_uporabnik'])) {
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
                if (isset($_GET['error6_uporabnik'])) {
                ?>
                    <div class="alert alert-danger" id="msg_error" role="alert" style="margin-top:60px;">Vaše priimek vsebuje nedovoljene znake! </div>
                    <script>
                        setTimeout(function() {
                            var msg = document.getElementById("msg_error");
                            msg.parentNode.removeChild(msg);
                        }, 3000);
                    </script>
                <?php
                }
?>

<div class="container bootstrap snippets bootdey" style="padding-top:100px;">
    <h1 class="text-primary" style = "color: #00C592">Spremeni svoj  profil</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">          
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable" style = "background-color: #1ea78d; color: #fff;">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          Tu si lahko urediš svoj profil.
        </div>
        <h3>Tvoje informacije</h3>
        
    	<form action="menjava_uporabniskih_informacij.php" class="form-horizontal" role="form" method="POST" onSubmit="return confirm('Ali ste prepričani, da hočete zamenjati podatke?');">
          <div class="form-group">
            <label class="col-lg-3 control-label">Email</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?php echo "$emailu"; ?>"> 
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Ime</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="ime" placeholder="Ime" id="ime" value="<?php echo "$imeu"; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Priimek</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="priimek" placeholder="Priimek" id="priimek" value="<?php echo "$priiu"; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Svoj računalnik?</label>
            <div class="col-lg-8">
           <select class="form-select" id = "svoj_pc" name = "svoj_pc">
                <option value = "0">Ne</option>
                <option value = "1">Da</option>
            </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">razred</label>
            <div class="col-lg-8">
            <?php 
                $sql = "SELECT ime_razreda FROM razredi WHERE (id = '$razredid');";
                $rez = mysqli_query($link, $sql);
                $razred1 = mysqli_fetch_array($rez);
                $razred = $razred1[0];
            ?>
              <select id="razred" name="razred">
                <option value="<?php echo "$razred"; ?>" selected hidden><?php echo "$razred"; ?></option>
                    <?php
                        $sql = "SELECT ime_razreda FROM razredi";
                        $rezultat = mysqli_query($link, $sql);
                        while($data = mysqli_fetch_array($rezultat)){
                        echo "<option value='". $data['ime_razreda'] ."'>" .$data['ime_razreda'] ."</option>"; 
                        } 
                    ?>
                </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-8">
                <input type="submit" class="btngreen">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
</body>
</html>
<?php
require_once 'noga.php';
?>