<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
    $n = $rs->num_rows;

    if($n == 1){

        $code = uniqid();

        Database::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE 
        `email`='".$email."'");

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ranjaniarunashantha@gmail.com';
            $mail->Password = 'hjuddxnblbjnxnmv';
            // hjuddxnblbjnxnmv
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('ranjaniarunashantha@gmail.com', ' Password');
            $mail->addReplyTo('ranjaniarunashantha@gmail.com', ' Password');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'eshop Forgot Password Verification code';
            $bodyContent = '<h1 style="color:green">Your Verification code is'.$code.'</h1>';
            $mail->Body    = $bodyContent;

            if(!$mail->send()){
                echo("verification code sending failed");
            }else{
                echo("Success");
            }

    }else{
        echo("Invalid Email address");
    }

}
 
?>