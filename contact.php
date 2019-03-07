<?php
session_start();
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;


/*
 *  SMTP Mail Configuration
 * */
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'send.one.com';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username = 'test@snappfinance.com';
$mail->Password = 'test123';


/*
 *  Input Data Validation
 * */
if (isset($_POST))
{
    $input_data = [
      'email'   => filter_var($_POST['email'],FILTER_SANITIZE_EMAIL),
      'amount'  => $_POST['amount']
    ];

    $validation = [
      'email'   => FILTER_VALIDATE_EMAIL,
      'amount'  => FILTER_VALIDATE_FLOAT,
    ];

    $valid_data = filter_var_array($input_data,$validation);

    if ($valid_data['email'] && $valid_data['amount'] !== false)
    {

        /*
                 * Email COnfirmation Message
                 * */
        $message = "
<html>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Snapp Finance Website Data</title>
    
</head>
<body style='width:960px;color:#000;'>
    <p>Dear Sir,</p>
    <p>
        Congratulations!You get the query from {$valid_data['email']}
        
    </p>
    <div style='border: 5px dashed #000;width:200px;text-align:center;padding:10px;'>{$valid_data['amount']}</div> <br> <br>
    
        

    
        Thank You <br>
        
    </p>

</body>
</html>";


        $mail->setFrom('test@snappfinance.com', 'Snapp Finance');
        $mail->addAddress('reg1@snappfinance.com');
        $mail->Subject = 'Snapp Finance Website Data';

        $mail->isHTML(ture);
        $mail->msgHTML($message);
        $mail->AltBody = "
        Hi,
        Amount = {$valid_data['amount']} and Email = {$valid_data['email']}
        ";

        if ($mail->send())
        {
            header('location: thanks.html');
        }
        else
        {
            header('location: index.html');
        }

    }else{
        header('location: index.html');
    }


}