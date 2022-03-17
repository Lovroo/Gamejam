<?php
 if(isset($_POST['form-submit'])){
 $name=$_POST['name'];
 $email=$_POST['email'];
 $message=$_POST['message'];
 if (($name =="")($email=="")($message==""))
    {
    echo "All fields are required, please fill <a href="">the form</a>            again.";
    }
else{
    $from="From: $name<$email>\r\nReturn-path: $email";
    $subject="Gamejam";
    mail("lovro.napotnik@scv.si", $subject, $message, $from);
    echo "Email sent!";
    }
    }

 ?>