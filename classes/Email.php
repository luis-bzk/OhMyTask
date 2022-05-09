<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
  protected $email;
  protected $userName;
  protected $token;

  public function __construct($email, $userName, $token)
  {
    $this->email = $email;
    $this->userName = $userName;
    $this->token = $token;
  }

  public function sendInfo()
  {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 2525;
    $mail->Username = 'f7542f3e4b0852';
    $mail->Password = '10cfd7cb36da32';


    $mail->setFrom("cuentas@ohmytask.com");
    $mail->addAddress("cuentas@ohmytask.com", "OhMyTask.com");
    $mail->Subject = "Confirm your account";
    // set html
    $mail->isHTML(TRUE);
    $mail->CharSet = "UTF-8";

    $content = '<html lang="en">';
    $content .= '<head>';
    $content .= '<link rel="preconnect" href="https://fonts.googleapis.com">';
    $content .= '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    $content .= '<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">';
    $content .= '<style>';
    $content .= "h1{ font-family: 'Roboto', sans-serif;}";
    $content .= "p{font-family: 'Roboto', sans-serif;}";
    $content .= "a{font-family: 'Roboto', sans-serif;}";
    $content .= 'h1{ text-align: center; }';
    $content .= 'h1{ color: #3C738C;}';
    $content .= 'p{ color: #141517;}';
    $content .= 'p{ font-weight: 300;}';
    $content .= 'a{ color: #67A1D6;}';
    $content .= 'span{ color: #141517;}';
    $content .= 'span{ font-weight: 500;}';
    $content .= '</style>';
    $content .= '</head>';
    $content .= '<body>';
    $content .= "<h1><strong>New email from OhMyTask:</strong></h1>";
    $content .= "<p>Hello <span>" . $this->userName . "</span>,</p>";
    $content .= "<p>Thanks for create your account, please validate your account with the link.</p>";
    $content .= "<p>Click in the link:</p>";
    $content .= "<a href='http://localhost:3000/confirm_account?token=" . $this->token . "'>Confirm my account</a>";
    $content .= "<p>If you didn't ask for this account, please ignore this email.</p>";
    $content .= '</body>';
    $content .= '</html>';

    $mail->Body = $content;
    // debug($mail);

    // send email 
    $mail->send();
  }

  public function sendInstructions()
  {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 2525;
    $mail->Username = 'f7542f3e4b0852';
    $mail->Password = '10cfd7cb36da32';


    $mail->setFrom("cuentas@ohmytask.com");
    $mail->addAddress("cuentas@ohmytask.com", "OhMyTask.com");
    $mail->Subject = "Recover your password";
    // set html
    $mail->isHTML(TRUE);
    $mail->CharSet = "UTF-8";

    $content = '<html lang="en">';
    $content .= '<head>';
    $content .= '<link rel="preconnect" href="https://fonts.googleapis.com">';
    $content .= '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    $content .= '<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">';
    $content .= '<style>';
    $content .= "h1{ font-family: 'Roboto', sans-serif;}";
    $content .= "p{font-family: 'Roboto', sans-serif;}";
    $content .= "a{font-family: 'Roboto', sans-serif;}";
    $content .= 'h1{ text-align: center; }';
    $content .= 'h1{ color: #3C738C;}';
    $content .= 'p{ color: #141517;}';
    $content .= 'p{ font-weight: 300;}';
    $content .= 'a{ color: #67A1D6;}';
    $content .= 'span{ color: #141517;}';
    $content .= 'span{ font-weight: 500;}';
    $content .= '</style>';
    $content .= '</head>';
    $content .= '<body>';
    $content .= "<h1><strong>New email from OhMyTask:</strong></h1>";
    $content .= "<p>Hello <span>" . $this->userName . "</span>,</p>";
    $content .= "<p>Oh, you forgot your password, follow the link to recover it.</p>";
    $content .= "<p>Click in the link:</p>";
    $content .= "<a href='http://localhost:3000/recover_password?token=" . $this->token . "'>Reset my password</a>";
    $content .= "<p>If you didn't ask for this email, please ignore it .</p>";
    $content .= '</body>';
    $content .= '</html>';

    $mail->Body = $content;
    // debug($mail);

    // send email 
    $mail->send();
  }
}