<?php
$usuarioGmail = '';
$senhaGmail = '';

$emailEnvio = '';
$emailEnvioCc = '';

$email = $_POST['email'];
$nome = $_POST['nome'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

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
    $mail->Username   = $usuarioGmail;                     // SMTP username
    $mail->Password   = $senhaGmail;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($usuarioGmail, utf8_decode($nome));
    $mail->addAddress($emailEnvio, utf8_decode('Formulário'));     // Add a recipient
    if(isset($_POST['receberCopia'])){
        $mail->addAddress($email, utf8_decode($nome));
    }
#    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo($email, utf8_decode($nome));
#    $mail->addCC($emailEnvioCc);
#    $mail->addBCC('bcc@example.com');

    // Attachments
#    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
#    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = utf8_decode("Contato: ".$assunto);
    $mail->Body    = utf8_decode(nl2br($mensagem."\n\n".$nome."\n".$email));
    $mail->AltBody = utf8_decode(nl2br($mensagem."\n\n".$nome."\n".$email));

    $mail->send();
    header('location:index.php?envio=sucess');
} catch (Exception $e) {
    header('location:index.php?envio=error&email='.$email.'&nome='.$nome.'&assunto='.$assunto.'&mensagem='.urlencode($mensagem));
}

