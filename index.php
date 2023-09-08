<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "library/PHPMailer.php";
require_once "library/Exception.php";
require_once "library/OAuth.php";
require_once "library/POP3.php";
require_once "library/SMTP.php";

if(isset($_POST['send']) && $_POST['send'] == "form1"){
    $mail = new PHPMailer();

    //Enable SMTP debugging
    $mail->SMTPDebug = 0;
    //Set PHPMailer to use SMTP
    $mail->isSMTP();
    //Set SMTP Host name
    $mail->Host ="ssl://smtp.gmail.com";//host mail server
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //provide username and password
    $mail->Username = "gadingkelana1805@gmail.com";//nama-email smtp
    $mail->Password = "ckpzouyufcxifilv";//password email smtp
    //if SMTP requires TLS encryption then set it
    $mail->SMTPsecure = "ssl";
    //set TCP port to connect to
    $mail->Port = 465;

    //Pengirim
    $mail->From = $mail->Username;//Email Pengirim
    $mail->FromName = "Putra";//Nama Pengirim

    //Penerima
    $mail->addAddress($_POST['email']);

    $mail->isHTML(true);

    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message'];

    if (!$mail->send()){
        echo "Mailer Error" . $mail->ErrorInfo;
    }else{
        echo "Pesan Email Berhasil Dikirim";
    }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<body>
    <h2>Kirim Email</h2>
    <form action="" method="post" name="form1">
    <table>
        <tr>
            <td>Email Penerima</td>
            <td><input type="email" name="email" id=""></td>
        </tr>
        <tr>
        <td>
            Subject</td>
            <td><input type="text" name="subject" id=""></td>
        </td>
        </tr>
        <tr>
            <td>Message</td>
            <td><textarea name="message" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit">Send Now</button></td>
        </tr>
    </table>
    <input type="hidden" name="send" value="form1">
    </form>
</body>
</html>