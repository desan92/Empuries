

<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Load Composer's autoloader
require '../vendor/autoload.php';

//es comprova que les variables existeixen i arribin desde el formulari
if(isset($_POST["nom"], $_POST["email"], $_POST["subject"], $_POST["missatge"]))
{
    //escomprova que aquestes variables no estan buides.
    if(!empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["subject"]) && !empty($_POST["missatge"]))
    {
        $nom = $_POST["nom"];
        $email_user= $_POST["email"];
        $subject = $_POST["subject"];
        $missatge = $_POST["missatge"];
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        
        //per fer l'enviament de mail s'utilitzara mailtrap. Aquesta part es posen les dades necesaries.
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.mailtrap.io';                     // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'c03dbce255dadd';                     // SMTP username
            $mail->Password   = 'b983b98cfb7709';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom($email_user, $nom); //nom que sortira al mail amb el correu que envia el missatge.
            $mail->addAddress('info@emporium.cat', 'Administrador');     //el que rep el mail amb el nom del que el rep es sempre administrador.             // Add a recipient             // Name is optional
            $mail->addReplyTo('info@emporium.cat', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $missatge;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            //si s'envia el correu electronic enviara per get enviat en cas contrari error.
            if(!$mail->send()) 
            {
                //echo 'No se pudo enviar el mensaje...'.$mail->ErrorInfo;
                header("Location: ../about_us.php?missatge_status=error");
            } 
            else 
            {
                //echo "Mensaje enviado correctamente";
                header("Location: ../about_us.php?missatge_status=send");
            }
        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header("Location: ../about_us.php?missatge_status=error");
        }

    }
    else
    {
        header("Location: ../about_us.php?missatge_status=error");
    }
}
else
{
    header("Location: ../about_us.php?missatge_status=error");
}


?>