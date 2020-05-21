<?php
$email = 'marcelocezario@gmail.com';
$emailcc = 'marcelohcezario@gmail.com';
$nome = utf8_decode($_POST['nome']);
$assunto = utf8_decode($_POST['assunto']);
$mensagem = utf8_decode(nl2br($_POST['mensagem']));

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
#    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('testesmhc@gmail.com', $nome);
    $mail->addAddress($email, utf8_decode('Formulário de contato'));     // Add a recipient
#    $mail->addAddress('ellen@example.com');               // Name is optional
#    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC($emailcc);
#    $mail->addBCC('bcc@example.com');

    // Attachments
#    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
#    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $assunto;
    $mail->Body    = $mensagem;
    $mail->AltBody = $mensagem;

    $mail->send();
    header('location:index.php?envio=ok');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

