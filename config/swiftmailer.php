<?php
require('keys.php');
require_once('../vendor/autoload.php');

// Create the Transport
$transport = (new Swift_SmtpTransport($SMTP_provider, $SMTP_port, $SMTP_method))
  ->setUsername($SMTP_email)
  ->setPassword($SMTP_password);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);
